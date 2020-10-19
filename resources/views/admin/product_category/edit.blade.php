@extends('layouts.app')

@section('title', 'Create Place')


@section('content')
    <h3>Edit product Category </h3>
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
            <div class="panel-heading">Edit product Category</div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" action="/admin/product/category/update"
                      enctype="multipart/form-data">

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Category Name</label>
                        <div class="col-lg-9">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="hidden" name="product_category_id" value="{{$result->product_category_id}}"/>
                            <div class="form-group">
                                <input name="product_category_name" class="form-control style_2" placeholder=" "
                                       value="{{$result->product_category_name}}"/>
                            </div>
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
                            <input type="file" name="slider_image2" class="form-control style_2" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-big btn-primary">Update</button>

                </form>

            </div>
        </div>

    </div>


    <script>
        CKEDITOR.replace('trip_album_details');
    </script>
@endsection
