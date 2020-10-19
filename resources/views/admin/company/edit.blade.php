@extends('layouts.app')

@section('title', 'Create Place')


@section('content')
    <h3>Company Edit</h3>
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
            <div class="panel-heading">Company Edit</div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" action="/admin/company/update"
                      enctype="multipart/form-data">

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Title</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" class="form-control" name="company_id" value="{{$result->company_id}}">
                            <input type="text" placeholder="" class="form-control" value="{{$result->company_title}}" name="company_title">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Image(300*300PX)</label>
                        <div class="col-lg-9">
                            <input type="file" placeholder="" class="form-control" name="image">
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
