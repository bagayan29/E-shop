@extends('frontend.layouts.master')

@section('title','E-Shop || Verify OTP')

@section('main-content')
<style>
/* Container styles */
.shop.login.section {
    padding: 60px 0;
}

/* Form styles */
.login-form {
    background: #fff;
    padding: 30px;
    border-radius: 20px;
    /* Rounded corners for the form container */
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
}

.login-form h2 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

.login-form p {
    font-size: 14px;
    margin-bottom: 30px;
    color: #777;
}

.form-group label {
    font-weight: 600;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 15px;
    /* Rounded corners for input fields */
    margin-bottom: 20px;
}

.form-group input[type="checkbox"] {
    margin-right: 5px;
}

.login-button {
    background-color: #333;
    color: #fff;
    border-radius: 15px;
    /* Rounded corners for login button */
}

.register-button {
    background-color: #777;
    color: #fff;
    border-radius: 15px;
    /* Rounded corners for register button */
}

/* Center align login and register buttons */
.login-btn center {
    text-align: center;
}

/* Lost password link */
.lost-pass {
    display: block;
    margin-top: 20px;
    text-align: center;
    color: #777;
}

</style>
<!-- Shop Verify Email-->
<section class="shop login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="login-form">
                    <h2 class="font-weight-bold">Email OTP Verification</h2>
                    <p>
                        @if(!empty(session('success')))
                            <div class="alert alert-success" role="alert">
                                {!! session('success') !!}
                            </div>
                        @endif

                        @if(!empty(session('error')))
                            <div class="alert alert-danger" role="alert">
                                {!! session('error') !!}
                            </div>
                        @endif
                    </p>
                    <!-- Form -->
                    <form class="form" method="post" action="{{route('email.verify-otp-post')}}">
                        @csrf
                        <div class="row">
                            <!-- <div class="col-12">
                                <div class="form-group">
                                    <label for="email" class="font-weight-bold" style="font-size: 18px;">Your
                                        Email<span>*</span></label>

                                    <input type="email" id="email" name="email" placeholder="" required="required"
                                        value="{{ Auth::user()->email }}" class="form-control" style="border-radius: 15px;">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div> -->

                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="otp" class="font-weight-bold" style="font-size:18px;">Your
                                        OTP<span>*</span></label>
                                    <input type="text" id="otp" name="otp" placeholder=""
                                        required="required" value="{{old('otp')}}" class="form-control"
                                        style="border-radius: 15px;">
                                    @error('otp')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group login-btn">
                                    <center>
                                        <button class="btn login-button" type="submit">Verify OTP</button>
                                       
                                    </center>
                                </div>
                                
                            </div>

                        </div>
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
        </div>
    </div>
</section>

<!--/ End Login -->
@endsection