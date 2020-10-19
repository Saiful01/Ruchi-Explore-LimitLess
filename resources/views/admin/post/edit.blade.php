@extends('layouts.app')

@section('title', 'Create Place')
<style>
    .containercheckbox {
        padding: 3px;
        border: 1px solid #ccc;
        height: 200px;
        overflow-y: scroll;
    }
</style>


@section('content')
    <h3>Edit Post </h3>
    <hr>



    <form action="/post/update" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-9">
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

                    <div class="panel-body">


                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <input type="hidden" name="blog_id" value="{{$result->blog_id}}"/>
                        <div class="form-group">
                            <input name="blog_title" value="{{$result->blog_title}}" class="form-control style_2"
                                   placeholder="Title" required/>
                        </div>

                        <div class="form-group">
                        <textarea name="blog_details" class="form-control style_2 summernote" style="height:150px;"
                                  placeholder="Blog Details" required>{{$result->blog_details}}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-big btn-primary">Update</button>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-sm-3">
                <div class="panel panel-default">

                    <div class="panel-body">

                        <div class="form-group">

                            <select class="form-control" name="is_beauty_gram">
                                <option value="0"> Explorer Bangladesh</option>
                                <option value="1">Beauty Gram</option>

                            </select>

                        </div>

                        <lebel class="font-weight-bold"> Select category</lebel>

                        <div class="form-group">
                            <div class="containercheckbox align-content-center">



                                @foreach($categories as $category)
                                    <input class="ml-2" type="checkbox" name="category_id[]"

                                           @foreach(json_decode($result->category_id) as $item)

                                           @if($category->blog_category_id==$item)
                                           checked
                                           @endif

                                           @endforeach


                                           value="{{$category->blog_category_id}}"/> {{$category->en_name}} <br/>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">

                            <img id="preview" src="/images/blog/{{$result->featured_image}}" alt="your image" height="200px" width="100%"/>

                            <input type="file" name="image" id="upload_image" class="form-control style_2"/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>



@endsection
