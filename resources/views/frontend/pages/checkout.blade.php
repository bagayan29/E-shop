@extends('frontend.layouts.master')

@section('title','Checkout page')

@section('main-content')

<!-- Start Checkout -->
<style>
.contact-head {
    border: 20px solid orange;
    margin-top: 0 !important;
    /* Remove top margin */
    margin-bottom: 0 !important;
    /* Remove bottom margin */
}

.contact-us.section {
    margin: 0;
    padding: 0;
}
</style>
<section id="contact-us" class="contact-us section">
    <div class="contact-head">
        <section class="shop checkout section">
            <div class="container">
                <form class="form" method="POST" action="{{route('cart.order')}}">
                    @csrf
                    <div class="row">

                        <div class="col-lg-8 col-12">
                            <div class="checkout-form">
                               <center> <h2>Make Your Checkout Here</h2>
                                <p>Please register in order to checkout more quickly</p> </center>
                                <!-- Form -->
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group text-center">
                                            <label style="font-weight: bold;">First Name<span>*</span></label>
                                            <input type="text" name="first_name" placeholder=""
                                                value="{{old('first_name')}}" value="{{old('first_name')}}" style="border-radius: 20px;">
                                            @error('first_name')
                                            <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group text-center">
                                            <label style="font-weight: bold;">Last Name<span>*</span></label>
                                            <input type="text" name="last_name" placeholder=""
                                                value="{{old('lat_name')}}" style="border-radius: 20px;">
                                            @error('last_name')
                                            <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group text-center">
                                            <label style="font-weight: bold;">Email Address<span>*</span></label>
                                            <input type="email" name="email" placeholder="" value="{{old('email')}}" style="border-radius: 20px;">
                                            @error('email')
                                            <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group text-center" >
                                            <label style="font-weight: bold;">Phone Number <span>*</span></label>
                                            <input type="number" name="phone" placeholder="" required
                                                value="{{old('phone')}}" style="border-radius: 20px;">
                                            @error('phone')
                                            <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group text-center">
                                            <label style="font-weight: bold;">Country<span>*</span></label>
                                            <select name="country" id="country" style="border-radius: 20px;">
                                            <option value="Phil">Philippines</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group text-center">
                                            <label style="font-weight: bold;">Address<span>*</span></label>
                                            <input type="text" name="address1" placeholder=""
                                                value="{{old('address1')}}" style="border-radius: 20px;">
                                            @error('address1')
                                            <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group text-center">
                                            <label style="font-weight: bold;">Land Mark<span>*</span></label>
                                            <input type="text" name="address2" placeholder=""
                                                value="{{old('address2')}}"style="border-radius: 20px;">
                                            @error('address2')
                                            <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group text-center">
                                            <label style="font-weight: bold;">Postal Code<span>*</span></label>
                                            <input type="text" name="post_code" placeholder=""
                                                value="{{old('post_code')}}" style="border-radius: 20px;">
                                            @error('post_code')
                                            <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <!--/ End Form -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="order-details">
                                <!-- Order Widget -->
                                <div class="single-widget">
                                    <h2>CART TOTALS</h2>
                                    <div class="content">
                                        <ul>
                                            <li class="order_subtotal" data-price="{{Helper::totalCartPrice()}}">Cart
                                                Subtotal<span>₱{{number_format(Helper::totalCartPrice(),2)}}</span></li>
                                            <li class="shipping">
                                                Shipping Cost 
                                                @if(count(Helper::shipping())>0 && Helper::cartCount()>0)
                                                <select name="shipping" class="nice-select" required>
                                                    <option value="">Select your address</option>
                                                    @foreach(Helper::shipping() as $shipping)
                                                    <option value="{{$shipping->id}}" class="shippingOption"
                                                        data-price="{{$shipping->price}}">{{$shipping->type}}:
                                                        ₱{{$shipping->price}}</option>
                                                    @endforeach
                                                </select>
                                                <p style="color: red;">* Please choose a shipping option.</p>
                                                @else
                                                <span>Free</span>
                                                @endif
                                            </li>

                                            @if(session('coupon'))
                                            <li class="coupon_price" data-price="{{session('coupon')['value']}}">You
                                                Save<span>₱{{number_format(session('coupon')['value'],2)}}</span></li>
                                            @endif
                                            @php
                                            $total_amount=Helper::totalCartPrice();
                                            if(session('coupon')){
                                            $total_amount=₱total_amount-session('coupon')['value'];
                                            }
                                            @endphp
                                            @if(session('coupon'))
                                            <li class="last" id="order_total_price">
                                                Total<span>₱{{number_format($total_amount,2)}}</span></li>
                                            @else
                                            <li class="last" id="order_total_price">
                                                Total<span>₱{{number_format($total_amount,2)}}</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <!--/ End Order Widget -->
                                <!-- Order Widget -->
                                <div class="single-widget">
                                    <h2>Payments</h2>
                                    <div class="content">
                                        <div class="checkbox">
                                            {{-- <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label> --}}
                                            <form-group>
                                                <!--<input name="payment_method" type="radio" value="cod">--> 
                                                <label> Cash On Delivery Only!!</label>
                                            </form-group>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-widget get-button">
                                    <div class="content">
                                        <div class="button">
                                            <button type="submit" class="btn"  style="border-radius: 20px;">proceed to checkout</button>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Button Widget -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </div>
    </div>
</section>
<!--/ End Checkout -->

<!-- Start Shop Services Area  -->
<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class='fa fa-rocket' style='color: blue'></i>
                    <h4>Fash Delivery</h4>
                    <p>For Selected Area</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class='fa fa-refresh' style='color: blue'></i>
                    <h4>Free Return</h4>
                    <p>Within 2 to 3 days returns</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class='fa fa-handshake-o' style='color: blue'></i>
                    <h4>Sucure Payment</h4>
                    <p>100% secure</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class='fa fa-lock' style='color: blue'></i>
                    <h4>Best Peice</h4>
                    <p>Fixed Price</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
</div>
</div>
</div>
</div>
</section>
<!-- End Shop Newsletter -->
@endsection
@push('styles')
<style>
li.shipping {
    display: inline-flex;
    width: 100%;
    font-size: 14px;
}

li.shipping .input-group-icon {
    width: 100%;
    margin-left: 10px;
}

.input-group-icon .icon {
    position: absolute;
    left: 20px;
    top: 0;
    line-height: 40px;
    z-index: 3;
}

.form-select {
    height: 30px;
    width: 100%;
}

.form-select .nice-select {
    border: none;
    border-radius: 0px;
    height: 40px;
    background: #f6f6f6 !important;
    padding-left: 45px;
    padding-right: 40px;
    width: 100%;
}

.list li {
    margin-bottom: 0 !important;
}

.list li:hover {
    background: #F7941D !important;
    color: white !important;
}

.form-select .nice-select::after {
    top: 14px;
}
</style>
@endpush
@push('scripts')
<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
<script>
$(document).ready(function() {
    $("select.select2").select2();
});
$('select.nice-select').niceSelect();
</script>
<script>
function showMe(box) {
    var checkbox = document.getElementById('shipping').style.display;
    // alert(checkbox);
    var vis = 'none';
    if (checkbox == "none") {
        vis = 'block';
    }
    if (checkbox == "block") {
        vis = "none";
    }
    document.getElementById(box).style.display = vis;
}
</script>
<script>
$(document).ready(function() {
    $('.shipping select[name=shipping]').change(function() {
        let cost = parseFloat($(this).find('option:selected').data('price')) || 0;
        let subtotal = parseFloat($('.order_subtotal').data('price'));
        let coupon = parseFloat($('.coupon_price').data('price')) || 0;
        // alert(coupon);
        $('#order_total_price span').text('₱' + (subtotal + cost - coupon).toFixed(2));
    });

});
</script>


@endpush