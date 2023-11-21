@extends('backend.layouts.master')

@section('main-content')

<div style="margin: 40px;">
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white font-weight-bold">
                        Edit Post Category
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('post-category.update',$postCategory->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputTitle" class="col-form-label">Title</label>
                                    <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                                        value="{{$postCategory->title}}" class="form-control">
                                    @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status" class="col-form-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active"
                                            {{(($postCategory->status=='active') ? 'selected' : '')}}>Active</option>
                                        <option value="inactive"
                                            {{(($postCategory->status=='inactive') ? 'selected' : '')}}>Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>

                        </form>
                    </div>
                </div>

                @endsection