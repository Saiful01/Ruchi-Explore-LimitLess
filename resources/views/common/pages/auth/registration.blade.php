@extends('layouts.common')

@section('title', 'User Registration')



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

            <form method="post" action="/user/do-registration">
                <div class="form-group">
                    {{--         <label>Email</label>--}}
                    <input type="text" class=" form-control " placeholder="Full Name" name="full_name">
                    <input name="_token" value="{{csrf_token()}}" type="hidden" required>
                </div>
                <div class="form-group">
                    <input type="text" class=" form-control " placeholder="Phone" name="phone" required>
                </div>
                <div class="form-group">

                    <input type="text" class=" form-control " placeholder="Email" name="email" required>
                </div>
                <div class="form-group">

                    <input type="password" class="form-control" minlength="5" placeholder="Password" name="password" required>
                </div>
                <div class="form-group">

                    <input type="text" class="form-control"  placeholder="Address" name="address" required>
                </div>
                <p class="small">
                    <a href="/user/forget-pass">Forgot Password?</a>
                </p>
                <button type="submit" class="btn_full">Register</button>
                <a href="/user/login " class="btn_full_outline">Sign in</a>
            </form>


        </div>
        <!--End row -->


    </div>
    </div>

@stop
