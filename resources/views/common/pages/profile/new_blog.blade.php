@extends('layouts.common')

@section('title', 'Blog')
<style>
    .containercheckbox {
        padding: 3px;
        border: 1px solid #ccc;
        height: 200px;
        overflow-y: scroll;
    }

</style>

<style>
    .modal-backdrop {
        position: inherit !important;
    }

    .modal-dialog {
        margin-top: 128px;
    }
</style>

@section('content')



    <br>
    <div class="margin_60 container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
        @endif

        @if(Session::has('failed'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('failed') }}</p>
        @endif

        <div class="row ml-2 m-2">
            <span class=" font-weight-bold">Create Blog</span>
        </div>
        <div class="row">


            <div class="col-md-12">
                <form action="/user/blog/store" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="panel panel-default">

                                <div class="panel-body">


                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <div class="form-group">
                                        <input name="blog_title" class="form-control style_2" placeholder="Title"
                                               required/>
                                    </div>

                                    <div class="form-group">
                        <textarea name="blog_details" class="form-control style_2" style="height:250px;"
                                  placeholder="Blog Details" id="summernote" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-big btn-primary">Save</button>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-sm-3">
                            <div class="panel panel-default">

                                <div class="panel-body">
                                {{--    <div class="form-group">
                                            <select class="form-control" name="is_beauty_gram">
                                                <option value="0"> Explorer Bangladesh</option>
                                                <option value="1">Beauty Gram</option>

                                            </select>
                                    </div>--}}

                                    <label class="font-weight-bold"> Select category</label>
                                    <div class="form-group">
                                        <div class="containercheckbox">

                                            @foreach($categories as $category)
                                                <input class="ml-2" type="checkbox" name="category_id[]"
                                                       value="{{$category->blog_category_id}}" /> {{$category->en_name}}
                                                <br/>

                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold"> Add your blog Image</label>

                                        <img id="preview" src="#" alt="your image" height="100px" width="100%" style="display: none"/>

                                        <input type="file" name="image" id="upload_image" class="form-control style_2" />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>


        </div>
        <!-- End row-->
    </div>

@stop
