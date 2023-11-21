@extends('backend.layouts.master')

@section('title', 'Comment Edit')

@section('main-content')
<div style="margin: 40px;">
    <div class="card shadow mb-4">
        <div class="card-header text-center bg-primary text-white font-weight-bold">
            Edit Comment
        </div>
        <div class="card-body">
            <form action="{{ route('comment.update', $comment->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">By:</label>
                            <input type="text" disabled class="form-control" value="{{ $comment->user_info->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status :</label>
                            <select name="status" id="" class="form-control">
                                <option value="">--Select Status--</option>
                                <option value="active" {{ $comment->status === 'active' ? 'selected' : '' }}>Active
                                </option>
                                <option value="inactive" {{ $comment->status === 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea name="comment" id="" cols="20" rows="10"
                        class="form-control">{{ $comment->comment }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.card.shadow.mb-4 {
    margin: 0;
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #ddd;
    padding: 10px 20px;
}

.card-body {
    padding: 20px;
}
</style>
@endpush