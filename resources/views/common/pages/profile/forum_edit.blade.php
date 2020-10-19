@extends('layouts.common')

@section('title', 'Edit Forum')



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
                <h4 class="">Forum Edit</h4>
            </div>


            <form action="/user/forum/update" method="post" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="hidden" name="topic_id" value="{{$result->topic_id}}"/>
                <div class="form-group">
                    <input name="title" class="form-control style_2" placeholder="Title" value="{{$result->title}}" required/>
                </div>

                <div class="form-group">

                        <textarea id="content" name="details" class="form-control style_2"
                                  style="height:150px;"
                                  placeholder="Forum Details" required>{{$result->details}}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn_1" value="Update Forum"/>
                </div>
            </form>

        </div>
    </div>


@stop
