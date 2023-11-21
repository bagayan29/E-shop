@extends('frontend.layouts.master')

@section('title','E-SHOP || Order Track Page')

@section('main-content')
<section class="tracking_box_area section_gap py-5">
    <div class="container">
        <div class="tracking_box_inner">
            <p>"To check the status of your order with A&E Lumber and Hardware, please input your Order ID in the
                provided field and click the "Track" button.
                You can find your Order ID on your purchase receipt and in the confirmation email sent to you."</p>
            <form class="row tracking_form my-4" action="{{route('product.track.order')}}" method="post"
                novalidate="novalidate">
                @csrf
                <div class="col-md-8 col-sm-12 form-group" style="display: inline-block;">
                    <input type="text" class="form-control p-2" name="order_number"
                        placeholder="Enter Your Tracking ID">
                </div>
                <div class="col-md-4 col-sm-12 form-group" style="display: inline-block;">
                    <button type="submit" value="submit" class="btn submit_btn btn-block" style="border-radius: 20px;">Track Order/ID</button>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection