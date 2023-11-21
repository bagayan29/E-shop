@extends('backend.layouts.master')

@section('main-content')
<div style="margin: 40px;">
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header text-center bg-primary text-white font-weight-bold">
                        Edit User
                    </div>  
                    <div class="card-body">
                        <form method="post" action="{{route('users.update',$user->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="inputTitle" class="col-form-label">Name:</label>
                                    <input id="inputTitle" type="text" name="name" placeholder="Enter name"
                                        value="{{$user->name}}" class="form-control">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="inputEmail" class="col-form-label">Email:</label>
                                    <input id="inputEmail" type="email" name="email" placeholder="Enter email"
                                        value="{{$user->email}}" class="form-control">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="form-group">
            <label for="inputPassword" class="col-form-label">Password</label>
          <input id="inputPassword" type="password" name="password" placeholder="Enter password"  value="{{$user->password}}"
                            class="form-control">
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                    </div> --}}

                    <div class="form-group">
                        <label for="inputPhoto" class="col-form-label">Photo:</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="photo"
                                value="{{$user->photo}}">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                        @error('photo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    @php
                    $roles=DB::table('users')->select('role')->where('id',$user->id)->get();
                    // dd($roles);
                    @endphp
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="role" class="col-form-label">Role:</label>
                            <select name="role" class="form-control">
                                <option value="">-----Select Role-----</option>
                                @foreach($roles as $role)
                                <option value="{{$role->role}}" {{($role->role == 'admin' ? 'selected' : '')}}>Admin
                                </option>
                                <option value="{{$role->role}}" {{($role->role == 'user' ? 'selected' : '')}}>User
                                </option>
                                @endforeach
                            </select>
                            @error('role')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="status" class="col-form-label">Status:</label>
                            <select name="status" class="form-control">
                                <option value="active" {{($user->status == 'active' ? 'selected' : '')}}>Active</option>
                                <option value="inactive" {{($user->status == 'inactive' ? 'selected' : '')}}>Inactive
                                </option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <center><button class="btn btn-primary" type="submit">Update</button></center>
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