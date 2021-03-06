@extends('layouts.app')

@section('title', 'Create Place')


@section('content')
    <h3>Edit Video </h3>
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
            <div class="panel-heading">Edit Video</div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" action="/admin/video/update"
                      enctype="multipart/form-data">

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Title</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" class="form-control" name="video_id" value="{{$result->video_id}}">
                            <input type="text" placeholder="" class="form-control" name="video_title"
                                   value="{{$result->video_title}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">For Select</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="is_beauty_gram">
                                <option @if($result->is_beauty_gram==0) selected @endif value="0">Explorer Bangladesh</option>
                                <option @if($result->is_beauty_gram==1) selected @endif value="1">Beauty Gram</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Description</label>
                        <div class="col-lg-9">
                                    <textarea type="text" placeholder="" class="form-control"
                                              name="video_details">{!! $result->video_details !!}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Youtube Link</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="" class="form-control" name="youtube_links"
                                   value="@if($result->youtube_links!=null)https://www.youtube.com/embed/{{$result->youtube_links}} @endif">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Video</label>
                        <div class="col-lg-9">
                            <input type="file" placeholder="" class="form-control" name="video"
                                   value="{{$result->video}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Featured Image</label>
                        <div class="col-lg-9">
                            <input type="file" placeholder="" class="form-control" name="video_image"
                                   value="{{$result->video_image}}">
                        </div>
                    </div>





                    <div class="form-group row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-big btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
