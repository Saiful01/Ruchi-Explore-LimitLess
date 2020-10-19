@extends('layouts.app')

@section('title', 'Create Category')


@section('content')
    <h3>Create Category </h3>
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
            <div class="panel-heading">Add Category </div>

            <div class="panel-body">

                <form action="/admin/blog_category/store" method="post" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <input name="en_name" class="form-control style_2" placeholder="Category In English" required/>
                    </div>
                    <div class="form-group">
                        <input name="bn_name" class="form-control style_2" placeholder="ক্যাটাগরি বাংলায়" required/>
                    </div>
                    <div class="form-group">
                        <textarea name="category_details" class="summernote" {{--data-provide="markdown"--}} rows="10" placeholder="Category Details"></textarea>
                    </div>

                    <div class="form-group">
                        <input name="image" type="file" class="form-control style_2"  required/>
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-big btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


    <script>
        $("#some").markdown({autofocus:false,savable:false})
    </script>

@endsection
