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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.min.css">

    <style>
        .notifyjs-bootstrap-success {
            color: #ffffff !important;
            background-color: rgba(0, 0, 0, 0.5) !important;
            border-color: rgba(0, 0, 0, 0.13);
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAutJREFUeNq0lctPE0Ecx38zu/RFS1EryqtgJFA08YCiMZIAQQ4eRG8eDGdPJiYeTIwHTfwPiAcvXIwXLwoXPaDxkWgQ6islKlJLSQWLUraPLTv7Gme32zoF9KSTfLO7v53vZ3d/M7/fIth+IO6INt2jjoA7bjHCJoAlzCRw59YwHYjBnfMPqAKWQYKjGkfCJqAF0xwZjipQtA3MxeSG87VhOOYegVrUCy7UZM9S6TLIdAamySTclZdYhFhRHloGYg7mgZv1Zzztvgud7V1tbQ2twYA34LJmF4p5dXF1KTufnE+SxeJtuCZNsLDCQU0+RyKTF27Unw101l8e6hns3u0PBalORVVVkcaEKBJDgV3+cGM4tKKmI+ohlIGnygKX00rSBfszz/n2uXv81wd6+rt1orsZCHRdr1Imk2F2Kob3hutSxW8thsd8AXNaln9D7CTfA6O+0UgkMuwVvEFFUbbAcrkcTA8+AtOk8E6KiQiDmMFSDqZItAzEVQviRkdDdaFgPp8HSZKAEAL5Qh7Sq2lIJBJwv2scUqkUnKoZgNhcDKhKg5aH+1IkcouCAdFGAQsuWZYhOjwFHQ96oagWgRoUov1T9kRBEODAwxM2QtEUl+Wp+Ln9VRo6BcMw4ErHRYjH4/B26AlQoQQTRdHWwcd9AH57+UAXddvDD37DmrBBV34WfqiXPl61g+vr6xA9zsGeM9gOdsNXkgpEtTwVvwOklXLKm6+/p5ezwk4B+j6droBs2CsGa/gNs6RIxazl4Tc25mpTgw/apPR1LYlNRFAzgsOxkyXYLIM1V8NMwyAkJSctD1eGVKiq5wWjSPdjmeTkiKvVW4f2YPHWl3GAVq6ymcyCTgovM3FzyRiDe2TaKcEKsLpJvNHjZgPNqEtyi6mZIm4SRFyLMUsONSSdkPeFtY1n0mczoY3BHTLhwPRy9/lzcziCw9ACI+yql0VLzcGAZbYSM5CCSZg1/9oc/nn7+i8N9p/8An4JMADxhH+xHfuiKwAAAABJRU5ErkJggg==);
        }

        .btn-success {
            color: #fff;
            background-color: #DF7A24;
            border-color: #DF7A24;
        }

        .btn-success:hover {
            color: #fff;
            background-color: #f36b20;
            border-color: #DF7A24;
        }

    </style>
</head>
<body style="background: #F7C56E; height: 100vh">

<div class="container-fluid">

    <style>

        .halfwidth {
            width: 100%;
            height: 50vw;
            background-color: #e0e0e0;
        }

        /*  .halfheight {
              height: 100%;
              height: 50vw;
              background-color: #e0e0e0;
          }*/


    </style>
    <div class="row">

        <div class="col-md-12 mx-auto" style="margin: 0px;;">
            <div class="carddd" style="border: 5px solid #76471D;margin-top: 10px">
                <div class="card-bodydd">

                    <div class="row">
                        <div class="col-md-6 col-3 pull-left">
                            <a href="/" class="btn btn-success" style="margin-left: 5px;margin-top: 5px">Home</a>
                        </div>
                        <div class="col-md-6 col-9">
                            <h2 class="timer">
                                <label class="text-center" id="minutes">00</label>:<label id="seconds">00</label> <span class="text-white text-sm" style="font-size: 13px">Click on right side image</span>
                            </h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12 order-md-1 order-2">
                            <img src="/images/game/spot_game/1.jpg" id="img1"
                                 class="game-image img-thumbnail halfheight"
                                 style="height: 100%; width: 100%;">
                        </div>
                        <div class="col-md-6 col-12 order-md-2 order-1">
                            <img src="/images/game/spot_game/11.jpg" id="img2"
                                 class="game-image img-thumbnail halfheight"
                                 style="height: 100%; width: 100%;">
                        </div>
                    </div>


                    <center>
                        <button class="button btn btn-success " id="save" onclick="goNext()"
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
    let click_counter = 1;
    let motiur = 0;

    function goNext() {
        counter2;
        click_counter++;
        console.log(counter2);
        var image = document.getElementById("img2");
        image.src = "/images/game/spot_game/" + counter2 + "" + counter2 + ".jpg"
        var image = document.getElementById("img1");
        image.src = "/images/game/spot_game/" + counter2 + ".jpg";
        localStorage.setItem("right_count", right_count);
        /*  if (counter2 > 8) {
              alert("Game is over");
          }*/

        if (counter2 == 11) {
            counter2;
            return;
        }
    }

    $(document).ready(function () {

        $.notify("অসঙ্গতি খুঁজে বের করুন।\n খুঁজে পেলে ডানপাশের \n অসঙ্গতির উপরে ক্লিক করুন।", "success");

        counter2 = Math.floor(Math.random() * 9) + 1;
        //counter2 = 10;

        console.log(counter2 + "Gnerateing Number")
        var image = document.getElementById("img2");
        image.src = "/images/game/spot_game/" + counter2 + "" + counter2 + ".jpg"
        var image = document.getElementById("img1");
        image.src = "/images/game/spot_game/" + counter2 + ".jpg";


        $("img").on("click", function (event) {

                let is_wrong = true;
                var x = event.clientX;
                var y = event.clientY;
                var total_screen_width = screen.width;
                var total_screen_height = screen.height;

                x = (1366 * x) / total_screen_width;
                y = (768 * y) / total_screen_height;
                console.log(total_screen_width + "-" + x + " -" + y + "-" + counter2);


                if (counter2 === 1) {
                    if (total_screen_width >= 1366) {
                        x_coordinate_min = 1030;
                        x_coordinate_max = 1325;
                        y_coordinate_min = 315;
                        y_coordinate_max = 470;
                        //alert("Hello")
                    } else {
                        x_coordinate_min = 880;
                        x_coordinate_max = 1250;
                        y_coordinate_min = 150;
                        y_coordinate_max = 320;
                    }
                    value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                    if (value === true) {
                        makeItRightAns(counter2);
                        console.log("Right 1");

                    } else {
                        makeItWrongAns(counter2);
                        console.log("Wrong 1");
                    }
                }
                else if (counter2 === 2) {
                    let is_wrong = true;
                    if (total_screen_width >= 1366) {
                        x_coordinate_min = 915;
                        x_coordinate_max = 1200;
                        y_coordinate_min = 280;
                        y_coordinate_max = 375;

                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 2");
                        } else {
                            //
                            x_coordinate_min = 730;
                            x_coordinate_max = 840;
                            y_coordinate_min = 360;
                            y_coordinate_max = 430;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 2");
                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong 2");
                            }
                        }
                    } else {

                        x_coordinate_min = 460;
                        x_coordinate_max = 1000;
                        y_coordinate_min = 190;
                        y_coordinate_max = 300;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 2");

                        } else {
                            //
                            x_coordinate_min = 85;
                            x_coordinate_max = 370;
                            y_coordinate_min = 240;
                            y_coordinate_max = 320;
                            console.log("Mobile");
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 2");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong  2");
                            }


                        }

                    }

                }

                else if (counter2 === 3) {
                    let is_wrong = true;
                    if (total_screen_width >= 1366) {
                        x_coordinate_min = 820;
                        x_coordinate_max = 1210;
                        y_coordinate_min = 240;
                        y_coordinate_max = 400;
                        //alert("Hello")
                    } else {
                        x_coordinate_min = 300;
                        x_coordinate_max = 850;
                        y_coordinate_min = 160;
                        y_coordinate_max = 300;
                    }
                    value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                    if (value === true) {
                        makeItRightAns(counter2);
                        console.log("Right 3");

                    } else {
                        makeItWrongAns(counter2);
                        console.log("Wrong  3");
                    }

                }
                else if (counter2 === 4) {

                    if (total_screen_width >= 1366) {
                        x_coordinate_min = 915;
                        x_coordinate_max = 1310;
                        y_coordinate_min = 280;
                        y_coordinate_max = 500;

                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 4");

                        } else {
                            //
                            x_coordinate_min = 730;
                            x_coordinate_max = 950;
                            y_coordinate_min = 320;
                            y_coordinate_max = 500;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 4");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }
                        }

                    } else if (total_screen_width > 320 && total_screen_width <= 500) {

                        x_coordinate_min = 875;
                        x_coordinate_max = 1230;
                        y_coordinate_min = 180;
                        y_coordinate_max = 350;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 4");

                        } else {
                            x_coordinate_min = 100;
                            x_coordinate_max = 550;
                            y_coordinate_min = 230;
                            y_coordinate_max = 550;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 4");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }
                        }
                    } else {

                        x_coordinate_min = 460;
                        x_coordinate_max = 1000;
                        y_coordinate_min = 220;
                        y_coordinate_max = 300;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 4");

                        } else {
                            //
                            x_coordinate_min = 85;
                            x_coordinate_max = 370;
                            y_coordinate_min = 240;
                            y_coordinate_max = 320;
                            console.log("Mobile");
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 4");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong 4");
                            }


                        }

                    }

                }

                else if (counter2 === 5) {

                    if (total_screen_width >= 1366) {
                        x_coordinate_min = 1050;
                        x_coordinate_max = 1300;
                        y_coordinate_min = 345;
                        y_coordinate_max = 500;

                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 4");

                        } else {
                            //
                            x_coordinate_min = 890;
                            x_coordinate_max = 1300;
                            y_coordinate_min = 175;
                            y_coordinate_max = 510;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 4");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }
                        }

                    } else if (total_screen_width > 320 && total_screen_width <= 500) {

                        x_coordinate_min = 770;
                        x_coordinate_max = 1200;
                        y_coordinate_min = 195;
                        y_coordinate_max = 350;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 4");

                        } else {
                            x_coordinate_min = 450;
                            x_coordinate_max = 800;
                            y_coordinate_min = 145;
                            y_coordinate_max = 350;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 4");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }

                        }

                    } else {

                        x_coordinate_min = 440;
                        x_coordinate_max = 855;
                        y_coordinate_min = 130;
                        y_coordinate_max = 540;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 4");

                        } else {
                            //
                            x_coordinate_min = 725;
                            x_coordinate_max = 1180;
                            y_coordinate_min = 365;
                            y_coordinate_max = 675;
                            console.log("Mobile");
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 4");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong 4");
                            }


                        }

                    }

                }
                else if (counter2 === 6) {

                    if (total_screen_width >= 1366) {
                        x_coordinate_min = 1000;
                        x_coordinate_max = 1200;
                        y_coordinate_min = 200;
                        y_coordinate_max = 320;

                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 6");

                        } else {
                            //
                            x_coordinate_min = 1145;
                            x_coordinate_max = 1300;
                            y_coordinate_min = 225;
                            y_coordinate_max = 500;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 6");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }
                        }


                    } else if (total_screen_width > 320 && total_screen_width <= 500) {

                        x_coordinate_min = 720;
                        x_coordinate_max = 1200;
                        y_coordinate_min = 150;
                        y_coordinate_max = 330;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 6");

                        } else {
                            makeItWrongAns(counter2);
                            console.log("Wrong");
                        }

                    } else {

                        x_coordinate_min = 710;
                        x_coordinate_max = 1020;
                        y_coordinate_min = 300;
                        y_coordinate_max = 425;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 6");

                        } else {
                            //
                            x_coordinate_min = 800;
                            x_coordinate_max = 1005;
                            y_coordinate_min = 395;
                            y_coordinate_max = 525;
                            console.log("Mobile");
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 6");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong 6");
                            }


                        }

                    }

                }

                else if (counter2 === 7) {

                    if (total_screen_width >= 1366) {
                        x_coordinate_min = 975;
                        x_coordinate_max = 1095;
                        y_coordinate_min = 135;
                        y_coordinate_max = 255;

                        console.log(x_coordinate_min + "--" + x_coordinate_max + "--" + y_coordinate_min + "--" + y_coordinate_max);
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 7");

                        } else {
                            //
                            x_coordinate_min = 975;
                            x_coordinate_max = 1220;
                            y_coordinate_min = 250;
                            y_coordinate_max = 410;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 7");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }
                        }

                    } else if (total_screen_width > 320 && total_screen_width <= 500) {

                        x_coordinate_min = 730;
                        x_coordinate_max = 1000;
                        y_coordinate_min = 250;
                        y_coordinate_max = 410;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 7");

                        } else {
                            //makeItWrongAns(counter2);
                            x_coordinate_min = 600;
                            x_coordinate_max = 1000;
                            y_coordinate_min = 115;
                            y_coordinate_max = 550;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 7");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }
                        }

                    } else {

                        x_coordinate_min = 630;
                        x_coordinate_max = 855;
                        y_coordinate_min = 170;
                        y_coordinate_max = 435;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 7");

                        } else {
                            //
                            x_coordinate_min = 630;
                            x_coordinate_max = 855;
                            y_coordinate_min = 170;
                            y_coordinate_max = 435;
                            console.log("Mobile");
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 7");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong 7");
                            }


                        }

                    }

                }
                else if (counter2 === 8) {

                    if (total_screen_width >= 1366) {
                        x_coordinate_min = 705;
                        x_coordinate_max = 920;
                        y_coordinate_min = 105;
                        y_coordinate_max = 410;

                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 8");

                        } else {
                            //
                            x_coordinate_min = 950;
                            x_coordinate_max = 1200;
                            y_coordinate_min = 215;
                            y_coordinate_max = 520;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 8");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }
                        }

                    } else if (total_screen_width > 320 && total_screen_width <= 500) {
                        x_coordinate_min = 230;
                        x_coordinate_max = 490;
                        y_coordinate_min = 180;
                        y_coordinate_max = 275;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 8");

                        } else {
                            x_coordinate_min = 570;
                            x_coordinate_max = 900;
                            y_coordinate_min = 220;
                            y_coordinate_max = 331;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 8");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }
                        }

                    } else {

                        x_coordinate_min = 245;
                        x_coordinate_max = 425;
                        y_coordinate_min = 190;
                        y_coordinate_max = 485;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 8");

                        } else {
                            //
                            x_coordinate_min = 660;
                            x_coordinate_max = 810;
                            y_coordinate_min = 150;
                            y_coordinate_max = 405;
                            console.log("Mobile");
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 8");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong 8");
                            }


                        }

                    }

                }

                else if (counter2 === 9) {

                    if (total_screen_width >= 1366) {
                        x_coordinate_min = 820;
                        x_coordinate_max = 1010;
                        y_coordinate_min = 95;
                        y_coordinate_max = 180;

                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 9");

                        } else {
                            //
                            x_coordinate_min = 1230;
                            x_coordinate_max = 1330;
                            y_coordinate_min = 280;
                            y_coordinate_max = 400;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 8");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }
                        }

                    } else if (total_screen_width >= 320 && total_screen_width <= 500) {
                        x_coordinate_min = 380;
                        x_coordinate_max = 630;
                        y_coordinate_min = 90;
                        y_coordinate_max = 190;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 9");

                        } else {
                            x_coordinate_min = 1075;
                            x_coordinate_max = 1300;
                            y_coordinate_min = 150;
                            y_coordinate_max = 320;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 8");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }

                        }

                    } else {

                        x_coordinate_min = 245;
                        x_coordinate_max = 425;
                        y_coordinate_min = 190;
                        y_coordinate_max = 485;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 8");

                        } else {
                            //
                            x_coordinate_min = 660;
                            x_coordinate_max = 810;
                            y_coordinate_min = 150;
                            y_coordinate_max = 405;
                            console.log("Mobile");
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 8");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong 8");
                            }


                        }

                    }


                }
                else if (counter2 === 10) {

                    if (total_screen_width >= 1366) {
                        x_coordinate_min = 830;
                        x_coordinate_max = 1000;
                        y_coordinate_min = 320;
                        y_coordinate_max = 450;

                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 9");

                        } else {
                            //
                            x_coordinate_min = 980;
                            x_coordinate_max = 1100;
                            y_coordinate_min = 170;
                            y_coordinate_max = 300;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 10");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }
                        }

                    } else if (total_screen_width => 320 && total_screen_width <= 500) {
                        x_coordinate_min = 600;
                        x_coordinate_max = 900;
                        y_coordinate_min = 140;
                        y_coordinate_max = 230;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 10");

                        } else {
                            x_coordinate_min = 380;
                            x_coordinate_max = 670;
                            y_coordinate_min = 220;
                            y_coordinate_max = 300;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 10");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }
                        }

                    } else {

                        x_coordinate_min = 600;
                        x_coordinate_max = 900;
                        y_coordinate_min = 140;
                        y_coordinate_max = 230;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 10");

                        } else {
                            //
                            x_coordinate_min = 390;
                            x_coordinate_max = 670;
                            y_coordinate_min = 230;
                            y_coordinate_max = 310;
                            console.log("Mobile");
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 8");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong 8");
                            }


                        }

                    }

                }
                else if (counter2 === 12) {

                    if (total_screen_width >= 1366) {
                        x_coordinate_min = 830;
                        x_coordinate_max = 1000;
                        y_coordinate_min = 320;
                        y_coordinate_max = 450;

                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 9");

                        } else {
                            //
                            x_coordinate_min = 980;
                            x_coordinate_max = 1100;
                            y_coordinate_min = 170;
                            y_coordinate_max = 300;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 10");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }
                        }

                    } else if (total_screen_width => 320 && total_screen_width <= 500) {
                        x_coordinate_min = 310;
                        x_coordinate_max = 680;
                        y_coordinate_min = 200;
                        y_coordinate_max = 280;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 10");

                        } else {
                            x_coordinate_min = 380;
                            x_coordinate_max = 670;
                            y_coordinate_min = 220;
                            y_coordinate_max = 300;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 10");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }
                        }

                    } else {

                        x_coordinate_min = 600;
                        x_coordinate_max = 900;
                        y_coordinate_min = 140;
                        y_coordinate_max = 230;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 10");

                        } else {
                            //
                            x_coordinate_min = 390;
                            x_coordinate_max = 670;
                            y_coordinate_min = 230;
                            y_coordinate_max = 310;
                            console.log("Mobile");
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 8");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong 8");
                            }


                        }

                    }

                }
                else if (counter2 === 13) {

                    if (total_screen_width >= 1366) {
                        x_coordinate_min = 830;
                        x_coordinate_max = 1000;
                        y_coordinate_min = 320;
                        y_coordinate_max = 450;

                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 9");

                        } else {
                            //
                            x_coordinate_min = 980;
                            x_coordinate_max = 1100;
                            y_coordinate_min = 170;
                            y_coordinate_max = 300;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 10");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }
                        }

                    } else if (total_screen_width => 320 && total_screen_width <= 500) {
                        x_coordinate_min = 310;
                        x_coordinate_max = 680;
                        y_coordinate_min = 200;
                        y_coordinate_max = 300;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 10");

                        } else {
                            x_coordinate_min = 130;
                            x_coordinate_max = 340;
                            y_coordinate_min = 210;
                            y_coordinate_max = 280;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 10");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }
                        }

                    } else {

                        x_coordinate_min = 600;
                        x_coordinate_max = 900;
                        y_coordinate_min = 140;
                        y_coordinate_max = 230;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 10");

                        } else {
                            //
                            x_coordinate_min = 390;
                            x_coordinate_max = 670;
                            y_coordinate_min = 230;
                            y_coordinate_max = 310;
                            console.log("Mobile");
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 8");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong 8");
                            }


                        }

                    }

                }

                else if (counter2 === 14) {

                    if (total_screen_width >= 1366) {
                        x_coordinate_min = 940;
                        x_coordinate_max = 1070;
                        y_coordinate_min = 300;
                        y_coordinate_max = 420;

                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 9");

                        } else {
                            //
                            x_coordinate_min = 675;
                            x_coordinate_max = 850;
                            y_coordinate_min = 460;
                            y_coordinate_max = 560;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 10");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }
                        }

                    } else if (total_screen_width => 320 && total_screen_width <= 500) {
                        x_coordinate_min = 310;
                        x_coordinate_max = 680;
                        y_coordinate_min = 200;
                        y_coordinate_max = 280;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 10");

                        } else {
                            x_coordinate_min = 80;
                            x_coordinate_max = 370;
                            y_coordinate_min = 320;
                            y_coordinate_max = 390;
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 10");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong");
                            }
                        }

                    } else {

                        x_coordinate_min = 600;
                        x_coordinate_max = 900;
                        y_coordinate_min = 140;
                        y_coordinate_max = 230;
                        value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                        if (value === true) {
                            makeItRightAns(counter2);
                            console.log("Right 10");

                        } else {
                            //
                            x_coordinate_min = 390;
                            x_coordinate_max = 670;
                            y_coordinate_min = 230;
                            y_coordinate_max = 310;
                            console.log("Mobile");
                            value = checkRightWrong(x_coordinate_min, x_coordinate_max, y_coordinate_min, y_coordinate_max);
                            if (value === true) {
                                makeItRightAns(counter2);
                                console.log("Right 8");

                            } else {
                                makeItWrongAns(counter2);
                                console.log("Wrong 8");
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


                    motiur++;


                    var audio = new Audio('/sound/right.mp3');
                    audio.play();


                    if (motiur === 2) {
                        counter2++;
                        right_count++;
                        if (counter2 === 11) {
                            counter2++;
                        }

                        let just_count = right_count + 1;
                        if (just_count === 2) {
                            $.notify("অভিনন্দন! ২য় ধাপে যান। ", "success");

                        } else if (just_count === 3) {
                            $.notify("অভিনন্দন! ৩য় ধাপে যান। ", "success");
                        } else if (just_count === 4) {
                            $.notify("অভিনন্দন। আর মাত্র ২ ধাপ বাকি।", "success");
                        } else if (just_count === 5) {
                            $.notify("অভিনন্দন। সর্বশেষ ধাপে স্বাগতম।", "success");
                        } else {

                        }


                        click_counter++;
                        console.log(counter2 + "---" + right_count);
                        var image = document.getElementById("img2");
                        image.src = "/images/game/spot_game/" + counter2 + "" + counter2 + ".jpg"
                        var image = document.getElementById("img1");
                        image.src = "/images/game/spot_game/" + counter2 + ".jpg";

                        motiur = 0;
                    } else {
                        $.notify("সঠিক হয়েছে! আরেকটি অসঙ্গতি বের করুন।", "success");
                    }

                    //alert("Right Answer")
                    if (click_counter > 5) {
                        //alert("Game is over");
                        $.notify("Game is over");


                        localStorage.setItem("right_count", right_count);
                        localStorage.setItem("time", totalSeconds);

                        window.location.href = "/game/stp/result";
                    }


                }

                function makeItWrongAns(counter) {

                    console.log("MOTIUR"+wrong_count);
                    $.notify("ভুল উত্তর। আবার চেষ্টা করুন।");

                    var audio = new Audio('/sound/wrong.mp3');
                    audio.play();

                    if (counter2 === 11) {
                        counter2++;
                        //      return;
                    }
                    wrong_count++;
                    //return;
                    //alert("Wrong Answer")
                    console.log(counter + " Right Ans: " + right_count + " Wrong Count" + wrong_count);
                    if (wrong_count > 5) {
                        //alert("Game is over");
                        $.notify("Game is over!");
                        localStorage.setItem("right_count", right_count);
                        localStorage.setItem("time", totalSeconds);

                        window.location.href = "/game/stp/result";
                    }

                    if (wrong_count > 4) {

                        $.notify("আপনি আর একটি লাইফলাইন পাবেন।সাবধানে চেষ্টা করুন। ");

                    } else if (wrong_count > 5) {
                        //alert("Game is over");
                        $.notify("আশানুরূপ ফল করতে পারেন নি। \n" +
                            "আবার চেষ্টা করুন। ");
                        localStorage.setItem("right_count", right_count);
                        localStorage.setItem("time", totalSeconds);

                        window.location.href = "/game/stp/result";
                    }



                }
            }
        )
        ;
    })
    ;


</script>
</body>
</html>
