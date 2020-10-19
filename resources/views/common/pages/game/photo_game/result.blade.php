@extends('layouts.common')

@section('title', 'Photo Game')



@section('content')

    <style>
        h2 {
            line-height: 24px;
        }
    </style>
    <div id="margin" class="" style="    background: #4d536d url(/images/game/gaming_background.png);
    background-repeat: no-repeat;
  background-size: 100% 650px;
    height: 650px; ">
        <div class="row">
            <div class="col-md-3 mx-auto">
                <center>
                    <img src="/images/game/travel_master_page.png" width="230px"
                         style="padding-top: 35px;margin-bottom: -40px">
                </center>
            </div>
        </div>

        <div class="container margin_60" ng-controller="gameController">


            <div class="row">

                <aside class="col-lg-8 mx-auto" id="aside"
                       style="background-color: #E3E9DD; border-radius: 122px 122px 222px 222px;">
                    @if(session('success'))

                        <div class="alert alert-success">{{session('success')}}!</div>

                    @endif
                    @if(session('failed'))
                        <div class="alert alert-danger">
                            {{session('failed')}}!
                        </div>
                    @endif


                    <div class="row">
                        <div class="col-md-3 mx-auto col-6 mt-2">
                            <img src="/images/game/btn.png" width="100px">


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mx-auto col-8">
                            <h2>Name</h2>
                        </div>
                        <div class="col-md-4 mx-auto col-4">
                            <h2>{{Auth::user()->full_name}}</h2>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mx-auto col-8">
                            <h2>Time</h2>
                        </div>
                        <div class="col-md-4 mx-auto col-4">
                            <h2><span id="total_secondss"></span> Sec</h2>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mx-auto col-8">
                            <h2> Score</h2>
                        </div>
                        <div class="col-md-4 mx-auto col-4">
                            <h2><span id="total_right_answers"></span></h2>

                        </div>
                    </div>
                    {{-- <div class="row">
                         <div class="col-md-4 mx-auto col-8">
                            <h2>Highest Score</h2>
                         </div>
                         <div class="col-md-4 mx-auto col-4">
                           <h2>{{getHighestScore(1)}}</h2>

                         </div>
                     </div>--}}
                    {{--<table class="table table_summary">
                        <tbody>
                        <tr class="total">
                            <td>
                                Name
                            </td>
                            <td class="text-right">
                                {{Auth::user()->full_name}}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Time
                            </td>
                            <td class="text-right">
                                <span id="total_secondss"></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Right Answer
                            </td>
                            <td class="text-right">
                                <span id="total_right_answers"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Wrong Answer
                            </td>
                            <td class="text-right">
                                <span id="total_wrong_answers"></span>
                            </td>
                        </tr>

                        </tbody>
                    </table>--}}
                    <div class="row mb-5  mt-5">
                        <div class="col-md-6 col-8 mx-auto">
                            <a class="" href="/game"><img id="play" src="/images/game/btn_clcik_to_play.png"> </a>
                        </div>
                    </div>



                </aside>


                <div class="col-md-8 mx-auto" style="display: none">
                    <div class="card">
                        <div class="card-body">

                            <form action="#" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="total_seconds" name="total_seconds">
                                <input type="hidden" id="total_right_answer" name="total_right_answer">
                                <input type="hidden" id="total_wrong_answer" name="total_wrong_answer">
                            </form>


                        </div>

                    </div>
                </div>

            </div>
            <!--End row -->-
            <div class="row" >
                <div class="col-md-2 col-12">
                    <a href="/game/image-select/leaderdboard/1">
                        <img src="/images/game/leader.png" width="250px" height="auto;" >
                    </a>
                </div>
            </div>


        </div>


        <script>

            document.getElementById("total_seconds").value = sessionStorage.getItem("total_seconds");
            document.getElementById("total_secondss").textContent = sessionStorage.getItem("total_seconds");
            document.getElementById("total_right_answer").value = sessionStorage.getItem("total_right_answer");
            document.getElementById("total_right_answers").textContent = sessionStorage.getItem("total_right_answer") - sessionStorage.getItem("total_wrong_answer");
            document.getElementById("total_wrong_answer").value = sessionStorage.getItem("total_wrong_answer");
            document.getElementById("total_wrong_answers").textContent = sessionStorage.getItem("total_wrong_answer");
        </script>


        <script>
            var markersData = [];
            app.controller('gameController', function ($scope, $http) {

                $scope.gettingSpots = function () {
                    console.log("start");

                    $http.post('/game/image-select/result/save', {
                        total_seconds: sessionStorage.getItem("total_seconds"),
                        total_right_answer: sessionStorage.getItem("total_right_answer"),
                        total_wrong_answer: sessionStorage.getItem("total_wrong_answer"),
                        game_id: 1,

                    }).then(function mySuccess(response) {

                        console.log(response.data);

                    }, function myError(response) {
                        // response.statusText;
                    });
                };

                $scope.gettingSpots(1);

            });

        </script>
@stop
