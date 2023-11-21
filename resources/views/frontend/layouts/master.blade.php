<!DOCTYPE html>
<html lang="zxx">
<head>
    @include('frontend.layouts.head')
</head>
<body class="js">
    
    
<style>
    /* Styles for the preloader container */
    .preloader {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #344D67; /* Change to the specified background color */
    }

    /* Your custom animation styles */
    .loader-circle-91 {
        position: relative;
        height: 70px;
        width: 70px;
        margin: 0 auto;
    }
    .loader-circle-91 .cr1 {
        width: 100%;
        height: 100%;
        border: 5px solid transparent;
        border-top-color: #F3ECB0; /* Change to the specified color */
        border-radius: 50%;
        animation: anm-loader-circle-91 3s infinite;
    }
    .loader-circle-91 .cr2 {
        width: 70%;
        height: 70%;
        border: 5px solid transparent;
        border-top-color: #ADE792; /* Change to the specified color */
        border-radius: 50%;
        margin: 10px auto;
        animation: anm-loader-circle-91 3s infinite;
    }
    .loader-circle-91 .cr3 {
        width: 30%;
        height: 30%;
        border: 5px solid transparent;
        border-top-color: #6ECCAF; /* Change to the specified color */
        border-radius: 50%;
        margin: 10px auto;
        animation: anm-loader-circle-91 3s infinite;
    }
    @keyframes anm-loader-circle-91 {
        0% {}
        100% {
            transform: rotate(360deg);
        }
    }
</style>
    
<div class="preloader">
    <div class="loader-circle-91">
        <div class="cr1">
            <div class="cr2">
                <div class="cr3"></div>
            </div>
        </div>
    </div>
</div>

     <!--End Preloader-->
    
    @include('frontend.layouts.notification')
    <!-- Header -->
    @include('frontend.layouts.header')
    <!--/ End Header -->
    @yield('main-content')
    
    @include('frontend.layouts.footer')

</body>
</html>
