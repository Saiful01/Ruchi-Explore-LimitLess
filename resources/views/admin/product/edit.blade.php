@extends('layouts.app')

@section('title', 'Create Place')


@section('content')
    <h3>Edit product </h3>
    <hr>

    <div class="col-sm-12">
        @if(session('success'))

            <div class="alert alert-success">{{session('success')}}!</div>

        @endif
        @if(session('failed'))
            <div class="alert alert-danger">
                {{session('failed')}}!
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">Edit product</div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" action="/admin/product/update"
                      enctype="multipart/form-data">

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Select Category</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="product_category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->product_category_id}}"
                                            @if($result->product_category_id==$category->product_category_id) selected @endif> {{$category->product_category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Product Name</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" class="form-control" name="product_id" value="{{$result->product_id}}">
                            <input type="text" placeholder="" class="form-control" name="product_name"
                                   value="{{$result->product_name}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Product details</label>
                        <div class="col-lg-9">
                                    <textarea type="text" placeholder="" class="form-control"
                                              name="product_details" rows="5"
                                              required>{{$result->product_details}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Available In</label>
                        <div class="col-lg-9">

                            <input type="text" placeholder="" class="form-control" name="available_in"
                                   value="{{$result->available_in}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">URL Link</label>
                        <div class="col-lg-9">

                            <input type="text" placeholder="" class="form-control" name="url_link"
                                   value="{{$result->url_link}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Product Price </label>
                        <div class="col-lg-9">

                            <input type="text" placeholder="" class="form-control" name="Product_price"
                                   value="{{$result->Product_price}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Product Image </label>
                        <div class="col-lg-9">

                            <input type="file" placeholder="" class="form-control" name="Product_image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-big btn-primary">update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        CKEDITOR.replace('trip_album_details');
    </script>
@endsection
