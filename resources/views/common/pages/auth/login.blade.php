@extends('layouts.common')

@section('title', 'User Login')



@section('content')

    <div class="container margin_60">


        <div class="plan col-lg-3 mx-auto">
            @if(session('success'))

                <div class="alert alert-success">{{session('success')}}!</div>

            @endif
            @if(session('failed'))
                <div class="alert alert-danger">
                    {{session('failed')}}!
                </div>
            @endif

              {{--  <a href="/user/login/facebook" class="social_bt facebook">Login with Facebook</a>--}}
                <a href="/user/login/google" class="social_bt google">Login with Google</a>
                <div class="divider"></div>

                <form method="post" action="/user/login-check">
                    <div class="form-group">
               {{--         <label>Email</label>--}}
                        <input type="text" class=" form-control " placeholder="Email" name="email" required>
                        <input name="_token" value="{{csrf_token()}}" type="hidden">
                    </div>
                    <div class="form-group">
            {{--            <label>Password</label>--}}
                        <input type="password" class=" form-control" minlength="5" placeholder="Password" name="password" required>
                    </div>
                    <p class="small">
                        <a href="/user/forget-pass">Forgot Password?</a>
                    </p>
                    <button type="submit" class="btn_full">Sign in</button>
                    <a href="/user/registration " class="btn_full_outline">Register</a>
                </form>


        </div>
        <!--End row -->

    </div>

@stop
