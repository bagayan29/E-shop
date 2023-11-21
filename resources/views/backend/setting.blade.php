@extends('backend.layouts.master')

@section('main-content')

<div class="card m-5">
    <div class="card-body p-4">
        <div class="card-title text-center">
            <div class="card-header text-center bg-primary text-white font-weight-bold">
                Edit Post
            </div>
        </div>

        <hr class="border-dark my-3"> <!-- Add a horizontal line with light dark color -->
        <form method="post" action="{{ route('settings.update') }}">
            @csrf
            {{-- @method('PATCH') --}}
            {{-- {{ dd($data) }} --}}
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="short_des" class="col-form-label">Short Description <span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" id="quote" name="short_des">{{ $data->short_des }}</textarea>
                    @error('short_des')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="description" class="col-form-label">Description <span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" id="description" name="description">{{$data->description}}</textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="inputPhoto" class="col-form-label">Logo <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-warning">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail1" class="form-control" type="text" name="logo" value="{{$data->logo}}">
                        </div>
                        <div id="holder1" style="margin-top:15px;max-height:100px;"></div>

                        @error('logo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-warning">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="photo"
                                value="{{$data->photo}}">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>

                        @error('photo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="address" class="col-form-label">Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="address" required value="{{$data->address}}">
                @error('address')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" required value="{{$data->email}}">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="phone" class="col-form-label">Phone Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone" required value="{{$data->phone}}">
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="timeAnddate" class="col-form-label">Time And Date <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="timeAnddate" required value="{{$data->timeAnddate}}">
                @error('timeAnddate')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



            <div class="form-group mb-3">
                <center> <button class="btn btn-primary" type="submit">Update</button> </center>
            </div>

        </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
$('#lfm').filemanager('image');
$('#lfm1').filemanager('image');
$(document).ready(function() {
    $('#summary').summernote({
        placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
});

$(document).ready(function() {
    $('#quote').summernote({
        toolbar: [],
        placeholder: "Write short Quote.....",
        tabsize: 2,
        height: 100
    });

    $('#description').summernote({
        toolbar: [],
        placeholder: "Write detail description.....",
        tabsize: 2,
        height: 150
    });
});
</script>
@endpush