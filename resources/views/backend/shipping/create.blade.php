@extends('backend.layouts.master')

@section('main-content')
<div style="margin: 40px;">
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white font-weight-bold">
                        Add Shipping
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('shipping.store') }}">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="inputTitle" class="col-form-label">Address <span
                                            class="text-danger">*</span></label>
                                    <input id="inputTitle" type="text" name="type" placeholder="Enter title"
                                        value="{{ old('type') }}" class="form-control">
                                    @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="status" class="col-form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price" class="col-form-label">Price <span
                                        class="text-danger">*</span></label>
                                <input id="price" type="number" name="price" placeholder="Enter price"
                                    value="{{ old('price') }}" class="form-control">
                                @error('price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror


                                @error('status')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 text-center">
                                <button class="btn btn-primary" type="submit">Submit</button>
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