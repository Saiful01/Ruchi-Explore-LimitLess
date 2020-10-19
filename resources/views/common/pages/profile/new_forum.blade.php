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

                    <input class="form-control" type="file" name="image"/>
                </div>
                <div class="form-group">
                    <input type="reset" class="btn_1" value="Clear form"/>
                    <input type="submit" class="btn_1" value="New Forum"/>
                </div>
            </form>

        </div>
    </div>


@stop
