     @php

         $hot_deals = App\Models\Product::where('hot_deals', 1)
             ->where('discount_price', '!=', null)
             ->orderBy('id', 'DESC')
             ->limit(3)
             ->get();
     @endphp

     <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
         <h3 class="section-title">hot deals</h3>
         <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

             @foreach ($hot_deals as $product)
                 <div class="item">
                     <div class="products">
                         <div class="hot-deal-wrapper">
                             <div class="image"> <img src="{{ asset($product->product_thambnail) }}" alt="">
                             </div>

                             @php
                                 $amount = $product->selling_price - $product->discount_price;
                                 $discount = ($amount / $product->selling_price) * 100;
                             @endphp

                             @if ($product->discount_price == null)
                                 <div class="tag new"><span>new</span></div>
                             @else
                                 <div class="sale-offer-tag"><span>{{ round($discount) }}%<br>
                                         off</span></div>
                             @endif
                             <div class="timing-wrapper">
                                 <div class="box-wrapper">
                                     <div class="date box"> <span class="key" id="days">0</span> <span
                                             class="value">DAYS</span> </div>
                                 </div>
                                 <div class="box-wrapper">
                                     <div class="hour box"> <span class="key" id="hours">0</span> <span
                                             class="value">HRS</span> </div>
                                 </div>
                                 <div class="box-wrapper">
                                     <div class="minutes box"> <span class="key" id="minutes">0</span> <span
                                             class="value">MINS</span> </div>
                                 </div>
                                 <div class="box-wrapper hidden-md">
                                     <div class="seconds box"> <span class="key" id="seconds">0</span> <span
                                             class="value">SEC</span> </div>
                                 </div>
                             </div>
                         </div>
                         <!-- /.hot-deal-wrapper -->

                         <div class="product-info text-left m-t-20">
                             <h3 class="name"><a href="detail.html">
                                     @if (session()->get('language') == 'hindi')
                                         {{ $product->product_name_hin }}
                                     @else
                                         {{ $product->product_name_en }}
                                     @endif
                                 </a></h3>
                             <div class="rating rateit-small"></div>

                             @if ($product->discount_price == null)
                                 <div class="product-price"> <span class="price"> ৳{{ $product->selling_price }}
                                     </span> </div>
                             @else
                                 <div class="product-price"> <span class="price"> ৳{{ $product->discount_price }}
                                     </span> <span class="price-before-discount">${{ $product->selling_price }}</span>
                                 </div>
                             @endif


                             <!-- /.product-price -->

                         </div>
                         <!-- /.product-info -->



                         <div class="cart clearfix animate-effect">
                             <div class="action">
                                 <div class="add-cart-button btn-group">
                                     {{-- <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                             class="fa fa-shopping-cart"></i> </button> --}}
                                     <button class="btn btn-primary icon" type="button" title="Add Cart"
                                         data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}"
                                         onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                     <button class="btn btn-primary cart-btn" type="button" data-toggle="modal"
                                         title="Add Cart" data-target="#exampleModal" id="{{ $product->id }}"
                                         onclick="productView(this.id)">Add to cart</button>
                                 </div>
                             </div>
                             <!-- /.action -->
                         </div>
                         <!-- /.cart -->
                     </div>
                 </div>
             @endforeach <!-- // end hot deals foreach -->
         </div>
         <!-- /.sidebar-widget -->
     </div>
     <script>
         function updateTimer() {
             // Get the current date and time
             var now = new Date().getTime();

             // Set the target date and time (you can replace this with your desired target time)
             var targetDate = new Date('2024-12-31T23:59:59').getTime();

             // Calculate the remaining time
             var timeRemaining = targetDate - now;

             // Calculate days, hours, minutes, and seconds from the remaining time
             var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
             var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
             var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
             var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

             // Update the HTML elements with the calculated values
             document.getElementById('days').innerText = days;
             document.getElementById('hours').innerText = hours;
             document.getElementById('minutes').innerText = minutes;
             document.getElementById('seconds').innerText = seconds;
         }

         // Call the updateTimer function initially to set the initial values
         updateTimer();

         // Update the timer every second (1000 milliseconds)
         setInterval(updateTimer, 1000);
     </script>
