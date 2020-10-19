<!DOCTYPE html>
<html lang="en">
<head>
    <title>Game</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body style="background: #F7C56E;">

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12 mx-auto">
            <div class="carddd" style="border: 5px solid #76471D;padding: 10px;margin-top: 10px">
                <div class="card-bodydd">

                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <a href="/" class="btn btn-success">Home</a>
                        </div>
                        <div class="col-md-6">
                            <h2 class="timer mx-auto">
                                <label class="text-center" id="minutes">00</label>:<label id="seconds">00</label>
                            </h2>
                        </div>
                    </div>
                    <center>


                    </center>
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <img src="/images/game/spot_game/1.jpg" id="img1" class="game-image img-thumbnail">
                        </div>
                        <div class="col-md-6 col-6">
                            <img src="/images/game/spot_game/11.jpg" id="img2" class="game-image img-thumbnail">
                        </div>
                    </div>


                    <center>
                        <button class="btn btn-success" id="save" onclick="goNext()"
                                style="margin-top: 10px; width: 50%;">
                            NEXT
                        </button>
                    </center>
                </div>

            </div>
        </div>

    </div>


</div>

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

    let counter2 = 1;

    function goNext() {
        counter2++;
        console.log(counter2);
        var image = document.getElementById("img2");
        image.src = "/images/game/spot_game/" + counter2 + "" + counter2 + ".jpg"
        var image = document.getElementById("img1");
        image.src = "/images/game/spot_game/" + counter2 + ".jpg";

        if (counter2 > 5) {
            alert("Game is over");
        }
    }

    $(document).ready(function () {

        $("img").on("click", function (event) {
            let is_wrong = true;
            var x = event.clientX;
            var y = event.clientY;
            var total_screen = screen.width;

            //Percentage
            /*       var x_coordinate = x * 100 / total_screen;
                   var y_coordinate = y * 100 / total_screen;*/


            console.log((1366*x)/total_screen+"jjjjjjjjjjj") ;


            if (counter2 == 1) {
                if (total_screen <= 320) {
                    x_coordinate_min = 225;
                    x_coordinate_max = 245;
                    y_coordinate_min = 130;
                    y_coordinate_max = 145;
                    //alert("Hello")
                } else if (total_screen > 320 && total_screen <= 360) {
                    x_coordinate_min = 255;
                    x_coordinate_max = 275;
                    y_coordinate_min = 132;
                    y_coordinate_max = 145;
                } else if (total_screen > 360 && total_screen <= 412) {
                    x_coordinate_min = 270;
                    x_coordinate_max = 292;
                    y_coordinate_min = 135;
                    y_coordinate_max = 152

                } else if (total_screen > 412 && total_screen <= 480) {
                    x_coordinate_min = 295;
                    x_coordinate_max = 325;
                    y_coordinate_min = 130;
                    y_coordinate_max = 155

                } else {
                    x_coordinate_min = 1080;
                    x_coordinate_max = 1203;
                    y_coordinate_min = 125;
                    y_coordinate_max = 250;
                }
            }

            if (counter2 == 2) {
                if (total_screen <= 320) {
                    x_coordinate_min = 265;
                    x_coordinate_max = 285;
                    y_coordinate_min = 150;
                    y_coordinate_max = 170;
                    //alert("Hello")
                } else if (total_screen > 320 && total_screen <= 360) {
                    x_coordinate_min = 300;
                    x_coordinate_max = 325;
                    y_coordinate_min = 160;
                    y_coordinate_max = 177;
                } else if (total_screen > 360 && total_screen <= 412) {
                    x_coordinate_min = 355;
                    x_coordinate_max = 375;
                    y_coordinate_min = 170;
                    y_coordinate_max = 190

                } else if (total_screen > 412 && total_screen <= 480) {
                    x_coordinate_min = 350;
                    x_coordinate_max = 385;
                    y_coordinate_min = 170;
                    y_coordinate_max = 200

                } else {
                    x_coordinate_min = 1300;
                    x_coordinate_max = 1470;
                    y_coordinate_min = 300;
                    y_coordinate_max = 390;
                }
            }
            if (counter2 == 3) {
                if (total_screen <= 320) {
                    x_coordinate_min = 200;
                    x_coordinate_max = 235;
                    y_coordinate_min = 160;
                    y_coordinate_max = 185;
                    //alert("Hello")
                } else if (total_screen > 320 && total_screen <= 360) {
                    x_coordinate_min = 225;
                    x_coordinate_max = 270;
                    y_coordinate_min = 170;
                    y_coordinate_max = 200;
                } else if (total_screen > 360 && total_screen <= 412) {
                    x_coordinate_min = 240;
                    x_coordinate_max = 280;
                    y_coordinate_min = 165;
                    y_coordinate_max = 205

                } else if (total_screen > 412 && total_screen <= 480) {
                    x_coordinate_min = 245;
                    x_coordinate_max = 300;
                    y_coordinate_min = 175;
                    y_coordinate_max = 210

                } else {
                    x_coordinate_min = 870;
                    x_coordinate_max = 1090;
                    y_coordinate_min = 300;
                    y_coordinate_max = 490;
                }
            }

            if (counter2 == 4) {
                if (total_screen <= 320) {
                    x_coordinate_min = 210;
                    x_coordinate_max = 250;
                    y_coordinate_min = 160;
                    y_coordinate_max = 180;
                    //alert("Hello")
                } else if (total_screen > 320 && total_screen <= 360) {
                    x_coordinate_min = 240;
                    x_coordinate_max = 280;
                    y_coordinate_min = 160;
                    y_coordinate_max = 190;
                } else if (total_screen > 360 && total_screen <= 412) {
                    x_coordinate_min = 270;
                    x_coordinate_max = 290;
                    y_coordinate_min = 175;
                    y_coordinate_max = 210

                } else if (total_screen > 412 && total_screen <= 480) {
                    x_coordinate_min = 270;
                    x_coordinate_max = 330;
                    y_coordinate_min = 165;
                    y_coordinate_max = 210

                } else {
                    x_coordinate_min = 920;
                    x_coordinate_max = 1070;
                    y_coordinate_min = 325;
                    y_coordinate_max = 400;
                }
            }


            if (counter2 == 5) {
                if (total_screen <= 320) {
                    x_coordinate_min = 300;
                    x_coordinate_max = 330;
                    y_coordinate_min = 200;
                    y_coordinate_max = 220;
                    //alert("Hello")
                } else if (total_screen > 320 && total_screen <= 360) {
                    x_coordinate_min = 260;
                    x_coordinate_max = 290;
                    y_coordinate_min = 185;
                    y_coordinate_max = 210;
                } else if (total_screen > 360 && total_screen <= 412) {
                    x_coordinate_min = 270;
                    x_coordinate_max = 290;
                    y_coordinate_min = 175;
                    y_coordinate_max = 210

                } else if (total_screen > 412 && total_screen <= 480) {
                    x_coordinate_min = 270;
                    x_coordinate_max = 330;
                    y_coordinate_min = 165;
                    y_coordinate_max = 210

                } else {
                    x_coordinate_min = 1240;
                    x_coordinate_max = 1360;
                    y_coordinate_min = 495;
                    y_coordinate_max = 540;
                }
            }

            console.log(total_screen + "---" + x + " ------" + y);


            if (x >= x_coordinate_min && x < x_coordinate_max) {

                if (y >= y_coordinate_min && y <= y_coordinate_max) {
                    //console.log(x + " OK " + y);

                    //alert("Correct Answer");
                    //document.getElementById("p1").innerHTML = "Correct";
                    is_wrong = false;
                    var audio = new Audio('/sound/right.mp3');
                    audio.play();

                    counter2++;
                    console.log(counter2);
                    var image = document.getElementById("img2");
                    image.src = "/images/game/spot_game/" + counter2 + "" + counter2 + ".jpg"
                    var image = document.getElementById("img1");
                    image.src = "/images/game/spot_game/" + counter2 + ".jpg";

                    if (counter2 > 5) {
                        alert("Game is over");
                    }
                }
            }

            if (is_wrong == true) {
                var audio = new Audio('/sound/wrong.mp3');
                //audio.play();
                console.log( " Wrong Answer ");
                // document.getElementById("p1").innerHTML = "Wrong Answer";
            }
        });
    });


</script>
</body>
</html>
