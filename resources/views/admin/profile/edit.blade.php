@extends('layouts.app')

@section('title', 'Update User')


@section('content')
    <h3>Update User</h3>
    <hr>

    <div class="col-sm-8 mx-auto">
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
            <div class="panel-heading">Update Profile</div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" action="/admin/profile/update"
                      enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Full Name</label>
                        <div class="col-lg-10">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" class="form-control" name="id" value="{{$result->id}}">
                            <input type="text" placeholder="Full Name" class="form-control" name="full_name"
                                   value="{{$result->full_name}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Phone</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="Phone" class="form-control" value="{{$result->phone}}"
                                   name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" placeholder="Email" class="form-control" value="{{$result->email}}"
                                   name="email">
                        </div>
                    </div>
                    {{--<div class="form-group">
                        <label class="col-lg-2 control-label">Date of joining</label>
                        <div class="col-lg-10">
                            <input type="date" placeholder="Date of joining" class="form-control"
                                   value="{{$result->dateofjoining}}" name="dateofjoining">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Date of Birth</label>
                        <div class="col-lg-10">
                            <input type="date" placeholder="Date of Birth" class="form-control"
                                   value="{{$result->dateofbirth}}" name="dateofbirth">
                        </div>
                    </div>--}}

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Image</label>
                        <div class="col-lg-10">
                            <input type="file" class="form-control" name="image">
                            <input type="hidden" class="form-control" name="profile_pic"
                                   value="{{$result->profile_pic}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-10">
                            <input type="password" placeholder="Password" class="form-control" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
