@extends('layouts.app')

@section('title', 'Create Place')


@section('content')
    <h3>Edit product Category </h3>
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
            <div class="panel-heading">Edit product Category</div>

            <div class="panel-body">


                <form action="/admin/tourist-spot-category/update" method="post" >
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Eng Name</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" class="form-control" name="spot_category_id" value="{{$result->spot_category_id}}">
                            <input type="text" placeholder="" class="form-control" name="en_name"
                                   value="{{$result->en_name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> BN Name</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="" class="form-control" name="bn_name"
                                   value="{{$result->bn_name}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-big btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


@endsection
