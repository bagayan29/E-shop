@extends('user.layouts.master')

@section('title','Comment Edit')

@section('main-content')
<div style="margin: 40px;">
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header py-3">
                    <div class="card-header text-center bg-primary text-white font-weight-bold">
                        Comment Edit
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('user.post-comment.update',$comment->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">By:</label>
                            <input type="text" disabled class="form-control" value="{{$comment->user_info->name}}">
                        </div>
                        <div class="form-group">
                            <label for="comment">comment</label>
                            <textarea name="comment" id="" cols="20" rows="10"
                                class="form-control">{{$comment->comment}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status :</label>
                            <select name="status" id="" class="form-control">
                                <option value="">--Select Status--</option>
                                <option value="active" {{(($comment->status=='active')? 'selected' : '')}}>Active
                                </option>
                                <option value="inactive" {{(($comment->status=='inactive')? 'selected' : '')}}>Inactive
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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