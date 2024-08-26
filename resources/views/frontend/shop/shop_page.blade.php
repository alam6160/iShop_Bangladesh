@extends('frontend.main_master')
@section('content')
@section('title')
    Shop Page
@endsection
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Shop Page</a></li>

            </ul>
        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <form action="{{ route('shop.filter') }}" method="post">
            @csrf
            <div class='row'>
                <div class='col-md-3 sidebar'>
                    <!-- ===== == TOP NAVIGATION ======= ==== -->
                    @include('frontend.common.vertical_menu')
                    <!-- = ==== TOP NAVIGATION : END === ===== -->
                    <div class="sidebar-module-container">
                        <div class="sidebar-filter">
                            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <h1 class="section-title">shop by</h1>
                                <div class="widget-header">
                                    <h2 class="widget-title">Category</h2>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="accordion">

                                        @if (!empty($_GET['category']))
                                            @php
                                                $filterCat = explode(',', $_GET['category']);
                                            @endphp
                                        @endif
                                        @foreach ($categories as $category)
                                            <div class="accordion-group">
                                                <div class="accordion-heading">

                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="category[]" value="{{ $category->category_slug_en }}"
                                                            @if (!empty($filterCat) && in_array($category->category_slug_en, $filterCat)) checked @endif
                                                            onchange="this.form.submit()">

                                                        @if (session()->get('language') == 'hindi')
                                                            {{ $category->category_name_hin }}
                                                        @else
                                                            {{ $category->category_name_en }}
                                                        @endif
                                                    </label>
                                                </div>
                                                <!-- /.accordion-heading -->
                                            </div>
                                            <!-- /.accordion-group -->
                                        @endforeach
                                    </div>
                                    <!-- /.accordion -->
                                </div>
                                <!-- /.sidebar-widget-body -->

                                <!-- /.sidebar-widget -->

                                <!--  /////////// This is for Brand Filder /////////////// -->

                                <div class="widget-header">
                                    <h4 class="widget-title">Brand Filter</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="accordion">
                                        @if (!empty($_GET['brand']))
                                            @php
                                                $filterBrand = explode(',', $_GET['brand']);
                                            @endphp
                                        @endif
                                        @foreach ($brands as $brand)
                                            <div class="accordion-group">
                                                <div class="accordion-heading">

                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="brand[]"
                                                            value="{{ $brand->brand_slug_en }}"
                                                            @if (!empty($filterBrand) && in_array($brand->brand_slug_en, $filterBrand)) checked @endif
                                                            onchange="this.form.submit()">

                                                        @if (session()->get('language') == 'hindi')
                                                            {{ $brand->brand_name_hin }}
                                                        @else
                                                            {{ $brand->brand_name_en }}
                                                        @endif

                                                    </label>
                                                </div>
                                                <!-- /.accordion-heading -->

                                            </div>
                                            <!-- /.accordion-group -->
                                        @endforeach
                                    </div>
                                    <!-- /.accordion -->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

                            <!-- ============================================== PRICE SILDER============================================== -->
                            {{-- <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Price Slider</h4>
                                </div>
                                <div class="sidebar-widget-body m-t-10">
                                    <div class="price-range-holder">
                                        <span class="min-max">
                                            <span class="pull-left" id="min-price">৳0</span>
                                            <span class="pull-right" id="max-price">৳10000</span>
                                        </span>
                                        <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;" readonly>
                                        <div id="price-slider"></div>
                                    </div>
                                    <!-- /.price-range-holder -->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div> --}}
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== PRICE SILDER : END ============================================== -->
                            <!-- ============================================== MANUFACTURES============================================== -->
                            {{-- <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Manufactures</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul class="list">
                                        <li><a href="#">Forever 18</a></li>
                                        <li><a href="#">Nike</a></li>
                                        <li><a href="#">Dolce & Gabbana</a></li>
                                        <li><a href="#">Alluare</a></li>
                                        <li><a href="#">Chanel</a></li>
                                        <li><a href="#">Other Brand</a></li>
                                    </ul>
                                    <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div> --}}
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== MANUFACTURES: END ============================================== -->
                            <!-- ============================================== COLOR============================================== -->
                            {{-- <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Colors</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul class="list">
                                        <li><a href="#">Red</a></li>
                                        <li><a href="#">Blue</a></li>
                                        <li><a href="#">Yellow</a></li>
                                        <li><a href="#">Pink</a></li>
                                        <li><a href="#">Brown</a></li>
                                        <li><a href="#">Teal</a></li>
                                    </ul>
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div> --}}
                            <!-- /.sidebar-widget -->
                            <!-- ==================== COLOR: END ============================================== -->
                            <!-- == ======= COMPARE==== ==== -->
                            {{-- <div class="sidebar-widget wow fadeInUp outer-top-vs">
                                <h3 class="section-title">Compare products</h3>
                                <div class="sidebar-widget-body">
                                    <div class="compare-report">
                                        <p>You have no <span>item(s)</span> to compare</p>
                                    </div>
                                    <!-- /.compare-report -->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div> --}}
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== COMPARE: END ============== -->
                            <!-- == ====== PRODUCT TAGS ==== ======= -->
                            @include('frontend.common.product_tags')
                            <!-- /.sidebar-widget -->
                            <!-- == ====== END PRODUCT TAGS ==== ======= -->

                            <!----------- Testimonials------------->

                            {{-- @include('frontend.common.testimonials') --}}
                            <!-- == ========== Testimonials: END ======== ========= -->

                            {{-- <div class="home-banner"> <img
                                    src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
                            </div> --}}
                        </div>
                        <!-- /.sidebar-filter -->
                    </div>
                    <!-- /.sidebar-module-container -->
                </div>
                <!-- /.sidebar -->
                <div class='col-md-9'>

                    <!-- == ==== SECTION – HERO === ====== -->

                    <div id="category" class="category-carousel hidden-xs">
                        <div class="item">
                            <div class="image"> <img
                                    src="{{ asset($banner->shop_banner) }}" alt="banner"
                                    class="img-responsive"> </div>
                            {{-- <div class="container-fluid">
                                <div class="caption vertical-top text-left">
                                    <div class="big-text"> Big Sale </div>
                                    <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                                    <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit </div>
                                </div>
                                <!-- /.caption -->
                            </div> --}}
                            <!-- /.container-fluid -->
                        </div>
                    </div>
                    <div class="clearfix filters-container m-t-10">
                        <div class="row">
                            <div class="col col-sm-6 col-md-2">
                                <div class="filter-tabs">
                                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                        <li class="active"> <a data-toggle="tab" href="#grid-container"><i
                                                    class="icon fa fa-th-large"></i>Grid</a> </li>
                                        <li><a data-toggle="tab" href="#list-container"><i
                                                    class="icon fa fa-th-list"></i>List</a></li>
                                    </ul>
                                </div>
                                <!-- /.filter-tabs -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-12 col-md-6">
                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <button data-toggle="dropdown" type="button"
                                                    class="btn dropdown-toggle"> Position <span class="caret"></span>
                                                </button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li role="presentation"><a href="#">position</a></li>
                                                    <li role="presentation"><a href="#">Price:Lowest first</a>
                                                    </li>
                                                    <li role="presentation"><a href="#">Price:HIghest first</a>
                                                    </li>
                                                    <li role="presentation"><a href="#">Product Name:A to Z</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.fld -->
                                    </div>
                                    <!-- /.lbl-cnt -->
                                </div>
                                <!-- /.col -->
                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"> <span class="lbl">Show</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <button data-toggle="dropdown" type="button"
                                                    class="btn dropdown-toggle"> 1 <span class="caret"></span>
                                                </button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li role="presentation"><a href="#">1</a></li>
                                                    <li role="presentation"><a href="#">2</a></li>
                                                    <li role="presentation"><a href="#">3</a></li>
                                                    <li role="presentation"><a href="#">4</a></li>
                                                    <li role="presentation"><a href="#">5</a></li>
                                                    <li role="presentation"><a href="#">6</a></li>
                                                    <li role="presentation"><a href="#">7</a></li>
                                                    <li role="presentation"><a href="#">8</a></li>
                                                    <li role="presentation"><a href="#">9</a></li>
                                                    <li role="presentation"><a href="#">10</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.fld -->
                                    </div>
                                    <!-- /.lbl-cnt -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-6 col-md-4 text-right">

                                <!-- /.pagination-container -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>


                    <!--    //////////////////// START Product Grid View  ////////////// -->

                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">
                                        @foreach ($products as $product)
                                            <div class="col-sm-2 col-md-2 col-lg-3 wow fadeInUp">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a
                                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}"><img
                                                                        src="{{ asset($product->product_thambnail) }}"
                                                                        alt=""></a> </div>
                                                            <!-- /.image -->
                                                            @php
                                                                $amount =
                                                                    $product->selling_price - $product->discount_price;
                                                                $discount = ($amount / $product->selling_price) * 100;
                                                            @endphp

                                                            <div>
                                                                @if ($product->discount_price == null)
                                                                    <div class="tag new"><span>new</span></div>
                                                                @else
                                                                    <div class="tag hot">
                                                                        <span>{{ round($discount) }}%</span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a
                                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                                    @if (session()->get('language') == 'hindi')
                                                                        {{ $product->product_name_hin }}
                                                                    @else
                                                                        {{ $product->product_name_en }}
                                                                    @endif
                                                                </a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            @if ($product->discount_price == null)
                                                                <div class="product-price"> <span class="price">
                                                                        ৳{{ $product->selling_price }} </span> </div>
                                                            @else
                                                                <div class="product-price"> <span class="price">
                                                                        ৳{{ $product->discount_price }} </span> <span
                                                                        class="price-before-discount">৳
                                                                        {{ $product->selling_price }}</span> </div>
                                                            @endif
                                                            <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
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
                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product -->

                                                </div>
                                                <!-- /.products -->
                                            </div>
                                            <!-- /.item -->
                                        @endforeach
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.category-product -->

                            </div>
                            <!-- /.tab-pane -->

                            <!--            /////////// END Product Grid View  /////////// -->


                            <!--            ////////////// Product List View Start ////////// -->

                            <div class="tab-pane " id="list-container">
                                <div class="category-product">
                                    @foreach ($products as $product)
                                        <div class="category-product-inner wow fadeInUp">
                                            <div class="products">
                                                <div class="product-list product">
                                                    <div class="row product-list-row">
                                                        <div class="col col-sm-4 col-lg-4">
                                                            <div class="product-image">
                                                                <div class="image"> <img
                                                                        src="{{ asset($product->product_thambnail) }}"
                                                                        alt=""> </div>
                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-sm-8 col-lg-8">
                                                            <div class="product-info">
                                                                <h3 class="name"><a
                                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                                        @if (session()->get('language') == 'hindi')
                                                                            {{ $product->product_name_hin }}
                                                                        @else
                                                                            {{ $product->product_name_en }}
                                                                        @endif
                                                                    </a>
                                                                </h3>
                                                                <div class="rating rateit-small"></div>
                                                                @if ($product->discount_price == null)
                                                                    <div class="product-price"> <span class="price">
                                                                            ৳{{ $product->selling_price }} </span>
                                                                    </div>
                                                                @else
                                                                    <div class="product-price"> <span class="price">
                                                                            ${{ $product->discount_price }} </span>
                                                                        <span class="price-before-discount">৳
                                                                            {{ $product->selling_price }}</span>
                                                                    </div>
                                                                @endif

                                                                <!-- /.product-price -->
                                                                <div class="description m-t-10">
                                                                    @if (session()->get('language') == 'hindi')
                                                                        {{ $product->short_descp_hin }}
                                                                    @else
                                                                        {{ $product->short_descp_en }}
                                                                    @endif
                                                                </div>
                                                                <div class="cart clearfix animate-effect">
                                                                    <div class="action">
                                                                        <ul class="list-unstyled">
                                                                            <li class="add-cart-button btn-group">
                                                                                <button class="btn btn-primary icon"
                                                                                    type="button" title="Add Cart"
                                                                                    data-toggle="modal"
                                                                                    data-target="#exampleModal"
                                                                                    id="{{ $product->id }}"
                                                                                    onclick="productView(this.id)"> <i
                                                                                        class="fa fa-shopping-cart"></i>
                                                                                </button>

                                                                                <button
                                                                                    class="btn btn-primary cart-btn"
                                                                                    type="button">Add to
                                                                                    cart</button>
                                                                            </li>
                                                                            <button class="btn btn-primary icon"
                                                                                type="button" title="Wishlist"
                                                                                id="{{ $product->id }}"
                                                                                onclick="addToWishList(this.id)"> <i
                                                                                    class="fa fa-heart"></i>
                                                                            </button>
                                                                            <li class="lnk"> <a
                                                                                    data-toggle="tooltip"
                                                                                    class="add-to-cart"
                                                                                    id="{{ $product->id }}"
                                                                                    onclick="addToCompare(this.id)"title="Compare">
                                                                                    <i class="fa fa-signal"
                                                                                        aria-hidden="true"></i> </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- /.action -->
                                                                </div>
                                                                <!-- /.cart -->

                                                            </div>
                                                            <!-- /.product-info -->
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    @php
                                                        $amount = $product->selling_price - $product->discount_price;
                                                        $discount = ($amount / $product->selling_price) * 100;
                                                    @endphp

                                                    <!-- /.product-list-row -->
                                                    <div>
                                                        @if ($product->discount_price == null)
                                                            <div class="tag new"><span>new</span></div>
                                                        @else
                                                            <div class="tag hot"><span>{{ round($discount) }}%</span>
                                                            </div>
                                                        @endif
                                                    </div>

                                                </div>
                                                <!-- /.product-list -->
                                            </div>
                                            <!-- /.products -->
                                        </div>
                                        <!-- /.category-product-inner -->
                                    @endforeach

                                    <!--            //////////////////// Product List View END ////////////// -->

                                </div>
                                <!-- /.category-product -->
                            </div>
                            <!-- /.tab-pane #list-container -->
                        </div>
                        <!-- /.tab-content -->

                        {{ $products->appends($_GET)->links('vendor.pagination.custom') }}


                    </div>
                    <!-- /.search-result-container -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp">
                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                        <div class="item m-t-15"> <a href="#" class="image"> <img
                                    data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif"
                                    alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item m-t-10"> <a href="#" class="image"> <img
                                    data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif"
                                    alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img
                                    data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif"
                                    alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img
                                    data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif"
                                    alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img
                                    data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif"
                                    alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img
                                    data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif"
                                    alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img
                                    data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif"
                                    alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img
                                    data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif"
                                    alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img
                                    data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif"
                                    alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img
                                    data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif"
                                    alt=""> </a> </div>
                        <!--/.item-->
                    </div>
                    <!-- /.owl-carousel #logo-slider -->
                </div>
                <!-- /.logo-slider-inner -->

            </div>
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </form>

    </div>
    <!-- /.container -->

