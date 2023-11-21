@extends('backend.layouts.master')

@section('main-content')
<div style="margin: 40px;">
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white font-weight-bold">
                        Add User
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('users.store')}}">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputTitle"
                                            class="col-form-label font-weight-bold text-primary">Name</label>
                                        <input id="inputTitle" type="text" name="name" placeholder="Enter name"
                                            value="{{ old('name') }}" class="form-control">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputEmail"
                                            class="col-form-label font-weight-bold text-primary">Email</label>
                                        <input id="inputEmail" type="email" name="email" placeholder="Enter email"
                                            value="{{ old('email') }}" class="form-control">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputPassword"
                                            class="col-form-label font-weight-bold text-primary">Password</label>
                                        <input id="inputPassword" type="password" name="password"
                                            placeholder="Enter password" value="{{ old('password') }}"
                                            class="form-control">
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputPhoto"
                                            class="col-form-label font-weight-bold text-primary">Photo</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="photo"
                                                value="{{ old('photo') }}">
                                        </div>
                                        <img id="holder" style="margin-top: 15px; max-height: 100px;">
                                        @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            @php
                            $roles=DB::table('users')->select('role')->get();
                            @endphp
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role"
                                            class="col-form-label font-weight-bold text-primary">Role</label>
                                        <select name="role" class="form-control">
                                            <option value="">--Select Role--</option>
                                            @foreach($roles as $role)
                                            <option value="{{$role->role}}">{{$role->role}}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status"
                                            class="col-form-label font-weight-bold text-primary">Status</label>
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

                            <div class="form-group mb-3">
                                <center>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>

                @endsection

                @push('scripts')
                <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
                <script>
                $('#lfm').filemanager('image');
                </script>
                @endpush