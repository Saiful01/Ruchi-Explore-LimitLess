@extends('layouts.app')

@section('title', 'Create Place')


@section('content')
    <h3>Create video </h3>
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
            <div class="panel-heading">New video</div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" action="/admin/video/store"
                      enctype="multipart/form-data">

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Authort ID</label>
                        <div class="col-lg-9">
                            <input type="number" placeholder="" class="form-control" name="author_id" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Title</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="text" placeholder="" class="form-control" name="video_title"
                            required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">For select</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="is_beauty_gram">
                                <option value="0"> Explorer Bangladesh</option>
                                <option value="1">Beauty Gram</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Description</label>
                        <div class="col-lg-9">
                                    <textarea type="text" placeholder="" class="form-control "
                                              name="video_details" id="video_details" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Youtube Link</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="" class="form-control" name="youtube_links"
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Video</label>
                        <div class="col-lg-9">
                            <input type="file" placeholder="" class="form-control" name="video"
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Featured Image</label>
                        <div class="col-lg-9">
                            <input type="file" placeholder="" class="form-control" name="video_image" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 control-label"></label>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-big btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
