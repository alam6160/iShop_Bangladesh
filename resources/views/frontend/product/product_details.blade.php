@extends('frontend.main_master')
@section('content')

@section('title')
    {{ $product->product_name_en }} Product Details
@endsection

<style>
    .checked {
        color: orange;
    }

    .breadcrumb {
    padding: 10px 0;
    background: #f5f5f5;
}

.breadcrumb-inner {
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.breadcrumb ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

.breadcrumb ul li {
    display: inline;
    font-size: 14px;
}

.breadcrumb ul li a {
    color: #666;
    text-decoration: none;
}

.breadcrumb ul li a:hover {
    color: #333;
    text-decoration: underline;
}

.breadcrumb ul li.active {
    color: red;
}

.breadcrumb ul li::after {
    content: " / ";
    color: #999;
    padding: 0 5px;
}

.breadcrumb ul li:last-child::after {
    content: ""; /* Removes the slash after the last item */
}

</style>

<!-- ===== ======== HEADER : END ============================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li><a href="#">{{ $product['category']['category_name_en'] }}</a></li>
                <li class='active'>{{ $product->product_name_en }}</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-3 sidebar'>

                <div class="sidebar-module-container">


                    {{-- <div class="home-banner outer-top-n">
                        <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
                    </div> --}}
                    <!-- ====== === HOT DEALS ==== ==== -->

                    @include('frontend.common.hot_deals')

                    <!-- ===== ===== HOT DEALS: END ====== ====== --><div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Special Offer</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs" data-item="6">
                            <div class="item">
                                <div class="products special-product">
                                    @foreach ($special_offer as $special_offers)
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row d-flex align-items-center" style="margin-bottom: 15px;"> <!-- Flexbox for alignment -->
                                                    <div class="col-xs-4 col-md-4 col-sm-4">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="{{ url('product/details/' . $special_offers->id . '/' . $special_offers->product_slug_en) }}">
                                                                    <img src="{{ asset($special_offers->product_thambnail) }}" alt="" class="img-fluid">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-8 col-md-8 col-sm-8">
                                                        <div class="product-info">
                                                            <h3 class="name">
                                                                <a href="{{ url('product/details/' . $special_offers->id . '/' . $special_offers->product_slug_en) }}">
                                                                    @if (session()->get('language') == 'hindi')
                                                                        {{ $special_offers->product_name_hin }}
                                                                    @else
                                                                        {{ $special_offers->product_name_en }}
                                                                    @endif
                                                                </a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
                                                                <span class="price"> ৳{{ $special_offers->selling_price }} </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Special Deals</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs"
                            data-item="6">


                            <div class="item">
                                <div class="products special-product">

                                    @foreach ($special_deals as $special_deal)
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5 col-md-4 col-sm-2">
                                                        <div class="product-image">
                                                            <div class="image"> <a
                                                                    href="{{ url('product/details/' . $special_deal->id . '/' . $special_deal->product_slug_en) }}">
                                                                    <img src="{{ asset($special_deal->product_thambnail) }}"
                                                                        alt=""> </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7 col-md-4 col-sm-2">
                                                        <div class="product-info">
                                                            <h3 class="name"><a
                                                                    href="{{ url('product/details/' . $special_deal->id . '/' . $special_deal->product_slug_en) }}">
                                                                    @if (session()->get('language') == 'hindi')
                                                                        {{ $special_deal->product_name_hin }}
                                                                    @else
                                                                        {{ $special_deal->product_name_en }}
                                                                    @endif
                                                                </a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    ৳{{ $special_deal->selling_price }} </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    @endforeach <!-- // end special deals foreach -->
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>

                    <!-- ============================================== NEWSLETTER ============================================== -->
                    {{-- <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
                        <h3 class="section-title">Newsletters</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <p>Sign Up for Our Newsletter!</p>
                            <form>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Subscribe to our newsletter">
                                </div>
                                <button class="btn btn-primary">Subscribe</button>
                            </form>
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget --> --}}
                    <!-- ============================================== NEWSLETTER: END ============================================== -->

                    <!-- ============================================== Testimonials============================================== -->
                    {{-- <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                        <div id="advertisement" class="advertisement">
                            <div class="item">
                                <div class="avatar"><img
                                        src="{{ asset('frontend/assets/images/testimonials/member1.png') }} "
                                        alt="Image"></div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">John Doe <span>Abc Company</span> </div>
                                <!-- /.container-fluid -->
                            </div><!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img
                                        src="{{ asset('frontend/assets/images/testimonials/member3.png') }} "
                                        alt="Image"></div>
                                <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                            </div><!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img
                                        src="{{ asset('frontend/assets/images/testimonials/member2.png') }} "
                                        alt="Image"></div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                                <!-- /.container-fluid -->
                            </div><!-- /.item -->

                        </div><!-- /.owl-carousel -->
                    </div> --}}

                    <!-- ===== ========== Testimonials: END ======== =============== -->
                </div>
            </div><!-- /.sidebar -->

            <div class='col-md-9'>
                <div class="detail-block">
                    <div class="row  wow fadeInUp">
                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">
                                <div id="owl-single-product">
                                    @foreach ($multiImag as $img)
                                        <div class="single-product-gallery-item" id="slide{{ $img->id }}">
                                            <a data-lightbox="image-1" data-title="Gallery"
                                                href="{{ asset($img->photo_name) }} ">
                                                <img class="img-responsive" alt=""
                                                    src="{{ asset($img->photo_name) }} "
                                                    data-echo="{{ asset($img->photo_name) }} " />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                    @endforeach
                                </div><!-- /.single-product-slider -->
                                <div class="single-product-gallery-thumbs gallery-thumbs">
                                    <div id="owl-single-product-thumbnails">
                                        @foreach ($multiImag as $img)
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                    data-slide="1" href="#slide{{ $img->id }}">
                                                    <img class="img-responsive" width="85" alt=""
                                                        src="{{ asset($img->photo_name) }} "
                                                        data-echo="{{ asset($img->photo_name) }} " />
                                                </a>
                                            </div>
                                        @endforeach
                                    </div><!-- /#owl-single-product-thumbnails -->
                                </div><!-- /.gallery-thumbs -->

                            </div><!-- /.single-product-gallery -->
                        </div><!-- /.gallery-holder -->

                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <h1 class="name" id="pname">
                                    @if (session()->get('language') == 'hindi')
                                        {{ $product->product_name_hin }}
                                    @else
                                        {{ $product->product_name_en }}
                                    @endif
                                </h1>

                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-sm-3">

                                            @if ($avarage == 0)
                                                No Rating Yet
                                            @elseif($avarage == 1 || $avarage < 2)
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            @elseif($avarage == 2 || $avarage < 3)
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            @elseif($avarage == 3 || $avarage < 4)
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            @elseif($avarage == 4 || $avarage < 5)
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                            @elseif($avarage == 5 || $avarage < 5)
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                            @endif

                                        </div>

                                        <div class="col-sm-8">
                                            <div class="reviews">
                                                <a href="#" class="lnk">({{ count($reviewcount) }}
                                                    Reviews)</a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.rating-reviews -->

                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="stock-box">
                                                <span class="label">Availability :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span class="value">In Stock</span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.stock-container -->

                                <div class="description-container m-t-20">
                                    @if (session()->get('language') == 'hindi')
                                        {{ $product->short_descp_hin }}
                                    @else
                                        {{ $product->short_descp_en }}
                                    @endif
                                </div><!-- /.description-container -->

                                <div class="price-container info-container m-t-20">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="price-box">
                                                @if ($product->discount_price == null)
                                                    <span class="price">৳{{ $product->selling_price }}</span>
                                                @else
                                                    <span class="price">৳{{ $product->discount_price }}</span>
                                                    <span class="price-strike">৳{{ $product->selling_price }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon"
                                                    type="button" title="Add Cart"
                                                    data-toggle="modal"
                                                    data-target="#exampleModal"
                                                    id="{{ $product->id }}"
                                                    onclick="productView(this.id)"> <i
                                                        class="fa fa-shopping-cart"></i>
                                                </button>

                                                <button class="btn btn-primary cart-btn"
                                                    type="button">Add to
                                                    cart</button>
                                            </li>
                                            <button class="btn btn-primary icon"
                                                type="button" title="Wishlist"
                                                id="{{ $product->id }}"
                                                onclick="addToWishList(this.id)"> <i
                                                    class="fa fa-heart"></i>
                                            </button>
                                            <li class="lnk"> <a data-toggle="tooltip"
                                                    class="add-to-cart"
                                                    id="{{ $product->id }}"
                                                    onclick="addToCompare(this.id)"title="Compare">
                                                    <i class="fa fa-signal"
                                                        aria-hidden="true"></i> </a>
                                            </li>
                                        </ul> --}}

                                        <div class="col-sm-6">
                                            <div class="favorite-button m-t-10">
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                    title="Wishlist" href="#" id="{{ $product->id }}"
                                                    onclick="addToWishList(this.id)">
                                                    <i class="fa fa-heart"></i>
                                                </a>

                                                <a class="btn btn-primary" data-toggle="tooltip"
                                                    data-placement="right" title="Add to Compare" href="#"id="{{ $product->id }}"
                                                    onclick="addToWishList(this.id)">
                                                    <i class="fa fa-signal"></i>
                                                </a>
                                                {{-- <a class="btn btn-primary" data-toggle="tooltip"
                                                    data-placement="right" title="E-mail" href="#">
                                                    <i class="fa fa-envelope"></i>
                                                </a> --}}
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->
                                <!--     /// Add Product Color And Product Size ///// -->

                                <div class="row">


                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label class="info-title control-label">Choose Color <span> </span></label>
                                            <select class="form-control unicase-form-control selectpicker"
                                                style="display: none;" id="color">
                                                <option selected="" disabled="">--Choose Color--</option>
                                                @foreach ($product_color_en as $color)
                                                    <option value="{{ $color }}">{{ ucwords($color) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div> <!-- // end form group -->

                                    </div> <!-- // end col 6 -->

                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            @if ($product->product_size_en == null)
                                            @else
                                                <label class="info-title control-label">Choose Size <span>
                                                    </span></label>
                                                <select class="form-control unicase-form-control selectpicker"
                                                    style="display: none;" id="size">
                                                    <option selected="" disabled="">--Choose Size--</option>
                                                    @foreach ($product_size_en as $size)
                                                        <option value="{{ $size }}">{{ ucwords($size) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif

                                        </div> <!-- // end form group -->


                                    </div> <!-- // end col 6 -->

                                </div><!-- /.row -->

                                <!--     /// End Add Product Color And Product Size ///// -->

                                <div class="quantity-container info-container">
                                    <div class="row">

                                        <div class="col-sm-2">
                                            <span class="label">Qty :</span>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                        <div class="arrow plus gradient"><span class="ir plus"><i
                                                                    class="icon fa fa-sort-asc"></i></span></div>
                                                        <div class="arrow minus gradient"><span class="ir minus"><i
                                                                    class="icon fa fa-sort-desc"></i></span></div>
                                                    </div>
                                                    <input type="text" id="qty" value="1"
                                                        min="1">
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" id="product_id" value="{{ $product->id }}"
                                            min="1">

                                        <div class="col-sm-7">
                                            {{-- <a href="{{ route('checkout.page', ['id' => $product->id]) }}"
                                                class="btn btn-warning">
                                                <i class="fa fa-shopping-cart inner-right-vs"></i> Buy Now
                                            </a> --}}

                                            <form action="{{ route('checkout.page') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="qty" id="qtyInput" value="1">
                                                <input type="hidden" name="color" id="colorInput">
                                                <input type="hidden" name="size" id="sizeInput">
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="fa fa-shopping-cart inner-right-vs"></i> Buy Now
                                                </button>
                                            </form>
                                            <button type="submit" onclick="addToCart()" class="btn btn-primary"><i
                                                    class="fa fa-shopping-cart inner-right-vs"></i> Add to
                                                    Cart
                                            </button>
                                        </div>


                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->



                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox_8tvu"></div>




                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                </div>

                <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-3">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                            </ul><!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-9">

                            <div class="tab-content">

                                <div id="description" class="tab-pane in active">
                                    <div class="product-tab">
                                        <p class="text">
                                            @if (session()->get('language') == 'hindi')
                                                {!! $product->long_descp_hin !!}
                                            @else
                                                {!! $product->long_descp_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div><!-- /.tab-pane -->

                                <div id="review" class="tab-pane">
                                    <div class="product-tab">

                                        <div class="product-reviews">
                                            <h4 class="title">Customer Reviews</h4>

                                            @php
                                                $reviews = App\Models\Review::where('product_id', $product->id)
                                                    ->latest()
                                                    ->limit(5)
                                                    ->get();
                                            @endphp

                                            <div class="reviews">

                                                @foreach ($reviews as $item)
                                                    @if ($item->status == 0)
                                                    @else
                                                        <div class="review">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <img style="border-radius: 50%"
                                                                        src="{{ !empty($item->user->profile_photo_path) ? url('upload/user_images/' . $item->user->profile_photo_path) : url('upload/no_image.jpg') }}"
                                                                        width="40px;" height="40px;"><b>
                                                                        {{ $item->user->name }}</b>
                                                                    @if ($item->rating == null)
                                                                    @elseif($item->rating == 1)
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                    @elseif($item->rating == 2)
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                    @elseif($item->rating == 3)
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                    @elseif($item->rating == 4)
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star"></span>
                                                                    @elseif($item->rating == 5)
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-6">
                                                                </div>
                                                            </div> <!-- // end row -->
                                                            <div class="review-title"><span
                                                                    class="summary">{{ $item->summary }}</span><span
                                                                    class="date"><i
                                                                        class="fa fa-calendar"></i><span>
                                                                        {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                                    </span></span></div>
                                                            <div class="text">"{{ $item->comment }}"</div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div><!-- /.reviews -->
                                        </div><!-- /.product-reviews -->
                                        <div class="product-add-review">
                                            <h4 class="title">Write your own review</h4>
                                            <div class="review-table">
                                            </div><!-- /.review-table -->
                                            <div class="review-form">
                                                @guest
                                                    <p> <b> For Add Product Review. You Need to Login First <a
                                                                href="{{ route('login') }}">Login Here</a> </b> </p>
                                                @else
                                                    <div class="form-container">
                                                        <form role="form" class="cnt-form" method="post"
                                                            action="{{ route('review.store') }}">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product->id }}">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="cell-label">&nbsp;</th>
                                                                        <th>1 star</th>
                                                                        <th>2 stars</th>
                                                                        <th>3 stars</th>
                                                                        <th>4 stars</th>
                                                                        <th>5 stars</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="cell-label">Quality</td>
                                                                        <td><input type="radio" name="quality"
                                                                                class="radio" value="1"></td>
                                                                        <td><input type="radio" name="quality"
                                                                                class="radio" value="2"></td>
                                                                        <td><input type="radio" name="quality"
                                                                                class="radio" value="3"></td>
                                                                        <td><input type="radio" name="quality"
                                                                                class="radio" value="4"></td>
                                                                        <td><input type="radio" name="quality"
                                                                                class="radio" value="5"></td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                            <div class="row">
                                                                <div class="col-sm-6">

                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span
                                                                                class="astk">*</span></label>
                                                                        <input type="text" name="summary"
                                                                            class="form-control txt"
                                                                            id="exampleInputSummary" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span
                                                                                class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review" name="comment" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->

                                                            <div class="action text-right">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-upper">SUBMIT
                                                                    REVIEW</button>
                                                            </div><!-- /.action -->

                                                        </form><!-- /.cnt-form -->
                                                    </div><!-- /.form-container -->
                                                @endguest
                                            </div><!-- /.review-form -->

                                        </div><!-- /.product-add-review -->

                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->
                                <div id="tags" class="tab-pane">
                                    <div class="product-tag">
                                        <h4 class="title">Product Tags</h4>
                                        <form role="form" class="form-inline form-cnt">
                                            <div class="form-container">

                                                <div class="form-group">
                                                    <label for="exampleInputTag">Add Your Tags: </label>
                                                    <input type="email" id="exampleInputTag"
                                                        class="form-control txt">
                                                </div>
                                                <button class="btn btn-upper btn-primary" type="submit">ADD
                                                    TAGS</button>
                                            </div><!-- /.form-container -->
                                        </form><!-- /.form-cnt -->

                                        <form role="form" class="form-inline form-cnt">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <span class="text col-md-offset-3">Use spaces to separate tags. Use
                                                    single quotes (') for phrases.</span>
                                            </div>
                                        </form><!-- /.form-cnt -->

                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.product-tabs -->

                <!-- ===== ======= UPSELL PRODUCTS ==== ========== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Releted products</h3>
                    <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                        @foreach ($relatedProduct as $product)
                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}"><img
                                                        src="{{ asset($product->product_thambnail) }}"
                                                        alt=""></a>
                                            </div><!-- /.image -->

                                            <div class="tag sale"><span>sale</span></div>
                                        </div><!-- /.product-image -->


                                        <div class="product-info text-left">
                                            <h3 class="name"><a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                    @if (session()->get('language') == 'hindi')
                                                        {{ $product->product_name_hin }}
                                                    @else
                                                        {{ $product->product_name_en }}
                                                    @endif
                                                </a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>


                                            @if ($product->discount_price == null)
                                                <div class="product-price">
                                                    <span class="price">
                                                        ৳{{ $product->selling_price }} </span>
                                                </div><!-- /.product-price -->
                                            @else
                                                <div class="product-price">
                                                    <span class="price">
                                                        ৳{{ $product->discount_price }} </span>
                                                    <span class="price-before-discount">৳
                                                        {{ $product->selling_price }}</span>
                                                </div><!-- /.product-price -->
                                            @endif
                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" type="button"
                                                            title="Add Cart" data-toggle="modal"
                                                            data-target="#exampleModal" id="{{ $product->id }}"
                                                            onclick="productView(this.id)"> <i
                                                                class="fa fa-shopping-cart"></i> </button>

                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <button class="btn btn-primary icon" type="button"
                                                        title="Wishlist" id="{{ $product->id }}"
                                                        onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i>
                                                    </button>

                                                    <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                            id="{{ $product->id }}"
                                                            onclick="addToCompare(this.id)"title="Compare">
                                                            <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                </ul>
                                            </div>
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div><!-- /.item -->
                        @endforeach

                    </div><!-- /.home-owl-carousel -->
                </section><!-- /.section -->
                <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->

    </div>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e4b85f98de5201f"></script>
    <script>
        $(document).ready(function() {
            // Increase quantity
            $('.plus').click(function() {
                var input = $(this).parent().siblings('input');
                var newValue = parseInt(input.val()) + 1;
                input.val(newValue);
            });

            // Decrease quantity
            $('.minus').click(function() {
                var input = $(this).parent().siblings('input');
                var newValue = parseInt(input.val()) - 1;
                if (newValue >= parseInt(input.attr('min'))) {
                    input.val(newValue);
                }
            });


        $('form').on('submit', function(event) {
        // Capture selected color, size, and quantity
        const selectedColor = $('#color').val();
        const selectedSize = $('#size').val();
        const selectedQty = $('#qty').val();
        var productId = $('#product_id').val();
        var productName = $('#pname').text();

        // Debugging output
        console.log("Selected Color:", selectedColor);
        console.log("Selected Size:", selectedSize);
        console.log("Selected Qty:", selectedQty);
        console.log("Product ID:", productId);
        console.log("Product Name:", productName);

        // Update the hidden form fields with selected values
        $('#colorInput').val(selectedColor);
        $('#sizeInput').val(selectedSize);
        $('#qtyInput').val(selectedQty);
        $('#pname').val(productName);
       });

});



    </script>
@endsection
