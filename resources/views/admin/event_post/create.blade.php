@extends('layouts.app')

@section('title', 'Create Event Post')


@section('content')
    <h3>Create Event Post </h3>
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
            <div class="panel-heading">New Event Post</div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" action="/admin/event-post/store"
                      enctype="multipart/form-data">

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Title (English)</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="text" placeholder="English" class="form-control" name="event_post_title_en"
                                   required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Title (Bangla)</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="text" placeholder="বাংলায়" class="form-control" name="event_post_title_bn"
                                   required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Event For</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="event_id">
                              @foreach($events as $event )
                                <option value="{{$event->id}}">{{$event->event_title_en}}</option>
                              @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Description</label>
                        <div class="col-lg-9">
                                    <textarea type="text" placeholder="" class="form-control"
                                              name="event_post_description" id="event_post_description"></textarea>
                        </div>
                    </div>
                   {{-- <div class="form-group row">
                        <label class="col-lg-3 control-label">Youtube Link</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="" class="form-control" name="event_post_youtube_links"
                            >
                        </div>
                    </div>--}}
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Featured Image</label>
                        <div class="col-lg-9">
                            <input type="file" placeholder="" class="form-control" name="image"
                            >
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-big btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection

