@extends('user.layouts.master')

@section('title','Review Edit')

@section('main-content')
<div style="margin: 40px;">
    <div class="card shadow mb-4">
        <div class="row">
            <div class="card-body">
                <div class="card-header text-center bg-primary text-white font-weight-bold">
                    Review Edit
                </div>
                <form action="{{route('user.productreview.update',$review->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Review By:</label>
                                <input type="text" disabled class="form-control" value="{{$review->user_info->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status :</label>
                                <select name="status" id="" class="form-control">
                                    <option value="">--Select Status--</option>
                                    <option value="active" {{(($review->status=='active')? 'selected' : '')}}>Active</option>
                                    <option value="inactive" {{(($review->status=='inactive')? 'selected' : '')}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="review">Review</label>
                        <textarea name="review" id="" cols="20" rows="10" class="form-control">{{$review->review}}</textarea>
                    </div>
                    
                    <div class="text-center"> <!-- Center the button -->
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }
</style>
@endpush