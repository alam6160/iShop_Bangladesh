<header class="header-style-1">
    <style>
        .cart-align-right {
            text-align: left;
            /* Default alignment */
        }

        @media (max-width: 768px) {
            .cart-align-right {
                text-align: right;
                float: right;
            }
        }

        .search-container {
            position: relative;
            max-width: 700px;
            margin-top: 10px;
        }

        #product-search {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .search-button {
            position: absolute;
            right: 0px;
            top: 1px;
            background: none;
            border: none;
            cursor: pointer;


            font-size: 30px;
        }

        .search-results-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            max-height: 300px;
            overflow-y: auto;
            z-index: 1000;
        }

        .search-results-dropdown .product-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .search-results-dropdown .product-item:hover {
            background-color: #f9f9f9;
        }

        .search-results-dropdown .product-item img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            margin-right: 10px;
        }

        .search-results-dropdown .product-item h4 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
        }

        .search-results-dropdown .product-item p {
            margin: 0;
            font-size: 14px;
            color: #666;
        }
    </style>
    @php
        use App\Models\Banner;
        $banner = Banner::first();
    @endphp

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/dashboard') }}"><i class="icon fa fa-user"></i>
                                @if (session()->get('language') == 'hindi')
                                    मेरी प्रोफाइल
                                @else
                                    My Account
                                @endif
                            </a></li>
                        <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                        <li><a href="{{ route('compare') }}"><i class="icon fa fa-signal"></i>
                                @if (session()->get('language') == 'bangla')
                                    তুলনা লিস্ট
                                @else
                                    Compare List
                                @endif
                            </a></li>
                        <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                        <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>Checkout</a></li>

                        <li><a href="" type="button" data-toggle="modal" data-target="#ordertraking"><i
                                    class="icon fa fa-check"></i>Order Traking</a></li>

                        <li>

                            @auth
                                <a href="{{ route('dashboard') }}"><i class="icon fa fa-user"></i>User Profile</a>
                            @else
                                <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login/Register</a>
                            @endauth

                        </li>
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        {{-- <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">USD</a></li>
                <li><a href="#">INR</a></li>
                <li><a href="#">GBP</a></li>
              </ul>
            </li> --}}
                        {{-- <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle"
                                data-hover="dropdown" data-toggle="dropdown"><span class="value">
                                    @if (session()->get('language') == 'hindi')
                                        भाषा: हिन्दी
                                    @else
                                        Language
                                    @endif
                                </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if (session()->get('language') == 'hindi')
                                    <li><a href="{{ route('english.language') }}">English</a></li>
                                @else
                                    <li><a href="{{ route('hindi.language') }}">हिन्दी</a></li>
                                @endif
                            </ul>
                        </li> --}}
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">

                    @php
                        $setting = App\Models\SiteSetting::find(1);
                    @endphp


                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset($setting->logo ?? '') }}" alt="logo"
                                style="width: 200px; height: auto; margin-bottom:2px">
                        </a>
                    </div>
                    <!-- /.logo -->
                    <!-- ================================================== LOGO : END ======================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-8 col-md-6 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    {{-- <div class="search-area">
                        <form method="post" action="{{ route('product.search') }}">
                            @csrf
                            <div class="control-group">

                                <input class="search-field" onfocus="search_result_show()" onblur="search_result_hide()"
                                    id="search" name="search" placeholder="Search here..." />

                                <button class="search-button" type="submit"></button>
                            </div>
                        </form>
                        <div id="searchProducts"></div>
                    </div> --}}
                    <div class="search-container">
                        <input type="text" id="product-search" placeholder="Search for products..."
                            autocomplete="off">
                        <button class="search-button">
                            <i class="fas fa-search"></i>
                        </button>
                        <div id="search-results" class="search-results-dropdown"></div>
                    </div>


                    <!-- /.search-area -->
                    <!-- ================= SEARCH AREA : END ================== -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-6 col-sm-2 col-md-2 animate-dropdown top-cart-row cart-align-right">
                    <!-- ===== === SHOPPING CART DROPDOWN ===== == -->
                    <div class="dropdown dropdown-cart "> <a href="" class="dropdown-toggle lnk-cart"
                            data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count" id="cartQty"> </span></div>
                                <div class="total-price-basket"> <span class="lbl">cart -</span>
                                    <span class="total-price"> <span class="sign">৳</span>
                                        <span class="value" id="cartSubTotal"> </span> </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu col-sm-2">
                            <li>
                                <div id="miniCart">
                                </div>
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span>
                                        <span class='price' id="cartSubTotal"> </span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="{{ url('/checkout') }}"
                                        class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- == === SHOPPING CART DROPDOWN : END=== === -->
                </div>

                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown" style="background-color:black ">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw"> <a href="{{ url('/') }}">
                                        @if (session()->get('language') == 'hindi')
                                            घर
                                        @else
                                            Home
                                        @endif
                                    </a> </li>

                                <!--   // Get Category Table Data -->
                                @php
                                    $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                                @endphp


                                @foreach ($categories as $category)
                                    <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown"
                                            class="dropdown-toggle" data-toggle="dropdown">
                                            @if (session()->get('language') == 'hindi')
                                                {{ $category->category_name_hin }}
                                            @else
                                                {{ $category->category_name_en }}
                                            @endif
                                        </a>
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content ">
                                                    <div class="row">

                                                        <!--   // Get SubCategory Table Data -->
                                                        @php
                                                            $subcategories = App\Models\SubCategory::where(
                                                                'category_id',
                                                                $category->id,
                                                            )
                                                                ->orderBy('subcategory_name_en', 'ASC')
                                                                ->get();
                                                        @endphp

                                                        @foreach ($subcategories as $subcategory)
                                                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">

                                                                <a
                                                                    href="{{ url('subcategory/product/' . $subcategory->id . '/' . $subcategory->subcategory_slug_en) }}">
                                                                    <h2 class="title">
                                                                        @if (session()->get('language') == 'hindi')
                                                                            {{ $subcategory->subcategory_name_hin }}
                                                                        @else
                                                                            {{ $subcategory->subcategory_name_en }}
                                                                        @endif
                                                                    </h2>
                                                                </a>
                                                                <!--   // Get SubSubCategory Table Data -->
                                                                @php
                                                                    $subsubcategories = App\Models\SubSubCategory::where(
                                                                        'subcategory_id',
                                                                        $subcategory->id,
                                                                    )
                                                                        ->orderBy('subsubcategory_name_en', 'ASC')
                                                                        ->get();
                                                                @endphp

                                                                @foreach ($subsubcategories as $subsubcategory)
                                                                    <ul class="links">
                                                                        <li><a
                                                                                href="{{ url('subsubcategory/product/' . $subsubcategory->id . '/' . $subsubcategory->subsubcategory_slug_en) }}">
                                                                                @if (session()->get('language') == 'hindi')
                                                                                    {{ $subsubcategory->subsubcategory_name_hin }}
                                                                                @else
                                                                                    {{ $subsubcategory->subsubcategory_name_en }}
                                                                                @endif
                                                                            </a></li>

                                                                    </ul>
                                                                @endforeach
                                                                <!-- // End SubSubCategory Foreach -->

                                                            </div>
                                                            <!-- /.col -->
                                                        @endforeach
                                                        <!-- // End SubCategory Foreach -->
                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                            <img class="img-responsive"
                                                                src="{{ asset($banner->nav_img) }}" alt="">
                                                        </div>
                                                        <!-- /.yamm-content -->
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach <!-- // End Category Foreach -->
                                <li> <a href="{{ route('shop.page') }}">Shop</a> </li>

                                {{-- <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a>
                                </li> --}}

                                {{-- <li class="dropdown  navbar-right special-menu"> <a
                                        href="{{ route('home.blog') }}">Blog</a> </li> --}}


                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

    <!-- Order Traking Modal -->
    <div class="modal fade" id="ordertraking" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Track Your Order </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="{{ route('order.tracking') }}">
                        @csrf
                        <div class="modal-body">
                            <label>Invoice Code</label>
                            <input type="text" name="code" required="" class="form-control"
                                placeholder="Your Order Invoice Number">
                        </div>
                        <button class="btn btn-danger" type="submit" style="margin-left: 17px;"> Track Now </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    $(document).ready(function() {
        $('#product-search').on('keyup', function() {
            let query = $(this).val();

            if (query.length > 0) {
                $.ajax({
                    url: '{{ route('product.search.ajax') }}',
                    method: 'GET',
                    data: {
                        query: query
                    },
                    success: function(response) {
                        $('#search-results').empty();

                        if (response.length > 0) {
                            response.forEach(product => {
                                let productElement = `
                                <div class="product-item">
                                    <div class="image">
                                        <a href="{{ url('product/details/${product.id}/${product.product_slug_en}') }}">
                                            <img src="{{ asset('${product.product_thambnail}') }}" alt="${product.product_name_en}" width="50" height="50">
                                        </a>
                                    </div>
                                    <a  href="{{ url('product/details/${product.id}/${product.product_slug_en}') }}">
                                    <div class="product-info">
                                        <h4>${product.product_name_en}</h4>
                                        <p>${product.short_descp_en}</p>
                                    </div>
                                    </a>
                                </div>`;
                                $('#search-results').append(productElement);
                            });
                        } else {
                            $('#search-results').append('<p>No products found</p>');
                        }
                    }
                });
            } else {
                $('#search-results').empty();
            }
        });
    });

    // function search_result_hide() {
    //     $("#searchProducts").slideUp();
    // }

    // function search_result_show() {
    //     $("#searchProducts").slideDown();
    // }
</script>
