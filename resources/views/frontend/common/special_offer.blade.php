<style>
    @media only screen and (max-width: 767px) {
        .test-deal {
            display: none;
        }
    }
</style>
<div class="sidebar-widget test-deal outer-bottom-small wow fadeInUp">
    <h3 class="section-title">Special Offer</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs" data-item="6">
            <div class="item">
                <div class="products special-product">

                    @foreach ($special_offer as $product)
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row d-flex align-items-center"
                                    style="margin-bottom: 15px;"> <!-- Flexbox for alignment -->
                                    <div class="col-xs-4 col-md-4 col-sm-4">
                                        <div class="product-image">
                                            <div class="image">
                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                    <img src="{{ asset($product->product_thambnail) }}" alt=""
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-sm-8">
                                        <div class="product-info">
                                            <h3 class="name">
                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                    @if (session()->get('language') == 'hindi')
                                                        {{ $product->product_name_hin }}
                                                    @else
                                                        {{ $product->product_name_en }}
                                                    @endif
                                                </a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="product-price">
                                                <span class="price"> ৳{{ $product->selling_price }} </span>
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
