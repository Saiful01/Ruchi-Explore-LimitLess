@extends('layouts.app')

@section('title', 'Create Category')


@section('content')
    <h3>Create product Category </h3>
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
            <div class="panel-heading">Add product Category Name</div>

            <div class="panel-body">

                <form action="/admin/product/category/store" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Category Name</label>
                        <div class="col-lg-9">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="text" class="form-control style_2" name="product_category_name"/>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Category Image</label>
                        <div class="col-lg-9">
                            <input type="file" name="image" class="form-control style_2"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Category Banner Image(1100*200)</label>
                        <div class="col-lg-9">
                            <input type="file" name="slider_image2" class="form-control style_2" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"></label>
                        <div class="col-lg-9">
                            <button type="submit" class="btn btn-big btn-primary">Save</button> </div>
                    </div>

                </form>
            </div>
        </div>

    </div>

@endsection
