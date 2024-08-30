<style>
    @media only screen and (max-width: 767px) {
        .test-hot {
            display: none;
        }
    }
    </style>
<div class="sidebar-widget test-hot hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">Hot Deals</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        @foreach ($hot_deals as $product)
            <div class="item">
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image">
                            <img src="{{ asset($product->product_thambnail) }}" alt="">
                        </div>
                        @php
                            $amount = $product->selling_price - $product->discount_price;
                            $discount = ($amount / $product->selling_price) * 100;
                        @endphp
                        @if ($product->discount_price == null)
                            <div class="tag new"><span>new</span></div>
                        @else
                            <div class="sale-offer-tag"><span>{{ round($discount) }}%<br>off</span></div>
                        @endif
                        <div class="timing-wrapper" id="countdown-timer-{{ $product->id }}">
                            <div class="box-wrapper">
                                <div class="date box"> <span class="key" id="days-{{ $product->id }}">0</span> <span
                                        class="value">DAYS</span> </div>
                            </div>
                            <div class="box-wrapper">
                                <div class="hour box"> <span class="key" id="hours-{{ $product->id }}">0</span>
                                    <span class="value">HRS</span> </div>
                            </div>
                            <div class="box-wrapper">
                                <div class="minutes box"> <span class="key" id="minutes-{{ $product->id }}">0</span>
                                    <span class="value">MINS</span> </div>
                            </div>
                            <div class="box-wrapper hidden-md">
                                <div class="seconds box"> <span class="key" id="seconds-{{ $product->id }}">0</span>
                                    <span class="value">SEC</span> </div>
                            </div>
                        </div>
                    </div>
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
                        <div class="product-price" id="selling-price-{{ $product->id }}">
                            <span class="price"> ৳{{ $product->selling_price }} </span>
                        </div>
                    @else
                        <div class="product-price" id="discount-price-{{ $product->id }}" style="display: none;">
                            <span class="price"> ৳{{ $product->discount_price }} </span>
                            <span class="price-before-discount">৳{{ $product->selling_price }}</span>
                        </div>
                        <div class="product-price" id="selling-price-{{ $product->id }}">
                            <span class="price"> ৳{{ $product->selling_price }} </span>
                        </div>
                    @endif
                    </div>
                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <div class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal"
                                    data-target="#exampleModal" id="{{ $product->id }}"
                                    onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button" data-toggle="modal"
                                    title="Add Cart" data-target="#exampleModal" id="{{ $product->id }}"
                                    onclick="productView(this.id)">Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>




<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const startTimeStr = "{{ $timer->start_time }}";
        const endTimeStr = "{{ $timer->end_time }}";

        if (!startTimeStr || !endTimeStr) {
            console.error('Missing start or end time');
            return;
        }

        const startTime = new Date(startTimeStr.replace(' ', 'T')).getTime();
        const endTime = new Date(endTimeStr.replace(' ', 'T')).getTime();

        if (isNaN(startTime) || isNaN(endTime)) {
            console.error('Invalid date format:', startTimeStr, endTimeStr);
            return;
        }

        @foreach ($hot_deals as $product)
            (function() {
                const countdownTimer = document.getElementById('countdown-timer-{{ $product->id }}');
                const sellingPrice = document.getElementById('selling-price-{{ $product->id }}');
                const discountPrice = document.getElementById('discount-price-{{ $product->id }}');

                const x = setInterval(function() {
                    const now = new Date().getTime();

                    if (now < startTime) {
                        countdownTimer.style.display = "none";
                        sellingPrice.style.display = "block";
                        discountPrice.style.display = "none";
                        return;
                    } else {
                        countdownTimer.style.display = "block";
                        sellingPrice.style.display = "none";
                        discountPrice.style.display = "block";
                    }

                    const distance = endTime - now;

                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    document.getElementById("days-{{ $product->id }}").innerHTML = days;
                    document.getElementById("hours-{{ $product->id }}").innerHTML = hours;
                    document.getElementById("minutes-{{ $product->id }}").innerHTML = minutes;
                    document.getElementById("seconds-{{ $product->id }}").innerHTML = seconds;

                    if (distance < 0) {
                        clearInterval(x);
                        countdownTimer.style.display = "none";
                        discountPrice.style.display = "none";
                        sellingPrice.style.display = "block";
                    }
                }, 1000);
            })();
        @endforeach
    });


    //      document.addEventListener('DOMContentLoaded', (event) => {
    //     // Parse the start and end times from your backend
    //     const startTime = new Date("{{ $timer->start_time }}").getTime();
    //     const endTime = new Date("{{ $timer->end_time }}").getTime();
    //     const countdownTimer = document.getElementById('countdown-timer');

    //     // Update the count down every 1 second
    //     const x = setInterval(function() {

    //         // Get today's date and time
    //         const now = new Date().getTime();

    //         // Find the distance between now and the count down date
    //         const distance = endTime - now;

    //         // Time calculations for days, hours, minutes and seconds
    //         const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //         const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //         const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    //         const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    //         // Output the result in an element with id="days", "hours", "minutes", "seconds"
    //         document.getElementById("days").innerHTML = days;
    //         document.getElementById("hours").innerHTML = hours;
    //         document.getElementById("minutes").innerHTML = minutes;
    //         document.getElementById("seconds").innerHTML = seconds;

    //         // If the count down is finished, write some text
    //         if (distance < 0) {
    //             clearInterval(x);
    //             countdownTimer.style.display = "none";
    //         }
    //     }, 1000);
    // });


    //  function updateTimer() {
    //      // Get the current date and time
    //      var now = new Date().getTime();

    //      // Set the target date and time (you can replace this with your desired target time)
    //      var targetDate = new Date('2024-12-31T23:59:59').getTime();

    //      // Calculate the remaining time
    //      var timeRemaining = targetDate - now;

    //      // Calculate days, hours, minutes, and seconds from the remaining time
    //      var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
    //      var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //      var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
    //      var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

    //      // Update the HTML elements with the calculated values
    //      document.getElementById('days').innerText = days;
    //      document.getElementById('hours').innerText = hours;
    //      document.getElementById('minutes').innerText = minutes;
    //      document.getElementById('seconds').innerText = seconds;
    //  }

    //  // Call the updateTimer function initially to set the initial values
    //  updateTimer();

    //  // Update the timer every second (1000 milliseconds)
    //  setInterval(updateTimer, 1000);
</script>
