@extends('frontend.layouts.master')

@section('main-content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<!-- Start Contact -->
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
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="form-main">
                    <div class="title">
                        @php
                        $settings=DB::table('settings')->get();
                        @endphp
                        <h3 style="text-align: center;">Write us a message @auth @else<span style="font-size:12px;"
                                class="text-danger">[You
                                need to login first]</span>@endauth</h3>
                    </div>
                    <form class="form-contact form contact_form" method="post" action="{{route('contact.store')}}"
                        id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group text-center">
                                    <label style="font-weight: bold;">Your Name<span>*</span></label>
                                    <input name="name" id="name" type="text" placeholder="Enter your name"
                                        style="border-radius: 20px;">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group text-center">
                                    <label style="font-weight: bold;">Your Subjects<span>*</span></label>
                                    <input name="subject" type="text" id="subject" placeholder="Enter Subject"
                                        style="border-radius: 20px;">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group text-center">
                                    <label style="font-weight: bold;">Your Email<span>*</span></label>
                                    <input name="email" type="email" id="email" placeholder="Enter email address"
                                        style="border-radius: 20px;">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group text-center">
                                    <label style="font-weight: bold;">Your Phone No.<span>*</span></label>
                                    <input id="phone" name="phone" type="number" placeholder="Enter your phone"
                                        style="border-radius: 20px;">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group message text-center">
                                    <label style="font-weight: bold;">Type Your Message Here:<span>*</span></label>
                                    <textarea name="message" id="message" cols="30" rows="9" placeholder="Enter Message"
                                        style="border-radius: 20px;"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group button text-center">
                                    <button type="submit" class="btn"  style="border-radius: 20px;">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <br>
            <br>

            <div class="col-lg-4 col-12">
                <div class="single-head">
                    <div class="single-info">
                        <i class="bi bi-telephone-forward"
                            style='color: blue; display: inline-block; vertical-align: middle; margin-right: 10px;'></i>
                        <h4 class="title" style='display: inline-block; vertical-align: middle;'>Call us Now:</h4>
                        <ul style='list-style-type: none; padding: 0;'>
                            <li>@foreach($settings as $data) {{$data->phone}} @endforeach</li>
                        </ul>
                    </div>

                    <br>
                    <br>

                    <div class="single-info">
                        <i class="bi bi-envelope-check"
                            style='color: blue; display: inline-block; vertical-align: middle; margin-right: 10px;'></i>
                        <h4 class="title" style='display: inline-block; vertical-align: middle;'>Email:</h4>
                        <ul style='list-style-type: none; padding: 0;'>
                            <li><a href="rendondexter1@gmail.com">@foreach($settings as $data) {{$data->email}}
                                    @endforeach</a></li>
                        </ul>
                    </div>

                    <br>
                    <br>

                    <div class="single-info">
                        <i class="bi bi-geo-alt"
                            style='color: blue; display: inline-block; vertical-align: middle; margin-right: 10px;'></i>
                        <h4 class="title" style='display: inline-block; vertical-align: middle;'>Our Address:</h4>
                        <ul style='list-style-type: none; padding: 0;'>
                            <li>@foreach($settings as $data) {{$data->address}} @endforeach</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    </div>
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

    <!--/ End Contact -->

    <!-- Map Section -->
    <!-- <div class="map-section">
		<div id="myMap">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14130.857353934944!2d85.36529494999999!3d27.6952226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sne!2snp!4v1595323330171!5m2!1sne!2snp" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
	</div>
	 End Map Section -->

    <!-- Start Shop Newsletter  -->
    @include('frontend.layouts.newsletter')
    <!-- End Shop Newsletter -->
    <!--================Contact Success  =================-->
    <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="text-success">Thank you!</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-success">Your message is successfully sent...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals error -->
    <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="text-warning">Sorry!</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-warning">Something went wrong.</p>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('styles')
    <style>
    .modal-dialog .modal-content .modal-header {
        position: initial;
        padding: 10px 20px;
        border-bottom: 1px solid #e9ecef;
    }

    .modal-dialog .modal-content .modal-body {
        height: 100px;
        padding: 10px 20px;
    }

    .modal-dialog .modal-content {
        width: 50%;
        border-radius: 0;
        margin: auto;
    }
    </style>
    @endpush
    @push('scripts')
    <script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/contact.js') }}"></script>
    @endpush