@extends('frontend.layouts.master')

@section('title','E-Shop || Login Page')

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
<!-- Shop Login -->
<section class="shop login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="login-form">
                    <h2 class="font-weight-bold">Login</h2>
                    <p>Please register in order to checkout more quickly</p>
                    <!-- Form -->
                    <form class="form" method="post" action="{{route('login.submit')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email" class="font-weight-bold" style="font-size: 18px;">Your
                                        Email<span>*</span></label>

                                    <input type="email" id="email" name="email" placeholder="" required="required"
                                        value="{{old('email')}}" class="form-control" style="border-radius: 15px;">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password" class="font-weight-bold" style="font-size:18px;">Your
                                        Password<span>*</span></label>
                                    <input type="password" id="password" name="password" placeholder=""
                                        required="required" value="{{old('password')}}" class="form-control"
                                        style="border-radius: 15px;">
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group login-btn">
                                    <center>
                                        <button class="btn login-button" type="submit">Login</button>
                                        <a href="{{route('register.form')}}" class="btn register-button">Register</a>
                                    </center>
                                </div>
                                <div class="d-flex justify-content-between">
    <div class="checkbox">
        <label class="checkbox-inline" for="remember">
            <input id="remember" name="news" type="checkbox">Remember me
        </label>
    </div>
    @if (Route::has('password.request'))
    <div class="form-group">
      <!--  <a class="lost-pass" href="{{ route('password.reset') }}">
            Lost your password?
        </a> -->
    </div>
    @endif
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