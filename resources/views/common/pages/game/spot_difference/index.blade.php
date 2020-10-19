@extends('layouts.common')

@section('title', 'Photo Game')



@section('content')
    <style>
        .game-image {
            height: 300px;
            width: 500px;
        }

        @media (max-width: 480px) {
            .game-image {
                height: 120px;
                width: 200px;
            }
        }
    </style>

    <div class="container margin_60">
        @if(session('success'))

            <div class="alert alert-success">{{session('success')}}!</div>

        @endif
        @if(session('failed'))
            <div class="alert alert-danger">
                {{session('failed')}}!
            </div>
        @endif

        <div class="main_title">
            <h2 class="timer mx-auto">
                <label id="minutes">00</label>:<label id="seconds">00</label>
            </h2>
            {{-- <h4 id="p1" class="text-danger"></h4>
             <hr>--}}

        </div>

        <div class="row">

            <div class="col-md-12 mx-auto">
                <div class="carddd">
                    <div class="card-bodydd">

                        <div class="row">
                            <div class="col-md-6 col-6">
                                <img src="/images/game/spot_game/1.jpg" class="game-image img-thumbnail">
                            </div>
                            <div class="col-md-6 col-6">
                                <img src="/images/game/spot_game/11.jpg" class="game-image img-thumbnail">
                            </div>


                        </div>


                        <button class="btn btn-success btn-block" id="save" onclick="goNext()" style="margin-top: 10px">
                            NEXT
                        </button>
                    </div>

                </div>
            </div>


        </div>
        <!--End row -->-


    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>

        var minutesLabel = document.getElementById("minutes");
        var secondsLabel = document.getElementById("seconds");
        var totalSeconds = 0;
        setInterval(setTime, 1000);

        function setTime() {
            ++totalSeconds;
            secondsLabel.innerHTML = pad(totalSeconds % 60);
            minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
        }

        function pad(val) {
            var valString = val + "";
            if (valString.length < 2) {
                return "0" + valString;
            } else {
                return valString;
            }
        }

        //Game Logic
        let right_answer = 0;
        let wrong_answer = 0;
        let counter = 0;

    </script>


    <script>


        //console.log(window.screen.width + "--");
        //console.log(window.window.screen.height + "Height");
        //let total_screen=

        let wrong_count = 0;

        let image = 1;

        $(document).ready(function () {
            let is_wrong = true;
            $("img").on("click", function (event) {

                var x = event.clientX;
                var y = event.clientY;
                var total_screen = screen.width;

                //Percentage
                /*       var x_coordinate = x * 100 / total_screen;
                       var y_coordinate = y * 100 / total_screen;*/

                if (image == 1) {
                    x_coordinate_min = 945;
                    x_coordinate_max = 1014;
                    y_coordinate_min = 145;
                    y_coordinate_max = 247;

                    if (total_screen <= 360) {
                        x_coordinate_min = 260;
                        x_coordinate_max = 285;
                        y_coordinate_min = 135;
                        y_coordinate_max = 160;
                        //alert("Hello")
                    }
                    if (total_screen < 480 && total_screen > 360) {
                        x_coordinate_min = 303;
                        x_coordinate_max = 327;
                        y_coordinate_min = 135;
                        y_coordinate_max = 155
                        //alert("Yes")
                    }
                }


                console.log(total_screen + "---" + x + " ------" + y);


                if (x >= x_coordinate_min && x < x_coordinate_max) {

                    if (y >= y_coordinate_min && y <= y_coordinate_max) {
                        //console.log(x + " OK " + y);

                        alert("Correct Answer");
                        document.getElementById("p1").innerHTML = "Correct";
                        is_wrong = false;
                        var audio = new Audio('/sound/right.mp3');
                        audio.play();
                    }
                }

                if (is_wrong == true) {
                    var audio = new Audio('/sound/wrong.mp3');
                    audio.play();
                    // console.log(x_coordinate + " Wrong Answer " + y_coordinate);
                    // document.getElementById("p1").innerHTML = "Wrong Answer";
                }
            });
        });
    </script>

@stop
