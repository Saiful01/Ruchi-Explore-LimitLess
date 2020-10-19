@extends('layouts.common')

@section('title', 'Forum')



@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <style>
        .icon-thumbs-up {
            cursor: pointer;
            outline: none;
        }
    </style>

    <div class="" style="background: url(./images/game/game-1/GB-7.png);width:100%;">
        <div class="container margin_60" ng-controller="forumController">

            <div class="row">
                <div class="col-md-8">
                    @if(session('success'))

                        <div class="alert alert-success">{{session('success')}}!</div>

                    @endif
                    @if(session('failed'))
                        <div class="alert alert-danger">
                            {{session('failed')}}!
                        </div>
                    @endif

                    <h4>{{__('localize.discussion_forum')}}</h4>

                    @if(Auth::check())
                        <a href="/user/forum/create" class="btn_1 add_bottom_30">+{{__('localize.post_new_topic')}}</a>
                        {{--                   <button class="btn btn-success" data-toggle="modal"  data-target="#newTopic">+Post New Topic</button>--}}
                    @else
                        <a class="btn btn-success btn-sm" href="/login"><i class="icon-login"></i> Login To Post</a>

                    @endif
                </div>
                <div class="col-md-4">
                    <form method="post" action="/user/forums/search">
                        <div class="input-group md-form form-sm form-2 pl-0"
                             style="border-radius: 15px; border: 2px solid; border-color: grey">

                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input id="search" name="search" class=" my-0 py-1 amber-border" type="text"
                                   placeholder="Search">
                            <button style="background: white;border-style: none; border-radius: 15px" type="submit">
                                <i class="fa fa-search text-success"></i>
                            </button>

                        </div>
                    </form>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12 ">
                    @if(count($results)<=0)

                        <div class="col-lg-9 mx-auto wow zoomIn" data-wow-delay="0.2s">
                            <div class="box_style_1">
                                <h6 class="text-danger"> Search elements are empty</h6>
                            </div>

                        </div>
                    @endif
                    @foreach( $results as $result)

                        <div class=" box_style_1" style="padding-bottom: 5px;
    padding-top: 11px;    margin-bottom: 5px;    border: 1px solid gray;">

                            <div class="">

                                <div class="row ">
                                    <div class="col-md-2 col-3">


                                        @if($result->profile_pic !=null)
                                            <img style=" border: 1px solid #E5D390;border-radius: 15px !important;"
                                                 src="/images/user/{{$result->profile_pic}}" height="40px" alt="Image"
                                                 class="img-circle"><br>
                                        @else
                                            <img style="border: 1px solid #E5D390;border-radius: 15px !important;"
                                                 src="/template/img/avatar1.jpg" alt="Image" height="40px"
                                                 class="rounded img-circle">
                                            <br>
                                        @endif

                                        <p style="color: #5284AA;font-size: 13px !important;;margin-bottom: 5px">{{$result->full_name}}</p>
                                        <small style="font-size: 11px">  {{dateFormat($result->created_at)}} </small>

                                    </div>

                                    <div class="col-md-9 col-6">
                                        <a href="/forum-details/{{$result->topic_id}}/{{getTitleToUrl($result->title)}}">

                                            <p class="small"
                                               style="color: #5284AA;  font-size: 18px !important;">{{$result->title}}</p>
                                            <p style="    font-size: 13px !important;font-weight: normal !important;text-align: justify;margin-bottom: 2px; ">{{$result->details}}</p>

                                            @if($result->image!=null)
                                                <img src="/images/forum/{{$result->image}}" height="100px"/>
                                            @endif
                                        </a>

                                            <br>
                                            <div class="row">
                                                <div class="col-md-2 col-3">



                                                    @if(!Auth::check())
                                                        <i class="icon-thumbs-up" onclick="messageError('','Login First')"></i>
                                                    @else
                                                        <i class="icon-thumbs-up"
                                                           ng-click="upVote(<?php echo $result->topic_id?>)"></i>
                                                    @endif

                                                    {{getForumLike($result->topic_id)}}
                                                    {{--  <br>
                                                     <a href="#"> <i class=" icon-share" style=""></i></a>--}}

                                                </div>
                                                <div class="col-md-2 col-3">


                                                    <i class=" icon-eye-1"></i>
                                                    {{$result->views}}<br>
                                                    {{--  <br>
                                                     <a href="#"> <i class=" icon-share" style=""></i></a>--}}

                                                </div>

                                            </div>

                                            <a href="/forum-details/{{$result->topic_id}}/{{getTitleToUrl($result->title)}}"
                                               style="color: #5284AA;font-size: 12px">Click to comment</a>
                                            {{-- <p>{{$result->created_at}}</p>
                                             <p>{{$result->full_name}}</p>
                                             <p>{{$result->profile_pic}}</p>--}}


                                    </div>


                                </div>

                            </div>
                        </div>
                    @endforeach


                    {{$results->links()}}
                </div>

            </div>

        </div>

    </div>
    <script>

        app.controller('forumController', function ($scope, $http, $window) {

            $scope.upVote = function (id) {

                $http.post('/forum/upvote', {
                    topic_id: id,

                }).then(function mySuccess(response) {

                    console.log(response.data);

                    if (response.data.status_code == 200) {
                        $window.location.reload();
                        messageSuccess(response.data.message, "success");
                    } else {
                        messageError(response.data.message, "Error");
                    }


                }, function myError(response) {
                    // response.statusText;
                });
            };

        });


        function messageError(cantRemoveItems, error) {
            toastr.info(cantRemoveItems, error);
        }

        function messageSuccess(message, success) {
            toastr.success(message, success);
        }

    </script>



@stop
