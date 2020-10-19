@extends('layouts.common')

@section('title', 'Forum')



@section('content')

    <div class="container margin_60">
        <div class="forum" ng-controller="forumCommentController">

            <div class="row">
                <h4>{{__('localize.discussion_forum')}}</h4>
                <hr>

            </div>


            <div class="row">
                <div class="col-md-12">
                    @if(session('success'))

                        <div class="alert alert-success">{{session('success')}}!</div>

                    @endif
                    @if(session('failed'))
                        <div class="alert alert-danger">
                            {{session('failed')}}!
                        </div>
                    @endif
                    <div id="comments">
                        <ol>
                            <li>
                                <div class="avatar">

                                    @if($topic->profile_pic !=null)
                                        <img src="/images/user/{{$topic->profile_pic}}" style="width: 50px;height: 50px"
                                             alt="Image"
                                             class="rounded-circle"><br>
                                    @else
                                        <img src="/template/img/avatar1.jpg" alt="Image"
                                             style="width: 50px;height: 50px" class="rounded-circle"><br>
                                    @endif


                                </div>
                                <div class="comment_right clearfix">
                                    <div class="comment_info">
                                        Posted by <a
                                                href="#">{{$topic->full_name}}</a><span>|</span> {{dateFormat($topic->created_at)}}
                                    </div>
                                    <p class="small"
                                       style="color: #297CBB;  font-size: 15px !important;">{{$topic->title}}</p>
                                    <p style="    font-size: 13px !important;font-weight: normal !important;text-align: justify;margin-bottom: 2px; ">{{$topic->details}}</p>
                                    @if($topic->image!=null)
                                        <img src="/images/forum/{{$topic->image}}" height="100px"/>
                                    @endif

                                </div>

                                <ul style="    padding-left: 50px;">
                                    <li>

                                        @if(!Auth::check())
                                            <a class="btn btn-success btn-sm" href="/login"><i class="icon-login"></i>
                                                Login
                                                To Comment</a>
                                        @else
                                            <form action="/forum/comments/store" method="post"
                                                  enctype="multipart/form-data">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                <div class="form-group">

                        <textarea id="content" name="comments" class="form-control style_2" style="height:75px;"
                                  placeholder="comments here..." required></textarea>
                                                    <input type="hidden" name="topic_id" value="{{$id}}"/>
                                                </div>
                                                <div class="form-group">

                                                    <input class="form-control" type="file" name="image"/>
                                                </div>
                                                <div class="form-group">

                                                    <input type="submit" class="btn_1 pull-right" value="save"/>
                                                </div>
                                            </form>

                                        @endif
                                    </li>
                                    @foreach($comments as $comment)
                                        <li>

                                            <div class="avatar">


                                                @if($topic->profile_pic !=null)
                                                    <img src="/images/user/{{$topic->profile_pic}}"
                                                         style="height: 40px;width: 40px;"
                                                         alt="Image"
                                                         class="rounded-circle">
                                                @else
                                                    <img src="/template/img/avatar1.jpg"   style="height: 40px;width: 40px;"
                                                         alt="Image"
                                                         class="rounded-circle">
                                                @endif

                                            </div>
                                            @if($comment->comment_image !=null)

                                                <div class="comment_right clearfix">
                                                    <div class="comment_info">
                                                        Posted by <a
                                                                href="#">{{$comment->full_name}}</a><span>|</span> {{ dateFormat($comment->created_at) }}
                                                    </div>
                                                    <p style="    font-size: 13px !important;font-weight: normal !important;text-align: justify;margin-bottom: 2px; ">
                                                        {{$comment->comments}}
                                                    </p>
                                                    <div class="">
                                                        <img src="/images/comment/{{$comment->comment_image}}"
                                                             class="img-thumbnail" width="150px">
                                                    </div>

                                                </div>
                                            @else
                                                <div class="comment_right clearfix">
                                                    <div class="comment_info">
                                                        Posted by <a
                                                                href="#">{{$comment->full_name}}</a><span>|</span> {{ dateFormat($comment->created_at) }}
                                                    </div>
                                                    <p style="    font-size: 13px !important;font-weight: normal !important;text-align: justify;margin-bottom: 2px; ">{{$comment->comments}}</p>

                                                </div>
                                            @endif

                                        </li>
                                    @endforeach

                                </ul>


                            </li>

                        </ol>
                    </div>
                </div>

            </div>


        </div>


        <script>

            app.controller('forumCommentController', function ($scope, $http) {
                $scope.topic_id = '<?php echo $id ?>';
                //console.log($scope.topic_id);

                $http({
                    method: "GET",
                    url: "/forum/comment/" + $scope.topic_id
                }).then(function mySuccess(response) {

                    //console.log($scope.topic_id);
                    //console.log(response.data);

                    $scope.comment_list = response.data;

                }, function myError(response) {
                    // response.statusText;
                });


                //Save Topic
                $scope.saveComment = function () {

                    $http.post('/forum/comments/store', {
                        comments: $scope.comments,
                        topic_id: $scope.topic_id

                    }).then(function mySuccess(response) {

                        $scope.comments = null;


                        if (response.data.status_code == 200) {
                            messageSuccess(response.data.message, "success");
                        } else {
                            messageError(response.data.message, "Error");
                        }
                        $scope.getComments();


                    }, function myError(response) {
                        // response.statusText;
                        console.log("ffff" + response.statusText);
                    });
                };

                $scope.getComments = function () {
                    $http({
                        method: "GET",
                        url: "/forum/comment/" + $scope.topic_id
                    }).then(function mySuccess(response) {

                        // console.log($scope.topic_id);
                        //console.log(response.data);

                        $scope.comment_list = response.data;

                    }, function myError(response) {
                        // response.statusText;
                    });
                };


                $scope.commentDelete = function (comment_id) {

                    $http.post('/forum/comments/delete', {
                        comment_id: comment_id

                    }).then(function mySuccess(response) {

                        console.log(response.data);
                        if (response.data.status_code == 200) {
                            messageSuccess(response.data.message, "success");
                        } else {
                            messageError(response.data.message, "Error");
                        }

                        $scope.getComments();


                    }, function myError(response) {
                        // response.statusText;
                        console.log("ffff" + response.statusText);
                    });
                };


            });


            function messageError(cantRemoveItems, error) {
                //toastr.info(cantRemoveItems, error);
            }

            function messageSuccess(message, success) {
                //toastr.success(message, success);
            }

        </script>


    </div>

@stop
