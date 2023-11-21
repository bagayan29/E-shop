@extends('user.layouts.master')
@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center bg-primary text-white font-weight-bold">
                    Change Password
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('change.password') }}">
                        @csrf

                        @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach

                        <div class="form-group">
                            <label for="password">Current Password:</label>
                            <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                        </div>

                        <div class="form-group">
                            <label for="new_password">New Password:</label>
                            <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                        </div>

                        <div class="form-group">
                            <label for="new_confirm_password">New Confirm Password:</label>
                            <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection