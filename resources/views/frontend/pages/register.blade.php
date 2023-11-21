@extends('frontend.layouts.master')

@section('title','E-SHOP || Register Page')

@section('main-content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

<!-- Shop Login -->
<style>
/* Container styles */
.shop.login.section {
    padding: 60px 0;
}

/* Form container styles */
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

/* Form input field styles */
.form-group label {
    font-weight: 600;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 15px;
    margin-bottom: 20px;
}

.form-group input[type="checkbox"] {
    margin-right: 5px;
}

/* Login and Register button styles */
.login-btn center {
    text-align: center;
}

/* Lost password link styles */
.lost-pass {
    display: block;
    margin-top: 20px;
    text-align: center;
    color: #777;
}

/* Add a box around the registration form */
.registration-form {
    background: #fff;
    padding: 30px;
    border-radius: 20px;
    /* Rounded corners for the form container */
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    /* Add some spacing between the login and registration forms */
}
</style>

<section class="shop login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="login-form">
                    <h2 class="font-weight-bold">Register</h2>
                    <p>Please register in order to checkout more quickly</p>
                    <!-- Form -->
                    <form class="form" method="post" action="{{route('register.submit')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="font-weight-bold" style="font-size: 18px;">Your
                                        Name<span>*</span></label>
                                    <input type="text" name="name" placeholder="" required="required"
                                        value="{{old('name')}}" style="border-radius: 15px;">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="font-weight-bold" style="font-size: 18px;">Your
                                        Email<span>*</span></label>
                                    <input type="text" name="email" placeholder="" required="required"
                                        value="{{old('email')}}" style="border-radius: 15px;">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>


                            <!--<div class="col-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label class="font-weight-bold" style="font-size: 18px;">Your
                                                OTP<span>*</span></label>
                                        </div>
                                        <div class="col-md-9    ">
                                            <input type="text" name="OTP" placeholder="" required="required"
                                                value="{{ old('OTP') }}" style="border-radius: 15px;">
                                            @error('OTP')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                            <button type="button" class="btn btn-link float-md-right"
                                                style="border-radius: 10px;">
                                                <span class="bi bi-send"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div> -->
                



                            <div class="col-12">
                                <div class="form-group">
                                    <label class="font-weight-bold" style="font-size: 18px;">Your
                                        Password<span>*</span></label>
                                    <input type="password" name="password" placeholder="" required="required"
                                        value="{{old('password')}}" style="border-radius: 15px;">
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="font-weight-bold" style="font-size: 18px;">Confirm
                                        Password<span>*</span></label>
                                    <input type="password" name="password_confirmation" placeholder=""
                                        required="required" value="{{old('password_confirmation')}}"
                                        style="border-radius: 15px;">
                                    @error('password_confirmation')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group login-btn">
                                    <center> <button class="btn" type="submit"
                                            style="border-radius: 15px;">Register</button>
                                        <a href="{{route('login.form')}}" class="btn"
                                            style="border-radius: 15px;">Login</a>
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