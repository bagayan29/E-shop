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
                    <div class="form-group" style="display: flex; justify-content: space-between; align-items: center;">
                        <label for="inputTitle" class="col-form-label" style="margin-right: 10px;">Title: </label>
                        <div style="flex: 1;">
                            <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                                value="{{old('title')}}" class="form-control">
                        </div>
                        <label for="status" class="col-form-label" style="margin-left: 10px;">Status: </label>
                        <div style="flex: 1;">
                            <select name="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <!--<button type="reset" class="btn btn-danger">Reset</button> -->
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>

                    </form>
                </div>
            </div>

            @endsection