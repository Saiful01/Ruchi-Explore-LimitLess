@extends('layouts.app')

@section('title', 'Create Place')


@section('content')
    <h3>Edit Category </h3>
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
            <div class="panel-heading">Edit Category</div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" action="/admin/blog_category/update/{{$result->blog_category_id}}" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Category Name</label>
                        <div class="col-lg-9">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <input name="en_name" class="form-control style_2" placeholder=" " value="{{$result->en_name}}" />
                            </div>
                            <div class="form-group">
                                <input name="bn_name" class="form-control style_2" placeholder=" " value="{{$result->bn_name}}"/>
                            </div>
                            <div class="form-group">
                                <textarea name="category_details" rows="10" {{--data-provide="markdown"--}} class="form-control style_2 summernote" placeholder="Category Details" required>{{$result->category_details}}</textarea>
                            </div>

                            <div class="form-group">
                                <input name="image" type="file"  class="form-control style_2"  required/>
                            </div>

                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 control-label"></label>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-big btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