</div>
<!-- /.body-content -->


<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
{{-- <script>
    console.log('hi');
    jQuery(document).ready(function() {

        $("#price-slider").slider({
            range: true,
            min: 100,
            max: 10000,
            values: [100, 10000],
            slide: function(event, ui) {
                $("#amount").val("৳" + ui.values[0] + " - ৳" + ui.values[1]);
            }
        });

        // Trigger AJAX request when filter button is clicked
        $("#filter-products").click(function(event) {
            event.preventDefault();
            var minPrice = $("#price-slider").slider("values", 0);
            var maxPrice = $("#price-slider").slider("values", 1);
            filterProductsByPrice(minPrice, maxPrice);
        });
    });

    // Function to handle AJAX request
    function filterProductsByPrice(minPrice, maxPrice) {

        $.ajax({
            url: "{{ route('products.price-search') }}",
            type: "GET",
            data: {
                minPrice: minPrice,
                maxPrice: maxPrice
            },

            success: function(data) {
                // Handle the response data (e.g., update the product list)
            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
            }
        });
    }
</script> --}}

<script>
    $(document).ready(function() {
        console.log("Document is ready");

        $("#price-slider").slider({
            range: true,
            min: 0,
            max: 10000,
            values: [0, 10000],
            slide: function(event, ui) {
                console.log("Slider values: ", ui.values[0], ui.values[1]);

                $("#min-price").text('৳' + ui.values[0]);
                $("#max-price").text('৳' + ui.values[1]);
                $("#amount").val("৳" + ui.values[0] + " - ৳" + ui.values[1]);

                $.ajax({
                    url: route('product.price.slider'),
                    method: 'GET',
                    data: {
                        min_price: ui.values[0],
                        max_price: ui.values[1]
                    },
                    success: function(products) {
                        console.log("AJAX Success: ", products);
                        $('#product-list').empty();

                        products.forEach(function(product) {
                            var productHtml = `
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5 col-md-4 col-sm-2">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="/product/details/${product.id}/${product.product_slug_en}">
                                                            <img src="/${product.product_thambnail}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-xs-7 col-sm-4">
                                                <div class="product-info">
                                                    <h3 class="name">
                                                        <a href="/product/details/${product.id}/${product.product_slug_en}">
                                                            ${product.product_name_en}
                                                        </a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">৳${product.selling_price}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                            $('#product-list').append(productHtml);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error: ", status, error);
                    }
                });
            }
        });

        $("#amount").val("৳" + $("#price-slider").slider("values", 0) +
            " - ৳" + $("#price-slider").slider("values", 1));
    });
    </script>
@endsection
