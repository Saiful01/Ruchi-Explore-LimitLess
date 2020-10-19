@extends('layouts.app')

@section('title', 'Create Place')


@section('content')
    <h3>Edit Trip Album </h3>
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
            <div class="panel-heading">Edit Trip Album</div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" action="/admin/tripalbum/update"
                      enctype="multipart/form-data">

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Title</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" class="form-control" name="trip_album_id"
                                   value="{{$result->trip_album_id}}">
                            <input type="text" placeholder="" class="form-control" name="trip_album_title"
                                   value="{{$result->trip_album_title}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Select For</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="is_beauty_gram">
                                <option @if($result->is_beauty_gram==0) selected @endif  value="0"> Explorer Bangladesh</option>
                                <option @if($result->is_beauty_gram==1) selected @endif  value="1" >Beauty Gram</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Season Type</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="season_type">
                                <option @if($result->season_type==0) selected @endif value="0">None</option>
                                <option @if($result->season_type==1) selected @endif value="1">Season 1</option>
                                <option @if($result->season_type==2) selected @endif value="2">Season 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Description</label>
                        <div class="col-lg-9">
                            <textarea  class="form-control" name="trip_album_details">{{ $result->trip_album_details }}</textarea>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Image</label>
                        <div class="col-lg-9">
                            <input type="file" placeholder="" class="form-control" name="image">
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
