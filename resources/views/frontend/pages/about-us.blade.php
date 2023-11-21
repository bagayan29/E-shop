@extends('frontend.layouts.master')

@section('title','E-SHOP || About Us')

@section('main-content')
<style>
        .orange-box {
            background-color: orange;
            padding: 20px;
            /* Add any other styling you desire for the orange box */
        }

        .about-content {
            text-align: center; /* Center the content */
        }

        /* Media Query for smaller screens */
        @media screen and (max-width: 768px) {
            .orange-box {
                padding: 10px; /* Adjust padding for smaller screens */
            }
            .about-content {
                text-align: left; /* Change text alignment for smaller screens */
            }
        }
        
    </style>

	<!-- About Us -->
	<div class="orange-box">
    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="about-content">
                        @php
                        $settings=DB::table('settings')->get();
                        @endphp
                        <h2>About Us</h2>
                        <span style="font-size: 24px; color: orange;" >A&E Lumber And Hardware</span>
                        <p>@foreach($settings as $data) {{$data->description}} @endforeach</p>
                        <div class="button">
                            <center> <a href="{{route('contact')}}" class="btn primary">Contact Us</a> </center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <img src="@foreach($settings as $data) {{$data->photo}} @endforeach"
                        alt="@foreach($settings as $data) {{$data->photo}} @endforeach" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
</div>

	<!-- End About Us -->


	<!-- Start Shop Services Area -->
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
	<!-- End Shop Services Area -->

	@include('frontend.layouts.newsletter')
@endsection
