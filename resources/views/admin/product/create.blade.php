@extends('layouts.app')

@section('title', 'Create Category')


@section('content')
    <h3>Create product  </h3>
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
            <div class="panel-heading">Add product</div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" action="/admin/product/store"
                      enctype="multipart/form-data">

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Select Category</label>
                        <div class="col-lg-9">
                            <select  class="form-control" name="product_category_id">
                                @foreach($categories as $category)
                                <option value="{{$category->product_category_id}}"> {{$category->product_category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Product Name</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="text" placeholder="" class="form-control" name="product_name"
                            required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Product details</label>
                        <div class="col-lg-9">
                                    <textarea type="text" placeholder="" class="form-control"
                                              name="product_details" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Available In</label>
                        <div class="col-lg-9">

                            <input type="text" placeholder="" class="form-control" name="available_in">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">URL Link</label>
                        <div class="col-lg-9">

                            <input type="text" placeholder="" class="form-control" name="url_link" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Product Price </label>
                        <div class="col-lg-9">

                            <input type="text" placeholder="" class="form-control" name="Product_price" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Product Image </label>
                        <div class="col-lg-9">

                            <input type="file" placeholder="" class="form-control" name="Product_image" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-big btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
