@extends('backend.layouts.master')

@section('title','E-SHOP || Banner Create')

@section('main-content')
<div style="margin: 40px;">
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white font-weight-bold">
                        Add Banner
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('banner.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputTitle" class="col-form-label">Title <span
                                        class="text-danger">*</span></label>
                                <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                                    value="{{old('title')}}" class="form-control">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputPhoto" class="col-form-label">Photo <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                    class="btn btn-warning">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="photo"
                                                value="{{ old('photo') }}">
                                        </div>
                                        <div id="holder" style="margin-top: 15px; max-height: 100px;"></div>
                                        @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status" class="col-form-label">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status" class="form-control">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                        @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                       


                            <div class="form-group mb-3">
                                <center><button class="btn btn-primary" type="submit">Submit</button> </center>
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

                </script>
                @endpush
                