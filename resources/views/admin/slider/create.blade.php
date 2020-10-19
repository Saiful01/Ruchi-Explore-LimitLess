@extends('layouts.app')

@section('title', 'Create Place')


@section('content')
    <h3>Slider Create</h3>
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
            <div class="panel-heading">Slider Create</div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" action="/admin/slider/store"
                      enctype="multipart/form-data">

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Eng Title</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="text" placeholder="" class="form-control" name="en_title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Bangla Title</label>
                        <div class="col-lg-9">

                            <input type="text" placeholder="" class="form-control" name="bn_title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Eng Sub Title</label>
                        <div class="col-lg-9">

                            <input type="text" placeholder="" class="form-control" name="en_sub_title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Bangla Sub Title</label>
                        <div class="col-lg-9">

                            <input type="text" placeholder="" class="form-control" name="bn_sub_title">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Image(1280*640px)</label>
                        <div class="col-lg-9">
                            <input type="file" placeholder="" class="form-control" name="image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Read More URL</label>
                        <div class="col-lg-9">

                            <input type="text" placeholder="" class="form-control" name="url">
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
