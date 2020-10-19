@extends('layouts.common')

@section('title', 'Password reset')



@section('content')

    <div class="container margin_60">


        <div class="plan col-lg-4 mx-auto">
            @if(session('success'))

                <div class="alert alert-success">{{session('success')}}!</div>
                <p>In case you cant find email, Check your spam folder</p>

            @endif
            @if(session('failed'))
                <div class="alert alert-danger">
                    {{session('failed')}}!
                </div>
            @endif

            <p class="text-danger">Enter your new password</p>

            <form method="post" action="/user/confirm/reset/{{$id}}">
                <div class="form-group">
                    {{--            <label>Password</label>--}}
                    <input type="password" class=" form-control" minlength="5" placeholder="New Password"
                           name="password"
                           required>
                    <input type="hidden" name="id" value="{{$id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>

                <button type="submit" class="btn_full">Reset</button>
                <a href="/user/login " class="btn_full_outline">Sign in</a>
            </form>


        </div>
        <!--End row -->

    </div>

@stop