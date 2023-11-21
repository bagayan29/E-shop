@extends('backend.layouts.master')
@section('title','E-SHOP || Brand Edit')
@section('main-content')

<div style="margin: 40px;">
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
<div class="card">
<div class="card-header text-center bg-primary text-white font-weight-bold">
                    Edit Brands
                </div>
    <div class="card-body">
      <form method="post" action="{{route('brand.update',$brand->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
            <input id="inputTitle" type="text" name="title" placeholder="Enter title" value="{{$brand->title}}" class="form-control">
            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
            <select name="status" class="form-control">
                <option value="active" {{(($brand->status=='active') ? 'selected' : '')}}>Active</option>
                <option value="inactive" {{(($brand->status=='inactive') ? 'selected' : '')}}>Inactive</option>
            </select>
            @error('status')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>

        <div class="form-group mb-3">
         <center>  <button class="btn btn-success" type="submit">Update</button> </center>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush