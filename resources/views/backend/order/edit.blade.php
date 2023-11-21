@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div style="margin: 40px;">
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white font-weight-bold">
                        Edit Order
                    </div>
                    <div class="card-body">
                        <form action="{{route('order.update',$order->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="status">Status :</label>
                                <select name="status" id="" class="form-control">
                                    <option value="new"
                                        {{($order->status=='delivered' || $order->status=="process" || $order->status=="cancel") ? 'disabled' : ''}}
                                        {{(($order->status=='new')? 'selected' : '')}}>New</option>
                                    <option value="process"
                                        {{($order->status=='delivered'|| $order->status=="cancel") ? 'disabled' : ''}}
                                        {{(($order->status=='process')? 'selected' : '')}}>process</option>
                                    <option value="delivered" {{($order->status=="cancel") ? 'disabled' : ''}}
                                        {{(($order->status=='delivered')? 'selected' : '')}}>Delivered</option>
                                    <option value="cancel" {{($order->status=='delivered') ? 'disabled' : ''}}
                                        {{(($order->status=='cancel')? 'selected' : '')}}>Cancel</option>
                                </select>
                            </div>
                            <center><button type="submit" class="btn btn-primary">Update</button> </center>
                        </form>
                    </div>
                </div>
                @endsection

                @push('styles')
                <style>
                .order-info,
                .shipping-info {
                    background: #ECECEC;
                    padding: 20px;
                }

                .order-info h4,
                .shipping-info h4 {
                    text-decoration: underline;
                }
                </style>
                @endpush