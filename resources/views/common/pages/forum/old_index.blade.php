@extends('layouts.common')

@section('title', 'Tourist Spots')



@section('content')

    <div class="container margin_60">


        <div class="forum" ng-controller="forumController">

            <div class="row">
                <h4>Discussion Forum</h4>
                <hr>

                @if(Auth::check())
                    <a href="/user/forum" class="btn btn-success">+{{__('localize.post_new_topic')}}</a>
{{--                   <button class="btn btn-success" data-toggle="modal"  data-target="#newTopic">+Post New Topic</button>--}}
                @else
                    <li><a href="/user/login" id="access_link">{{__('localize.sign_in')}}</a></li>
                    <li><a href="/user/registration"><i class="icon-phone"></i> {{__('localize.registration')}}</a></li>

                @endif
            </div>


            </div>
            <div class="row">
                <div class="row text-center" ng-repeat="list in lists" style="background-color:rgba(196,206,206,0.43)">
                    <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                        <div class="row ng-cloak ">
                            <div class="col-lg-2 col-md-2 ">
                                <div class="">
                                    <img src="/images/user/@{{ list.profile_pic }}" width="100%" class="img-round"/>
                                    <h4>@{{ list.full_name }}</h4>
                                    <p>
                                        <small><i class="fa fa-clock"></i> @{{ list.created_at }}</small>
                                    </p>


                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 mt-5">
                                <div class="tour_list_desc">
                                    <a href="/forum-details/@{{  list.topic_id }}">
                                        <h4></h4>

                                    </a>

                                    <h3><strong>@{{ list.title }}</strong> </h3>
                                    <p>@{{ list.details }}</p>

                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 mt-5">
                                <div class="card text-center rounded-circle">
                                    <div class="card-header-pills">
                                        <p>@{{ list.like }}</p>

                                    </div>
                                    <div class="card-body-pills">
                                        <a href="#"><i class="fa fa-thumbs-up" ng-click="upVote(list.topic_id)"></i></a>

                                    </div>



                                </div>
                                <div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                {{-- @foreach($results as $result)

                     <h4>{{$result->title}}</h4>
                     <p> {{$result->details}}</p>

                 @endforeach--}}
            </div>

            </div>





            <!-- The Modal -->
            <div class="modal" id="newTopic">
                <div class="modal-dialog">
                    <div class="modal-content">

                        @if(!Auth::guest())
                            <div class="modal-header">
                                <h4 class="modal-title">New Topic</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="#" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter title" name="title"
                                               ng-model="title" required>
                                    </div>
                                    <div class="form-group">
                            <textarea class="form-control" placeholder="Details" id="details"
                                      ng-model="details" required></textarea>
                                    </div>

                                    <button type="button" class="btn btn-primary" ng-click="saveTopic()" class="close"
                                            data-dismiss="modal">Save
                                    </button>
                                </form>

                            </div>
                        @else

                            <div class="modal-header">
                                <h4 class="modal-title">Login</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
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
            </div>




        <script>

            app.controller('forumController', function ($scope, $http,$window) {
                $http({
                    method: "GET",
                    url: "/forums"
                }).then(function mySuccess(response) {

                    console.log(response.data);

                    $scope.lists = response.data;

                }, function myError(response) {
                    // response.statusText;
                });


                //Save Topic
                $scope.saveTopic = function () {
                    $http.post('/forum/store', {
                        title: $scope.title,
                        details: $scope.details

                    }).then(function mySuccess(response) {

                        console.log(response.data + "Motiur");
                        messageSuccess(response.data.message, "success");

                        $scope.getForum();


                    }, function myError(response) {
                        // response.statusText;
                        console.log("ffff" + response.statusText);
                    });
                };


                $scope.getForum = function () {
                    $http({
                        method: "GET",
                        url: "/forums"
                    }).then(function mySuccess(response) {


                        $scope.lists = response.data;

                    }, function myError(response) {
                        // response.statusText;
                    });
                };

                $scope.upVote = function (id) {

                    $http.post('/forum/upvote', {
                        topic_id: id,

                    }).then(function mySuccess(response) {

                        console.log(response.data);
                        if (response.data.status_code == 200) {
                            messageSuccess(response.data.message, "success");
                        } else {
                            messageError(response.data.message, "Error");
                        }


                        $scope.getForum();

                    }, function myError(response) {
                        // response.statusText;
                    });
                }

                $scope.checkLogin = function () {

                    $http.post('/login-check', {
                        user_login: $scope.user_login,
                        password: $scope.password

                    }).then(function mySuccess(response) {

                        console.log(response.data);
                        if (response.data.status_code == 200) {
                            $window.location.reload();
                            messageSuccess(response.data.message, "success");
                        } else {
                            messageError(response.data.message, "Error");
                        }


                        $scope.getForum();

                    }, function myError(response) {
                        // response.statusText;
                    });
                }


            });


            function messageError(cantRemoveItems, error) {
                toastr.info(cantRemoveItems, error);
            }

            function messageSuccess(message, success) {
                toastr.success(message, success);
            }

        </script>


@stop
