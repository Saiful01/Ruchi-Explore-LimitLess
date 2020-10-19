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

        <div class="col-md-12 mx-auto" style="margin: 0px;;">
            <div class="carddd" style="border: 5px solid #76471D;margin-top: 10px">
                <div class="card-bodydd">

                    <div class="row">
                        <div class="col-md-6 pull-left">
                            <a href="/" class="btn btn-success" style="margin-left: 5px;margin-top: 5px">Home</a>
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
                        <div class="col-md-6 col-6" style="padding-right: 2px">
                            <img src="/images/game/spot_game/1.jpg" id="img1" class="game-image img-thumbnail"
                                 style="height: 100%; width: 100%;">
                        </div>
                        <div class="col-md-6 col-6" style="padding-left: 2px">
                            <img src="/images/game/spot_game/11.jpg" id="img2" class="game-image img-thumbnail"
                                 style="height: 100%; width: 100%;">
                        </div>
                    </div>


                    <center>
                        <button class="btn btn-success" id="save" onclick="goNext()"
                                style="margin-top: 10px; width: 50%;margin-bottom: 10px">
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

        localStorage.setItem("time", totalSeconds);
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
    //let total_screen_width=

    let wrong_count = 0;


    let right_count = 0;
    let counter2 = 1;

    function goNext() {
        counter2++;
        console.log(counter2);
        var image = document.getElementById("img2");
        image.src = "/images/game/spot_game/" + counter2 + "" + counter2 + ".jpg"
        var image = document.getElementById("img1");
        image.src = "/images/game/spot_game/" + counter2 + ".jpg";
        localStorage.setItem("right_count", right_count);
        /*if (counter2 > 5) {
            alert("Game is over");
        }*/
    }

    $(document).ready(function () {

        console.log(counter2 + "Random")
        $("img").on("click", function (event) {
            let is_wrong = true;
            var x = event.clientX;
            var y = event.clientY;
            var total_screen_width = screen.width;
            var total_screen_height = screen.height;

            x = (1366 * x) / total_screen_width;
            y = (768 * y) / total_screen_height;
            console.log(total_screen_height + "----" + total_screen_width + "---" + x + " ------" + y + "--" + counter2);

            if (counter2 === 1) {
                let value = false;
                x_coordinate_min = 990;
                x_coordinate_max = 1075;
                y_coordinate_min = 140;
                y_coordinate_max = 220;
                value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                if (value === true) {
                    makeItRightAns(counter2++);

                } else {
                    console.log("lolll")
                    x_coordinate_min = 850;
                    x_coordinate_max = 970;
                    y_coordinate_min = 300;
                    y_coordinate_max = 365;
                    value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                    if (value === true) {
                        makeItRightAns(counter2++);
                    } else {
                        x_coordinate_min = 800;
                        x_coordinate_max = 1070;
                        y_coordinate_min = 158;
                        y_coordinate_max = 230;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                        if (value === true) {
                            makeItRightAns(counter2++);
                        } else {

                            makeItWrongAns(counter2);
                        }
                    }
                }

            } else if (counter2 === 2) {

                x_coordinate_min = 1235;
                x_coordinate_max = 1370;
                y_coordinate_min = 280;
                y_coordinate_max = 355;
                value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                if (value === true) {
                    makeItRightAns(counter2++);

                } else {
                    x_coordinate_min = 875;
                    x_coordinate_max = 945;
                    y_coordinate_min = 120;
                    y_coordinate_max = 175;
                    value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                    if (value == true) {
                        makeItRightAns(counter2++);
                    } else {
                        x_coordinate_min = 1180;
                        x_coordinate_max = 1270;
                        y_coordinate_min = 190;
                        y_coordinate_max = 225;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                        if (value == true) {
                            makeItRightAns(counter2++);
                        } else {

                            makeItWrongAns(counter2);
                        }
                    }
                }

            } else if (counter2 === 3) {

                console.log("jjjj")
                x_coordinate_min = 880;
                x_coordinate_max = 950;
                y_coordinate_min = 335;
                y_coordinate_max = 395;
                value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                if (value === true) {
                    makeItRightAns(counter2++);

                } else {
                    x_coordinate_min = 860;
                    x_coordinate_max = 905;
                    y_coordinate_min = 270;
                    y_coordinate_max = 300;
                    value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                    if (value == true) {
                        makeItRightAns(counter2++);
                    } else {
                        x_coordinate_min = 830;
                        x_coordinate_max = 985;
                        y_coordinate_min = 200;
                        y_coordinate_max = 230;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                        if (value == true) {
                            makeItRightAns(counter2++);
                        } else {

                            makeItWrongAns(counter2);
                        }
                    }
                }

            } else if (counter2 === 4) {

                console.log("jjjj")
                x_coordinate_min = 825;
                x_coordinate_max = 1060;
                y_coordinate_min = 320;
                y_coordinate_max = 395;
                value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                if (value === true) {
                    makeItRightAns(counter2++);

                } else {
                    x_coordinate_min = 675;
                    x_coordinate_max = 795;
                    y_coordinate_min = 490;
                    y_coordinate_max = 560;
                    value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                    if (value == true) {
                        makeItRightAns(counter2++);
                    } else {
                        x_coordinate_min = 680;
                        x_coordinate_max = 835;
                        y_coordinate_min = 250;
                        y_coordinate_max = 270;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                        if (value == true) {
                            makeItRightAns(counter2++);
                        } else {

                            makeItWrongAns(counter2);
                        }
                    }
                }

            } else if (counter2 === 5) {

                console.log("jjjj")
                x_coordinate_min = 1100;
                x_coordinate_max = 1200;
                y_coordinate_min = 250;
                y_coordinate_max = 360;
                value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                if (value === true) {
                    makeItRightAns(counter2++);

                } else {
                    x_coordinate_min = 1090;
                    x_coordinate_max = 1160;
                    y_coordinate_min = 75;
                    y_coordinate_max = 115;
                    value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                    if (value == true) {
                        makeItRightAns(counter2++);
                    } else {
                        x_coordinate_min = 1000;
                        x_coordinate_max = 1140;
                        y_coordinate_min = 185;
                        y_coordinate_max = 230;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                        if (value == true) {
                            makeItRightAns(counter2++);
                        } else {

                            makeItWrongAns(counter2);
                        }
                    }
                }

            } else if (counter2 === 6) {

                console.log("jjjj")
                x_coordinate_min = 810;
                x_coordinate_max = 900;
                y_coordinate_min = 215;
                y_coordinate_max = 260;
                value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                if (value === true) {
                    makeItRightAns(counter2++);

                } else {
                    x_coordinate_min = 970;
                    x_coordinate_max = 1070;
                    y_coordinate_min = 220;
                    y_coordinate_max = 265;
                    value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                    if (value == true) {
                        makeItRightAns(counter2++);
                    } else {
                        x_coordinate_min = 950;
                        x_coordinate_max = 1045;
                        y_coordinate_min = 160;
                        y_coordinate_max = 190;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                        if (value == true) {
                            makeItRightAns(counter2++);
                        } else {

                            makeItWrongAns(counter2);
                        }
                    }
                }

            } else if (counter2 === 7) {

                console.log("7")
                x_coordinate_min = 670;
                x_coordinate_max = 800;
                y_coordinate_min = 400;
                y_coordinate_max = 510;
                value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                if (value === true) {
                    makeItRightAns(counter2++);

                } else {
                    x_coordinate_min = 780;
                    x_coordinate_max = 880;
                    y_coordinate_min = 260;
                    y_coordinate_max = 290;
                    value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                    if (value == true) {
                        makeItRightAns(counter2++);
                    } else {
                        x_coordinate_min = 680;
                        x_coordinate_max = 840;
                        y_coordinate_min = 210;
                        y_coordinate_max = 260;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                        if (value == true) {
                            makeItRightAns(counter2++);
                        } else {

                            makeItWrongAns(counter2);
                        }
                    }
                }

            } else if (counter2 === 8) {

                console.log("8")
                x_coordinate_min = 840;
                x_coordinate_max = 940;
                y_coordinate_min = 316;
                y_coordinate_max = 360;
                value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                if (value === true) {
                    makeItRightAns(counter2++);

                } else {
                    x_coordinate_min = 770;
                    x_coordinate_max = 950;
                    y_coordinate_min = 190;
                    y_coordinate_max = 230;
                    value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                    if (value == true) {
                        makeItRightAns(counter2++);
                    } else {
                        x_coordinate_min = 815;
                        x_coordinate_max = 930;
                        y_coordinate_min = 175;
                        y_coordinate_max = 210;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                        if (value == true) {
                            makeItRightAns(counter2++);
                        } else {

                            makeItWrongAns(counter2);
                        }
                    }
                }

            } else if (counter2 === 9) {

                console.log("9")
                x_coordinate_min = 840;
                x_coordinate_max = 948;
                y_coordinate_min = 270;
                y_coordinate_max = 370;
                value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                if (value === true) {
                    makeItRightAns(counter2++);

                } else {
                    x_coordinate_min = 800;
                    x_coordinate_max = 970;
                    y_coordinate_min = 185;
                    y_coordinate_max = 230;
                    value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                    if (value == true) {
                        makeItRightAns(counter2++);
                    } else {
                        x_coordinate_min = 800;
                        x_coordinate_max = 960;
                        y_coordinate_min = 165;
                        y_coordinate_max = 210;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                        if (value == true) {
                            makeItRightAns(counter2++);
                        } else {

                            makeItWrongAns(counter2);
                        }
                    }
                }

            } else if (counter2 === 10) {

                console.log("10")
                x_coordinate_min = 1050;
                x_coordinate_max = 1150;
                y_coordinate_min = 160;
                y_coordinate_max = 225;
                value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                if (value === true) {
                    makeItRightAns(counter2++);

                } else {
                    x_coordinate_min = 940;
                    x_coordinate_max = 1120;
                    y_coordinate_min = 160;
                    y_coordinate_max = 205;
                    value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                    if (value == true) {
                        makeItRightAns(counter2++);
                    } else {
                        x_coordinate_min = 950;
                        x_coordinate_max = 1175;
                        y_coordinate_min = 140;
                        y_coordinate_max = 180;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);

                        if (value == true) {
                            makeItRightAns(counter2++);
                        } else {

                            makeItWrongAns(counter2);
                        }
                    }
                }

            }


            function checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max) {
                if (x >= x_coordinate_min && x < x_coordinate_max) {

                    if (y >= y_coordinate_min && y <= y_coordinate_max) {
                        return true;
                    }
                }
                /* if (is_wrong == true) {
                     return false;
                 }*/
            }


            function makeItRightAns(counter) {

                var audio = new Audio('/sound/right.mp3');
                audio.play();

                right_count++;

                console.log(counter + " Right Ans: " + right_count + " Wrong Count" + wrong_count);
                var image = document.getElementById("img2");
                image.src = "/images/game/spot_game/" + counter2 + "" + counter2 + ".jpg"
                var image = document.getElementById("img1");
                image.src = "/images/game/spot_game/" + counter2 + ".jpg";

                //alert("Right Answer")
                if (counter2 > 5) {
                    alert("Game is over");

                    localStorage.setItem("right_count", right_count);
                    localStorage.setItem("time", totalSeconds);

                    window.location.href = "/game/stp/result";
                }
            }

            function makeItWrongAns(counter) {

                var audio = new Audio('/sound/wrong.mp3');
                audio.play();

                wrong_count++;
                alert("Wrong Answer")
                console.log(counter + " Right Ans: " + right_count + " Wrong Count" + wrong_count);
                if (counter2 > 5) {
                    alert("Game is over");
                    localStorage.setItem("right_count", right_count);
                    localStorage.setItem("time", totalSeconds);

                    window.location.href = "/game/stp/result";
                }
                /* var image = document.getElementById("img2");
                 image.src = "/images/game/spot_game/" + counter2 + "" + counter2 + ".jpg"
                 var image = document.getElementById("img1");
                 image.src = "/images/game/spot_game/" + counter2 + ".jpg";
                 */


            }
        });
    });


</script>
</body>
</html>
