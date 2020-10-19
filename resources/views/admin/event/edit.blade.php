@extends('layouts.app')

@section('title', 'Create Place')


@section('content')
    <h3>Edit Event </h3>
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
            <div class="panel-heading">Edit Event</div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" action="/admin/event/update"
                      enctype="multipart/form-data">

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Title (English)</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" class="form-control" name="event_id" value="{{$result->id}}">
                            <input type="text" placeholder="English" class="form-control" name="event_title_en" value="{{$result->event_title_en}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Title (Bangla)</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="text" placeholder="English" class="form-control" name="event_title_bn" value="{{$result->event_title_bn}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Event Starting Date</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="date"  class="form-control" name="event_starting_date" value="{{$result->event_starting_date}}">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Event Ending Date</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="date"  class="form-control" name="event_ending_date" value="{{$result->event_ending_date}}">
                        </div>

                    </div>




                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Address</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="text" placeholder="Address" class="form-control" name="event_address" value="{{$result->event_address}}">
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

    <script>
        CKEDITOR.replace('trip_album_details');
    </script>
@endsection
