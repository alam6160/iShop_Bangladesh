<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\compare;
use App\Models\User;
use Carbon\Carbon;


class CompareController extends Controller
{
    
   // add to wishlist mehtod 

    public function AddToCompare(Request $request, $product_id){

        if (Auth::check()) {

            $exists = compare::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if (!$exists) {
               compare::insert([
                'user_id' => Auth::id(), 
                'product_id' => $product_id, 
                'created_at' => Carbon::now(), 
            ]);
           return response()->json(['success' => 'Successfully Added On Your Compare List']);

            }else{

                return response()->json(['error' => 'This Product has Already on Your Compare List']);

            }            
            
        }else{

            return response()->json(['error' => 'At First Login Your Account']);

        }

    } // end method 






    public function ViewCompare(){
        return view('frontend.compare.view_compare');
    }

    public function GetCompareProduct(){

        $compare = compare::with('product')->where('user_id',Auth::id())->latest()->get();
        return response()->json($compare);
    } // end mehtod 


    public function RemoveCompareProduct($id){

        compare::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Successfully Remove Product From compare']);
    }
}
