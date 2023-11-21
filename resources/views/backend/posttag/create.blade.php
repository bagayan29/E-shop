@extends('backend.layouts.master')

@section('main-content')
<div style="margin: 40px;">
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white font-weight-bold">
                        Add Post Ctaegory
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('post-tag.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputTitle" class="col-form-label">Title</label>
                                <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                                    value="{{ old('title') }}" class="form-control">
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection