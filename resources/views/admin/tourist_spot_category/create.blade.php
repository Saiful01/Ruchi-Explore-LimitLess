@extends('layouts.app')

@section('title', 'Create Category')


@section('content')
    <h3>Create Tourist Spot Category </h3>
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
            <div class="panel-heading">Add Create Tourist Spot Category</div>

            <div class="panel-body">

                <form action="/admin/tourist-spot-category/store" method="post" >
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Eng Name</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="text" placeholder="" class="form-control" name="en_name"
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> BN Name</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="" class="form-control" name="bn_name"
                            >
                        </div>
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-big btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
