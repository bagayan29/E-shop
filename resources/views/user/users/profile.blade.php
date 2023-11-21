@extends('user.layouts.master')

@section('title','Admin Profile')

@section('main-content')
<div style="margin: 40px;">
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>
        <div class="card-header py-3">
            <div class="card-header text-center bg-primary text-white font-weight-bold">
                Profile
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="image">
                            @if($profile->photo)
                            <img class="card-img-top img-fluid roundend-circle mt-4"
                                style="border-radius:50%;height:80px;width:80px;margin:auto;" src="{{$profile->photo}}"
                                alt="profile picture">
                            @else
                            <img class="card-img-top img-fluid roundend-circle mt-4"
                                style="border-radius:50%;height:80px;width:80px;margin:auto;"
                                src="{{asset('backend/img/avatar.png')}}" alt="profile picture">
                            @endif
                        </div>
                        <div class="card-body mt-4 ml-2">
    <h5 class="card-title text-left"><small><i class="fas fa-user" style="color: blue;"></i>
        {{$profile->name}}</small></h5>
    <p class="card-text text-left"><small><i class="fas fa-envelope" style="color: blue;"></i>
        {{$profile->email}}</small></p>
</div>

                    </div>
                </div>
                <div class="col-md-8">
                    <form class="border px-4 pt-2 pb-3" method="POST"
                        action="{{route('user-profile-update',$profile->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="inputTitle" class="col-form-label">Name:</label>
                            <input id="inputTitle" type="text" name="name" placeholder="Enter name"
                                value="{{$profile->name}}" class="form-control">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <label for="inputEmail" class="col-form-label">Email:</label>
                                    </div>

                                    <div>
                                        @if(empty($profile->email_verified_at))
                                            <strong class="badge badge-danger">Unverified</strong>
                                            <a href="{{ route('email.verify') }}" class="text-light badge badge-warning">Click to verify email</a>
                                        @else
                                            <div class="badge badge-success">Verified</div>
                                        
                                        @endif
                                    </div>
                                </div>
                                
                                <input id="inputEmail" disabled type="email" name="email" placeholder="Enter email" value="{{$profile->email}}" class="form-control">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="inputPhoto" class="col-form-label">Photo:</label>
            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-warning">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$profile->photo}}">
            </div>
            @error('photo')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>

                        <div class="form-group">
                            <label for="role" class="col-form-label">Role:</label>
                            <select name="role" class="form-control">
                                <option value="user" {{(($profile->role=='user')? 'selected' : '')}}>User</option>
                            </select>
                            @error('role')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div style="text-align: center;">
  <button type="submit" class="btn btn-primary btn-sm">Update</button>
</div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection

    <style>
    .breadcrumbs {
        list-style: none;
    }

    .breadcrumbs li {
        float: left;
        margin-right: 10px;
    }

    .breadcrumbs li a:hover {
        text-decoration: none;
    }

    .breadcrumbs li .active {
        color: red;
    }

    .breadcrumbs li+li:before {
        content: "/\00a0";
    }

    .image {
        background:url('{{asset('backend/img/background.jpg')}}');
        height: 150px;
        background-position: center;
        background-attachment: cover;
        position: relative;
    }

    .image img {
        position: absolute;
        top: 55%;
        left: 35%;
        margin-top: 30%;
    }

    i {
        font-size: 14px;
        padding-right: 8px;
    }
    </style>

    @push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
    $('#lfm').filemanager('image');
    </script>
    @endpush