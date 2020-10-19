@extends('layouts.common')

@section('title', 'Create Forum')



@section('content')

    <div class="container margin_60">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('success')}}!</strong>
                </div>
            @endif
            @if(session('failed'))
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('failed')}}!</strong>
                </div>
            @endif

        <!-- The Modal -->
        <div class="container">

            @if(!Auth::guest())
                <div class="">
                    <h4 class="">New Topic</h4>
                </div>


                    <form action="/user/forum/store" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <input name="title" class="form-control style_2" placeholder="Title" required/>
                        </div>

                        <div class="form-group">

                        <textarea id="content" name="details" class="form-control style_2"
                                  style="height:150px;"
                                  placeholder="Forum Details" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="reset" class="btn_1" value="Clear form"/>
                            <input type="submit" class="btn_1" value="New Forum"/>
                        </div>
                    </form>

            @else

                <div class="">
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter title" name="user_login"
                                   ng-model="user_login" required>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Enter title"
                                   name="password"
                                   ng-model="password" required>
                        </div>


                        <button type="button" class="btn btn-primary" ng-click="checkLogin()" class="close"
                                data-dismiss="modal">Login
                        </button>
                    </form>

                </div>
            @endif


        </div>
    </div>


@stop
