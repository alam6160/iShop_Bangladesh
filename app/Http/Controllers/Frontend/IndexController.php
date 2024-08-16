<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Review;
use Illuminate\Support\Facades\Hash;
use App\Models\BlogPost;

use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\TargetDate;
use App\Models\Seo;
use App\Models\Time;
use App\Models\Banner;

use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    // public function index(){
    //     $seo = Seo::find(1);
    // 	$blogpost = BlogPost::latest()->get();
    // 	$products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
    // 	$sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
    // 	$categories = Category::orderBy('category_name_en','ASC')->get();

    // 	$featured = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
    //     $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();

    // 	$special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(6)->get();

    // 	$special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();

    // 	$skip_category_0 = Category::skip(0)->first();
    // 	$skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

    //     $skip_category_1 = Category::skip(1)->first();
    //     $skip_product_1 = Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();

    // 	$skip_brand_1 = Brand::skip(1)->first();

    // 	$skip_brand_product_1 = Product::where('status',1)->where('brand_id',$skip_brand_1->id)->orderBy('id','DESC')->get();
    //     $targetDate = TargetDate::latest()->first();
    //    $timer = Time::first();

    // 	// return $skip_category->id;
    // 	// die();

    // 	return view('frontend.index',compact('categories','seo','sliders','products','featured','hot_deals','special_offer','special_deals','skip_category_0','skip_product_0','skip_category_1','skip_product_1','skip_brand_1','skip_brand_product_1','blogpost','targetDate','timer'));

    // }

    public function index() {
        $data = [];
        // Fetch SEO information
        $data['seo'] = Seo::find(1);
        // Fetch blog posts
        $data['blogpost'] = BlogPost::latest()->get();

        // Fetch products
        $data['products'] = Product::where('status', 1)->latest()->limit(6)->get();
        $data['featured'] = Product::where('featured', 1)->latest()->limit(6)->get();
        $data['hot_deals'] = Product::where('hot_deals', 1)->whereNotNull('discount_price')->latest()->limit(3)->get();
        $data['special_offer'] = Product::where('special_offer', 1)->latest()->limit(6)->get();
        $data['special_deals'] = Product::where('special_deals', 1)->latest()->limit(3)->get();

        // Fetch sliders and categories
        $data['sliders'] = Slider::where('status', 1)->latest()->limit(3)->get();
        $data['categories'] = Category::orderBy('category_name_en', 'ASC')->get();

        // Fetch specific categories and products
        $categories = Category::take(2)->get();
        $data['skip_category_0'] = $categories->first();
        $data['skip_category_1'] = $categories->last();

        // Fetch products for the first two categories
        $data['skip_product_0'] = Product::where('status', 1)
            ->where('category_id', $data['skip_category_0']->id ?? 0)
            ->latest()
            ->get();

        $data['skip_product_1'] = Product::where('status', 1)
            ->where('category_id', $data['skip_category_1']->id ?? 0)
            ->latest()
            ->get();

        // Fetch brand and brand products
        $data['skip_brand_1'] = Brand::skip(1)->first();
        $data['skip_brand_product_1'] = Product::where('status', 1)
            ->where('brand_id', $data['skip_brand_1']->id ?? 0)
            ->latest()
            ->get();
            // $data['catwiseProduct'] = Product::where('category_id', $category->id)
            //                                     ->orderBy('id', 'DESC')
            //                                     ->get();

        // Fetch target date and timer
        $data['targetDate'] = TargetDate::latest()->first();
        $data['timer'] = Time::first();
        $data['banner'] = Banner::first();

        // Return view with data array
        return view('frontend.index', $data);
    }


    public function UserLogout(){
    	Auth::logout();
    	return Redirect()->route('login');
    }


    public function UserProfile(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('frontend.profile.user_profile',compact('user'));
    }
    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
		$data->name = $request->name;
		$data->email = $request->email;
		$data->phone = $request->phone;


		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			@unlink(public_path('upload/user_images/'.$data->profile_photo_path));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/user_images'),$filename);
			$data['profile_photo_path'] = $filename;
		}
		$data->save();
		$notification = array(
			'message' => 'User Profile Updated Successfully',
			'alert-type' => 'success'
		);
		return redirect()->route('dashboard')->with($notification);

    } // end method


    public function UserChangePassword(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('frontend.profile.change_password',compact('user'));
    }


    public function UserPasswordUpdate(Request $request){

		$validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

		$hashedPassword = Auth::user()->password;
		if (Hash::check($request->oldpassword,$hashedPassword)) {
			$user = User::find(Auth::id());
			$user->password = Hash::make($request->password);
			$user->save();
			Auth::logout();
			return redirect()->route('user.logout');
		}else{
			return redirect()->back();
		}


	}// end method

	public function ProductDetails($id,$slug){
		$product = Product::findOrFail($id);

		$color_en = $product->product_color_en;
		$product_color_en = explode(',', $color_en);

		$color_hin = $product->product_color_hin;
		$product_color_hin = explode(',', $color_hin);

		$size_en = $product->product_size_en;
		$product_size_en = explode(',', $size_en);

		$size_hin = $product->product_size_hin;
		$product_size_hin = explode(',', $size_hin);

		$multiImag = MultiImg::where('product_id',$id)->get();

		$cat_id = $product->category_id;
		$relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
        $reviewcount = Review::where('product_id', $product->id)
        ->where('status', 1)
        ->latest()
        ->get();

        $avarage = Review::where('product_id', $product->id)
        ->where('status', 1)
        ->avg('rating');
        $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
        $timer = Time::first();
        $banner = Banner::first();

	 	return view('frontend.product.product_details',compact('product','multiImag','product_color_en','product_color_hin','product_size_en','product_size_hin','relatedProduct','avarage','reviewcount','hot_deals','timer','banner'));

	}

    // public function ProductDetails($id, $slug) {
    //     // Initialize the data array
    //     $data = [];

    //     // Fetch the product
    //     $data['product'] = Product::findOrFail($id);

    //     // Process color and size data
    //     $data['product_color_en'] = explode(',', $data['product']->product_color_en);
    //     $data['product_color_hin'] = explode(',', $data['product']->product_color_hin);
    //     $data['product_size_en'] = explode(',', $data['product']->product_size_en);
    //     $data['product_size_hin'] = explode(',', $data['product']->product_size_hin);

    //     // Fetch related images
    //     $data['multiImag'] = MultiImg::where('product_id', $id)->get();

    //     // Fetch related products in the same category, excluding the current product
    //     $data['relatedProduct'] = Product::where('category_id', $data['product']->category_id)
    //         ->where('id', '!=', $id)
    //         ->latest('id')
    //         ->get();

    //     // Fetch reviews and compute average rating
    //     $reviewQuery = Review::where('product_id', $id)
    //     ->where('status', 1);

    //    $data['reviewcount'] = $reviewQuery->count();
    //     $data['avarage'] = $reviewQuery->avg('rating');

    //     // Fetch hot deals with a limit of 3
    //     $data['hot_deals'] = Product::where('hot_deals', 1)
    //         ->whereNotNull('discount_price')
    //         ->latest('id')
    //         ->limit(3)
    //         ->get();

    //     // Fetch the timer
    //     $data['timer'] = Time::first();

    //     // Return the view with the data array
    //     return view('frontend.product.product_details', $data);
    // }





	public function TagWiseProduct($tag){
		$products = Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_hin',$tag)->orderBy('id','DESC')->paginate(3);
		$categories = Category::orderBy('category_name_en','ASC')->get();
        $banner = Banner::first();
		return view('frontend.tags.tags_view',compact('products','categories','banner'));

	}


  // Subcategory wise data
	public function SubCatWiseProduct(Request $request, $subcat_id,$slug){
		$products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(3);
		$categories = Category::orderBy('category_name_en','ASC')->get();

		$breadsubcat = SubCategory::with(['category'])->where('id',$subcat_id)->get();
        $banner = Banner::first();

		///  Load More Product with Ajax
		if ($request->ajax()) {
   $grid_view = view('frontend.product.grid_view_product',compact('products'))->render();

   $list_view = view('frontend.product.list_view_product',compact('products'))->render();
	return response()->json(['grid_view' => $grid_view,'list_view',$list_view]);

		}
		///  End Load More Product with Ajax

		return view('frontend.product.subcategory_view',compact('products','categories','breadsubcat','banner'));

	}

  // Sub-Subcategory wise data
	public function SubSubCatWiseProduct($subsubcat_id,$slug){
		$products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate(6);
		$categories = Category::orderBy('category_name_en','ASC')->get();
		$breadsubsubcat = SubSubCategory::with(['category','subcategory'])->where('id',$subsubcat_id)->get();
        $banner = Banner::first();
		return view('frontend.product.sub_subcategory_view',compact('products','categories','breadsubsubcat','banner'));

	}



    /// Product View With Ajax
	public function ProductViewAjax($id){
		$product = Product::with('category','brand')->findOrFail($id);

		$color = $product->product_color_en;
		$product_color = explode(',', $color);

		$size = $product->product_size_en;
		$product_size = explode(',', $size);

		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,

		));

	} // end method

 // Product Seach
	public function ProductSearch(Request $request){

		$request->validate(["search" => "required"]);

		$item = $request->search;
		// echo "$item";
        $categories = Category::orderBy('category_name_en','ASC')->get();
		$products = Product::where('product_name_en','LIKE',"%$item%")->get();
		return view('frontend.product.search',compact('products','categories'));

	} // end method

    public function search(Request $request)
{
    $query = $request->input('query');

    // Search for products by name or description
    $products = Product::where('product_name_en', 'LIKE', "%{$query}%")
                        ->orWhere('short_descp_en', 'LIKE', "%{$query}%")
                        ->get();

    return response()->json($products);
}



	///// Advance Search Options

	public function SearchProduct(Request $request){

		$request->validate(["search" => "required"]);

		$item = $request->search;

		$products = Product::where('product_name_en','LIKE',"%$item%")->select('product_name_en','product_thambnail','selling_price','id','product_slug_en')->limit(5)->get();
		return view('frontend.product.search_product',compact('products'));



	} // end method

    public function priceSearch(Request $request)
{
    $minPrice = $request->input('minPrice');
    $maxPrice = $request->input('maxPrice');

    $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();

    return response()->json($products);
}




}
