@extends('frontend.main_master')
@section('content')
@section('title')
    My Checkout
@endsection
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Checkout</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->




<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">
                            <!-- panel-heading -->

                            <!-- panel-heading -->

                            <div id="collapseOne" class="panel-collapse collapse in">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">

                                        <!-- guest-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <h4 class="checkout-subtitle"><b>Shipping Address</b></h4>

                                            <form class="register-form" action="{{ route('checkout.store') }}"
                                                method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Your
                                                            Name</b> <span>*</span></label>
                                                    <input type="text" name="shipping_name"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Full Name" required="">
                                                </div> <!-- // end form group  -->


                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Email </b>
                                                        <span>*</span></label>
                                                    <input type="email" name="shipping_email"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Email" required="">
                                                </div> <!-- // end form group  -->


                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Phone</b>
                                                        <span>*</span></label>
                                                    <input type="number" name="shipping_phone"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Phone" required="">
                                                </div> <!-- // end form group  -->

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Post Code </b>
                                                    </label>
                                                    <input type="text" name="post_code"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Post Code">
                                                </div> <!-- // end form group  -->
                                              </div>
                                               <!-- guest-login -->
                                              <!-- already-registered-login -->
                                               <div class="col-md-6 col-sm-6 already-registered-login">
                                              <div class="form-group">
                                                <h5><b>Division Select </b> <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="division_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Select
                                                            Division</option>
                                                        @foreach ($divisions as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->division_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('division_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                               </div> <!-- // end form group -->


                                              <div class="form-group">
                                                <h5><b>District Select</b> <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="district_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Select
                                                            District</option>

                                                    </select>
                                                    @error('district_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                              </div> <!-- // end form group -->


                                              <div class="form-group">
                                                <h5><b>State Select</b> </h5>
                                                <div class="controls">
                                                    <select name="state_id" class="form-control">
                                                        <option value="" selected="" disabled="">Select
                                                            State</option>

                                                    </select>
                                                    @error('state_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                              </div> <!-- // end form group -->

                                              <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Details Address
                                                </label>
                                                <textarea class="form-control" cols="30" rows="5" placeholder="Address" name="notes"></textarea>
                                              </div> <!-- // end form group  -->

                                            </div>
                                        <!-- already-registered-login -->

                                    </div>
                                </div>
                                <!-- panel-body  -->

                            </div><!-- row -->
                        </div>
                        <!-- End checkout-step-01  -->

                    </div><!-- /.checout-steps -->
                </div>

                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Products Details</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        <li style="font-size: 18px;">
                                            <strong>Image: </strong>
                                            <img src="{{ asset($product->product_thambnail ?? '') }}"
                                                style="height: 150px; width: 150px;">
                                        </li>
                                        <br>

                                        <li style="font-size: 18px;">
                                            <strong>Name: </strong>
                                            {{ $product->product_name_en }}
                                            <br>

                                            <strong>Qty: {{ $quantity }} </strong>
                                        </li>
                                        <li style="font-size: 18px;">
                                            <strong>Color: </strong>
                                            {{ $color }}
                                            <br>
                                            <strong>Size: </strong>
                                            {{ $size }}
                                        </li>
                                        <input type="hidden" name="qty" value="{{ $quantity }}">
                                        <input type="hidden" name="color" value="{{ $color }}">
                                        <input type="hidden" name="size" value="{{ $size }}">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        @php
                                            $quantity = $quantity ?? 1; // Ensure $quantity is set, default to 1 if not
                                            $price =
                                                isset($product->discount_price) && $product->discount_price > 0
                                                    ? $product->discount_price * $quantity
                                                    : $product->selling_price * $quantity;
                                        @endphp
                                        <li style="font-size: 18px;">
                                            <strong> Total Price: </strong>
                                            ৳{{ number_format($price, 2) }}
                                        </li>
                                        <input type="hidden" name="total_price" value="{{ $price }}">
                                        <hr>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>
                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Payment Method</h4>
                                </div>
                                <div class="row">
                                    {{-- <div class="col-md-4">
                                        <label for="">Stripe</label>
                                        <input type="radio" name="payment_method" value="stripe">
                                        <img src="{{ asset('frontend/assets/images/payments/4.png') }}">
                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">
                                        <label for="">Card</label>
                                        <input type="radio" name="payment_method" value="card">
                                        <img src="{{ asset('frontend/assets/images/payments/3.png') }}">
                                    </div> <!-- end col md 4 --> --}}

                                    <div class="col-md-6">
                                        <label for="">CASH ON DELIVERY</label>
                                        <input type="radio" name="payment_method" value="cash" checked>
                                        <img src="{{ asset('frontend/assets/images/payments/cash_on.png') }}"
                                            style="width: 200px; height: 200px;">
                                    </div> <!-- end col md 4 -->
                                </div> <!-- // end row  -->
                                <hr>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment
                                    Step</button>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>

            </form>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <!-- === ===== BRANDS CAROUSEL ==== ======== -->

        <!-- ===== == BRANDS CAROUSEL : END === === -->
    </div><!-- /.container -->
</div><!-- /.body-content -->

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{ url('/district-get/ajax') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="state_id"]').empty();
                        var d = $('select[name="district_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .district_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });

        $('select[name="district_id"]').on('change', function() {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: "{{ url('/state-get/ajax') }}/" + district_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="state_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="state_id"]').append('<option value="' +
                                value.id + '">' + value.state_name + '</option>'
                            );
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
@endsection
