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
    <h3>Create Post </h3>
    <hr>



    <form action="/post/store" method="post" enctype="multipart/form-data">
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
                        <div class="form-group">
                            <input name="blog_title" class="form-control style_2" placeholder="Title" required/>
                        </div>

                        <div class="form-group">
                        <textarea name="blog_details" class="form-control style_2 summernote" style="height:250px;"
                                  placeholder="Blog Details" required></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-big btn-primary">Save</button>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-sm-3">
                <div class="panel panel-default">

                    <br>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="hidden" required name="author_id" placeholder="ID"  value="1" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <select class="form-control" name="is_beauty_gram">
                                <option value="0"> Explorer Bangladesh</option>
                                <option value="1">Beauty Gram</option>

                            </select>
                        </div>
                    </div>

                    <div class="panel-body">

                        <label class="font-weight-bold"> Select category</label>
                        <div class="form-group">
                            <div class="containercheckbox">

                                @foreach($categories as $category)
                                    <input class="ml-2" type="checkbox" name="category_id[]"
                                           value="{{$category->blog_category_id}}"/> {{$category->en_name}} <br/>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold"> Add your blog Image</label>

                         {{--   <img id="preview" src="#" alt="Your image will appear here" height="150px" width="100%"/>
--}}
                            <input type="file" name="image" id="upload_image" class="form-control style_2"/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>



@endsection
