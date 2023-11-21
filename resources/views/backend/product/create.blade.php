@extends('backend.layouts.master')

@section('main-content')
<div style="margin: 40px;">
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white font-weight-bold">
                        Add Product
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('product.store')}}">
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

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="summary" class="col-form-label">Summary <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" id="summary"
                                            name="summary">{{ old('summary') }}</textarea>
                                        @error('summary')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description" class="col-form-label">Description</label>
                                        <textarea class="form-control" id="description"
                                            name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <!--<div class="form-group">
                                <label for="is_featured">Is Featured</label><br>
                                <input type="checkbox" name='is_featured' id='is_featured' value='1' checked> Yes
                            </div> -->
                            {{-- {{$categories}} --}}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="cat_id">Category <span class="text-danger">*</span></label>
                                        <select name="cat_id" id="cat_id" class="form-control">
                                            <option value="">Select any category</option>
                                            @foreach($categories as $key=>$cat_data)
                                            <option value='{{$cat_data->id}}'>{{$cat_data->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
<!--
                                    <div class="col-md-4">
                                        <label for="child_cat_id">Sub Category</label>
                                        <select name="child_cat_id" id="child_cat_id" class="form-control">
                                            <option value="">Select any category</option>
                                            {{-- @foreach($parent_cats as $key=>$parent_cat)
          <option value='{{$parent_cat->id}}'>{{$parent_cat->title}}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                            -->
                                    <div class="col-md-6">
                                        <label for="price" class="col-form-label">Price <span
                                                class="text-danger">*</span></label>
                                        <input id="price" type="number" name="price" placeholder="Enter price"
                                            value="{{old('price')}}" class="form-control">
                                        @error('price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="discount" class="col-form-label">Discount(%)</label>
                                <input id="discount" type="number" name="discount" min="0" max="100"
                                    placeholder="Enter discount" value="{{old('discount')}}" class="form-control">
                                @error('discount')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                                            
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="size">Size</label>
                                        <select name="size[]" class="form-control selectpicker" multiple
                                            data-live-search="true">
                                            <option value="">Select any size</option>
                                            <option value="S">Small (S)</option>
                                            <option value="M">Medium (M)</option>
                                            <option value="L">Large (L)</option>
                                            <option value="XL">Extra Large (XL)</option>

                                            <option value="kL">Kilograms (KL)</option>

                                            <option value="1/2">1/2 Load</option>
                                            <option value="1/4">1/4 Load</option>
                                            <option value="Full">Full Load</option>

                                            <option value="1">1</option>
                                            <option value="1 1/2">1 1/2</option>
                                            <option value="2">2</option>
                                            <option value="2 1/2">2 1/2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>

                                            <option value="OG">okee green (OG)</option>
                                            <option value="FB">flat black (FB)</option>
                                            <option value="SR">silver red (SR)</option>
                                            <option value="M">mahogany (MG)</option>
                                            <option value="TB">tivoli blue (TB)</option>
                                            <option value="StG">stell gray (STG)</option>
                                            <option value="WG">willow green</option>
                                            <option value="DG">deep greeen (DG)</option>
                                            <option value="OR">orange red (OR)</option>
                                            <option value="RB">river blue (RB)</option>
                                            <option value="DAG">dark gray (DAG)</option>
                                            <option value="BL">blue (BL)</option>
                                            <option value="SG">silver gray (SG)</option>
                                            <option value="SIR">signal red (SIR)</option>
                                            <option value="LY">lemon yellow (LY)</option>
                                            <option value="OLG">olive green (OLG)</option>
                                            <option value="LG">leaf green(LG)</option>
                                            <option value="DB">dark blue (DB)</option>
                                            <option value="PR">Pas red (PR)</option>
                                            <option value="RO">Rose pink (RO)</option>
                                            <option value="OY">Orange yellow (OY)</option>
                                            <option value="CR">Cream (C)</option>
                                            <option value="CG">light gray (LG)</option>
                                            <option value="S">Silver (S)</option>
                                            <option value="GG">grass green (GG)</option>
                                            <option value="MR">Maroon (MR)</option>
                                            <option value="WH">White (WH)</option>
                                            <option value="YE">Yellow (YE)</option>
                                            <option value="MA">Madasa (MA)</option>
                                            <option value="VI">Violet (VI)</option>
                                            <option value="TB">Tohatsu blue (TB)</option>
                                            <option value="BW">Baltic White (BW)</option>
                                            <option value="RA">Royal Avory (RA)</option>
                                            <option value="KB">Kubata (KB)</option>
                                            <option value="SS">Suzuki s-16 (SS)</option>
                                            <option value="KU">Kuhler (KU)</option>
                                            <option value="PG">Primer gray (PG)</option>
                                            <option value="HG">Honda green (HG)</option>
                                            <option value="YB">Yanmar bronze (YB)</option>
                                            <option value="OR">Orange (OR)</option>
                                            <option value="VW">Vespa white (VW)</option>
                                            <option value="TF">Tractor ford blue (TF)</option>
                                            <option value="PRR">Premier red (PRR)</option>
                                            <option value="GC">Gloss/flat clear (GC)</option>
                                            <option value="SB">Stain black (SB)</option>
                                            <option value="BE">Beige (BE)</option>
                                            <option value="KH">Khaki (KH)</option>
                                            <option value="GB">Gloss black (GB)</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="brand_id">Brand</label>
                                        <select name="brand_id" class="form-control">
                                            <option value="">Select Brand</option>
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="condition">Condition</label>
                                        <select name="condition" class="form-control">
                                            <option value="">Select Condition</option>
                                            <option value="default">Default</option>
                                            <option value="new">New</option>
                                            <option value="hot">Hot</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="stock">Quantity <span class="text-danger">*</span></label>
                                        <input id="quantity" type="number" name="stock" min="0"
                                            placeholder="Enter quantity" value="{{old('stock')}}" class="form-control">
                                        @error('stock')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
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

                            <div class="form-group mb-3">

                                <center> <button class="btn btn-success" type="submit">Submit</button> </center>
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
                        toolbar: []
                    });
                });

                $(document).ready(function() {
                    $('#description').summernote({
                        placeholder: "Write detail description.....",
                        tabsize: 2,
                        height: 150,
                        toolbar: []
                    });
                });

                // $('select').selectpicker();
                </script>

                <script>
                $('#cat_id').change(function() {
                    var cat_id = $(this).val();
                    // alert(cat_id);
                    if (cat_id != null) {
                        // Ajax call
                        $.ajax({
                            url: "/admin/category/" + cat_id + "/child",
                            data: {
                                _token: "{{csrf_token()}}",
                                id: cat_id
                            },
                            type: "POST",
                            success: function(response) {
                                if (typeof(response) != 'object') {
                                    response = $.parseJSON(response)
                                }
                                // console.log(response);
                                var html_option =
                                    "<option value=''>----Select sub category----</option>"
                                if (response.status) {
                                    var data = response.data;
                                    // alert(data);
                                    if (response.data) {
                                        $('#child_cat_div').removeClass('d-none');
                                        $.each(data, function(id, title) {
                                            html_option += "<option value='" + id + "'>" +
                                                title + "</option>"
                                        });
                                    } else {}
                                } else {
                                    $('#child_cat_div').addClass('d-none');
                                }
                                $('#child_cat_id').html(html_option);
                            }
                        });
                    } else {}
                })
                </script>
                @endpush