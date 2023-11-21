@extends('backend.layouts.master')

@section('main-content')

<div style="margin: 40px;">
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white font-weight-bold">
                        Edit Product
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('product.update',$product->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="inputTitle" class="col-form-label">Title <span
                                        class="text-danger">*</span></label>
                                <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                                    value="{{$product->title}}" class="form-control">
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
                                            name="summary">{{$product->summary}}</textarea>
                                        @error('summary')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description" class="col-form-label">Description</label>
                                        <textarea class="form-control" id="description"
                                            name="description">{{$product->description}}</textarea>
                                        @error('description')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="is_featured">Is Featured</label><br>
                                <input type="checkbox" name='is_featured' id='is_featured'
                                    value='{{$product->is_featured}}' {{(($product->is_featured) ? 'checked' : '')}}>
                                Yes
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cat_id">Category <span class="text-danger">*</span></label>
                                        <select name="cat_id" id="cat_id" class="form-control">
                                            <option value="">--Select any category--</option>
                                            @foreach($categories as $key=>$cat_data)
                                            <option value='{{$cat_data->id}}'
                                                {{(($product->cat_id==$cat_data->id)? 'selected' : '')}}>
                                                {{$cat_data->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
<!--
                                <div class="col-md-3">
                                    <div class="form-group {{(($product->child_cat_id)? '' : 'd-none')}}"
                                        id="child_cat_div">
                                        <label for="child_cat_id">Sub Category</label>
                                        <select name="child_cat_id" id="child_cat_id" class="form-control">
                                            <option value="">--Select any sub category--</option>
                                        </select>
                                    </div>
                                </div>
-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="price" class="col-form-label">Price <span
                                                class="text-danger">*</span></label>
                                        <input id="price" type="number" name="price" placeholder="Enter price"
                                            value="{{$product->price}}" class="form-control">
                                        @error('price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="size">Size</label>
                                        <select name="size[]" class="form-control selectpicker" multiple
                                            data-live-search="true">
                                            <option value="">--Select any size--</option>
                                            @foreach($items as $item)
                                            @php
                                            $data=explode(',',$item->size);
                                            @endphp
                                            <option value="S" @if( in_array( "S" ,$data ) ) selected @endif>Small
                                            </option>
                                            <option value="M" @if( in_array( "M" ,$data ) ) selected @endif>Medium
                                            </option>
                                            <option value="L" @if( in_array( "L" ,$data ) ) selected @endif>Large
                                            </option>
                                            <option value="XL" @if( in_array( "XL" ,$data ) ) selected @endif>Extra Large
                                            </option>
                                            <option value="kL" @if( in_array( "KL" ,$data ) ) selected @endif>Kilograms
                                            </option>
                                            <option value="1/2" @if( in_array( "1/2" ,$data ) ) selected @endif>1/2 Load
                                            </option>
                                            <option value="1/4" @if( in_array( "1/4" ,$data ) ) selected @endif>1/4 Load 
                                            </option>
                                            <option value="Full" @if( in_array( "Full" ,$data ) ) selected @endif>Full Load
                                            </option>
                                            <option value="1" @if( in_array( "1" ,$data ) ) selected @endif>1
                                            </option>
                                            <option value="1 1/2" @if( in_array( "1 1/2" ,$data ) ) selected @endif>1 1/2    
                                            </option>
                                            <option value="2" @if( in_array( "2" ,$data ) ) selected @endif>2 
                                            </option>
                                            <option value="2 1/2" @if( in_array( "2 1/2" ,$data ) ) selected @endif>2 1/2
                                            </option>
                                            <option value="3" @if( in_array( "3" ,$data ) ) selected @endif>3  
                                            </option>
                                            <option value="4" @if( in_array( "4" ,$data ) ) selected @endif>4
                                            </option>
                                            <option value="5" @if( in_array( "5" ,$data ) ) selected @endif>5
                                            </option>
                                            <option value="OG" @if( in_array( "OG" ,$data ) ) selected @endif>okee green
                                            </option>
                                            <option value="FB" @if( in_array( "FB" ,$data ) ) selected @endif>flat black
                                            </option>
                                            <option value="SR" @if( in_array( "SR" ,$data ) ) selected @endif>silver red
                                            </option>
                                            <option value="MG" @if( in_array( "MG" ,$data ) ) selected @endif>mahogany
                                            </option>
                                            <option value="TB" @if( in_array( "TB" ,$data ) ) selected @endif>tivoli blue</option>
                                            <option value="SG" @if( in_array( "SG" ,$data ) ) selected @endif>stell gray</option>
                                            <option value="WG" @if( in_array( "WG" ,$data ) ) selected @endif>willow green</option>
                                            <option value="DG" @if( in_array( "DG" ,$data ) ) selected @endif>deep greeen</option>
                                            <option value="OR" @if( in_array( "OR" ,$data ) ) selected @endif>orange red</option>
                                            <option value="RB" @if( in_array( "RB" ,$data ) ) selected @endif>river blue</option>
                                            <option value="DAG" @if( in_array( "DAG" ,$data ) ) selected @endif>dark gray</option>
                                            <option value="BL" @if( in_array( "BL" ,$data ) ) selected @endif>blue</option>
                                            <option value="SG" @if( in_array( "SG" ,$data ) ) selected @endif>silver gray</option>
                                            <option value="SIR" @if( in_array( "SIR" ,$data ) ) selected @endif>signal red</option>
                                            <option value="LY" @if( in_array( "LY" ,$data ) ) selected @endif>lemon yellow</option>
                                            <option value="OLG" @if( in_array( "OLG" ,$data ) ) selected @endif>olive green</option>
                                            <option value="LG" @if( in_array( "LG" ,$data ) ) selected @endif>leaf green</option>
                                            <option value="DB" @if( in_array( "DB" ,$data ) ) selected @endif>dark blue</option>
                                            <option value="PR" @if( in_array( "PR" ,$data ) ) selected @endif>Pas red </option>
                                            <option value="RO" @if( in_array( "RO" ,$data ) ) selected @endif>Rose pink </option>
                                            <option value="OY" @if( in_array( "OY" ,$data ) ) selected @endif>Orange yellow</option>
                                            <option value="CR" @if( in_array( "CR" ,$data ) ) selected @endif>Cream</option>
                                            <option value="CG" @if( in_array( "CG" ,$data ) ) selected @endif>light gray</option>
                                            <option value="SI" @if( in_array( "SI" ,$data ) ) selected @endif>Silver</option>
                                            <option value="GG" @if( in_array( "GG" ,$data ) ) selected @endif>grass green</option>
                                            <option value="MR" @if( in_array( "MR" ,$data ) ) selected @endif>Maroon</option>
                                            <option value="WH" @if( in_array( "WH" ,$data ) ) selected @endif>White </option>
                                            <option value="YE" @if( in_array( "YE" ,$data ) ) selected @endif>Yellow</option>
                                            <option value="MA" @if( in_array( "MA" ,$data ) ) selected @endif>Madasa</option>
                                            <option value="VI" @if( in_array( "VI" ,$data ) ) selected @endif>Violet</option>
                                            <option value="TB" @if( in_array( "TB" ,$data ) ) selected @endif>Tohatsu blue </option>
                                            <option value="BW" @if( in_array( "BW" ,$data ) ) selected @endif>Baltic White</option>
                                            <option value="RA" @if( in_array( "RA" ,$data ) ) selected @endif>Royal Avory</option>
                                            <option value="KB" @if( in_array( "KB" ,$data ) ) selected @endif>Kubata</option>
                                            <option value="SS" @if( in_array( "SS" ,$data ) ) selected @endif>Suzuki s-16 </option>
                                            <option value="KU" @if( in_array( "KU" ,$data ) ) selected @endif>Kuhler</option>
                                            <option value="PG" @if( in_array( "PG" ,$data ) ) selected @endif>Primer gray </option>
                                            <option value="HG" @if( in_array( "HG" ,$data ) ) selected @endif>Honda green</option>
                                            <option value="YB" @if( in_array( "YB" ,$data ) ) selected @endif>Yanmar bronze </option>
                                            <option value="OR" @if( in_array( "OR" ,$data ) ) selected @endif>Orange </option>
                                            <option value="VW" @if( in_array( "VM" ,$data ) ) selected @endif>Vespa white </option>
                                            <option value="TF" @if( in_array( "TF" ,$data ) ) selected @endif>Tractor ford blue</option>
                                            <option value="PRR" @if( in_array( "PRR" ,$data ) ) selected @endif>Premier red</option>
                                            <option value="GC" @if( in_array( "GC" ,$data ) ) selected @endif>Gloss/flat clear </option>
                                            <option value="SB" @if( in_array( "SB" ,$data ) ) selected @endif>Stain black </option>
                                            <option value="BE" @if( in_array( "BE" ,$data ) ) selected @endif>Beige </option>
                                            <option value="KH" @if( in_array( "KH" ,$data ) ) selected @endif>Khaki</option>
                                            <option value="GB" @if( in_array( "GB" ,$data ) ) selected @endif>Gloss black</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="brand_id">Brand</label>
                                <select name="brand_id" class="form-control">
                                    <option value="">--Select Brand--</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}"
                                        {{(($product->brand_id==$brand->id)? 'selected':'')}}>{{$brand->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="condition">Condition</label>
                                        <select name="condition" class="form-control">
                                            <option value="">--Select Condition--</option>
                                            <option value="default"
                                                {{(($product->condition=='default')? 'selected':'')}}>Default</option>
                                            <option value="new" {{(($product->condition=='new')? 'selected':'')}}>New
                                            </option>
                                            <option value="hot" {{(($product->condition=='hot')? 'selected':'')}}>Hot
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="stock">Quantity <span class="text-danger">*</span></label>
                                        <input id="quantity" type="number" name="stock" min="0"
                                            placeholder="Enter quantity" value="{{$product->stock}}"
                                            class="form-control">
                                        @error('stock')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputPhoto" class="col-form-label">Photo <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                    class="btn btn-primary text-white">
                                                    <i class="fas fa-image"></i> Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="photo"
                                                value="{{$product->photo}}">
                                        </div>
                                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                        @error('photo')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="status" class="col-form-label">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status" class="form-control">
                                            <option value="active" {{(($product->status=='active')? 'selected' : '')}}>
                                                Active</option>
                                            <option value="inactive"
                                                {{(($product->status=='inactive')? 'selected' : '')}}>Inactive</option>
                                        </select>
                                        @error('status')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3 text-center">
                                <button class="btn btn-success" type="submit">Update</button>
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
                        height: 150,
                        toolbar: []
                    });

                    $('#description').summernote({
                        placeholder: "Write detail Description.....",
                        tabsize: 2,
                        height: 150,
                        toolbar: []
                    });
                });
                </script>

                <script>
                var child_cat_id = '{{$product->child_cat_id}}';
                // alert(child_cat_id);
                $('#cat_id').change(function() {
                    var cat_id = $(this).val();

                    if (cat_id != null) {
                        // ajax call
                        $.ajax({
                            url: "/admin/category/" + cat_id + "/child",
                            type: "POST",
                            data: {
                                _token: "{{csrf_token()}}"
                            },
                            success: function(response) {
                                if (typeof(response) != 'object') {
                                    response = $.parseJSON(response);
                                }
                                var html_option = "<option value=''>--Select any one--</option>";
                                if (response.status) {
                                    var data = response.data;
                                    if (response.data) {
                                        $('#child_cat_div').removeClass('d-none');
                                        $.each(data, function(id, title) {
                                            html_option += "<option value='" + id + "' " + (
                                                    child_cat_id == id ? 'selected ' : '') +
                                                ">" + title + "</option>";
                                        });
                                    } else {
                                        console.log('no response data');
                                    }
                                } else {
                                    $('#child_cat_div').addClass('d-none');
                                }
                                $('#child_cat_id').html(html_option);

                            }
                        });
                    } else {

                    }

                });
                if (child_cat_id != null) {
                    $('#cat_id').change();
                }
                </script>
                @endpush