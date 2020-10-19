@extends('layouts.common')

@section('title', 'Spot Difference')



@section('content')
    <style>
        h2 {
            line-height: 24px;
        }
    </style>
    <div class="" style="    background: #4d536d url(/images/game/gaming_background.png);
    background-repeat: no-repeat;
  background-size: 100% 650px;
    height: 650px; margin-top: 49px" ng-controller="gameController">
        <div class="row">
            <div class="col-md-3 mx-auto">
                <center>
                    <img src="/images/game/mission_finder.png" width="230px"
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
                            <h2><span id="time"></span> Sec</h2>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mx-auto col-8">
                            <h2> Score</h2>
                        </div>
                        <div class="col-md-4 mx-auto col-4">
                            <h2><span id="result"></span></h2>

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
                    <div class="row mb-5 mt-5">
                        <div class="col-md-6 col-8 mx-auto">
                            <a class="" href="/game"><img id="play"
                                                          src="/images/game/btn_clcik_to_play.png"> </a>
                        </div>
                    </div>

                    <div class="row" style=" margin-top: 50px">
                        <div class="col-md-10 "></div>
                        <div class="col-md-2 mx-auto">
                            <a href="/game/spot-the-difference/leaderdboard/1">
                                <img src="/images/game/leader.png" width="250px" height="auto;"
                                     style="padding-left: 50px">
                            </a>
                        </div>
                    </div>

                </aside>


                <div class="col-md-8 mx-auto" style="display: none">
                    <div class="card">
                        <div class="card-body">

                            <form action="#" method="post" enctype="multipart/form-data">
                                <input type="text" id="time" name="total_seconds">
                                <input type="text" id="result" name="total_right_answer">

                            </form>


                        </div>

                    </div>
                </div>

            </div>
            <!--End row -->-


        </div>
    </div>

    <script>
        app.controller('gameController', function ($scope, $http) {
            console.log(localStorage.getItem("right_count") * 5)
            $http.get("/game-score/two/" + localStorage.getItem("right_count") * 5 + "/" + localStorage.getItem("time"))
                .then(function (response) {
                    // $scope.myWelcome = response.data;
                    console.log(response.data);
                    $scope.parcels = response.data;
                    //$scope.delivery_charge=response.data.charge
                });


        });
        if (typeof (Storage) !== "undefined") {
            // Retrieve
            document.getElementById("result").innerHTML = localStorage.getItem("right_count") * 5;
            document.getElementById("time").innerHTML = localStorage.getItem("time");

        } else {
            document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
        }


    </script>
@stop
