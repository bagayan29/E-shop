@extends('backend.layouts.master')

@section('main-content')

<div style="margin: 40px;">
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header text-center bg-primary text-white font-weight-bold">
                        Add Post
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('post.store')}}">
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

                            <div class="form-group">
                                <label for="quote" class="col-form-label">Quote</label>
                                <textarea class="form-control" id="quote" name="quote">{{old('quote')}}</textarea>
                                @error('quote')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="summary"
                                            class="col-form-label font-weight-bold text-primary">Summary <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" id="summary"
                                            name="summary">{{old('summary')}}</textarea>
                                        @error('summary')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description"
                                            class="col-form-label font-weight-bold text-primary">Description</label>
                                        <textarea class="form-control" id="description"
                                            name="description">{{old('description')}}</textarea>
                                        @error('description')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="post_cat_id">Category <span class="text-danger">*</span></label>
                                <select name="post_cat_id" class="form-control">
                                    <option value="">--Select any category--</option>
                                    @foreach($categories as $key=>$data)
                                    <option value='{{$data->id}}'>{{$data->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tags">Tag</label>
                                        <select name="tags[]" multiple data-live-search="true"
                                            class="form-control selectpicker">
                                            <option value="">--Select any tag--</option>
                                            @foreach($tags as $key=>$data)
                                            <option value='{{$data->title}}'>{{$data->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="added_by">Author</label>
                                        <select name="added_by" class="form-control">
                                            <option value="">--Select any one--</option>
                                            @foreach($users as $key=>$data)
                                            <option value='{{$data->id}}' {{($key==0) ? 'selected' : ''}}>
                                                {{$data->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputPhoto" class="col-form-label">Photo <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="photo"
                                                value="{{old('photo')}}">
                                        </div>
                                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                        @error('photo')
                                        <span class="text-danger">{{$message}}</span>
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
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div style="text-align: center;">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                @endsection

                @push('styles')
                <link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
                <link rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
                @endpush
                @push('scripts')
                <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
                <script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js">
                </script>

                <script>
                $('#lfm').filemanager('image');

                $(document).ready(function() {
                    $('#summary').summernote({
                        placeholder: "Write short description.....",
                        tabsize: 2,
                        height: 100,
                        toolbar: false // Hide the toolbar
                    });
                });

                $(document).ready(function() {
                    $('#description').summernote({
                        placeholder: "Write detail description.....",
                        tabsize: 2,
                        height: 150,
                        toolbar: false // Hide the toolbar
                    });
                });

                $(document).ready(function() {
                    $('#quote').summernote({
                        placeholder: "Write detail Quote.....",
                        tabsize: 2,
                        height: 100,
                        toolbar: false // Hide the toolbar
                    });
                });

                // $('select').selectpicker();
                </script>
                @endpush