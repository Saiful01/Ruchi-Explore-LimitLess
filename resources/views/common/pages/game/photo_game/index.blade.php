@extends('layouts.common')

@section('title', 'Photo Game')



@section('content')
    <style>
        .instruction {
            padding-top: 20px;
        }

        @media (max-width: 767px) {
            .home-bg {
                margin-top: 15px;
            }
        }
    </style>



    <div class=""  style="background: #4d536d url(/images/game/gaming_background.png);background-repeat: no-repeat;
    background-size: 100% 750px;
    height: 750px;">
        <div class="row mt-5">
            <div class="col-md-3 mx-auto">
                <center>
                    <img src="/images/game/travel_master_page.png" width="230px"
                         style="padding-top: 35px;margin-bottom: -40px">
                </center>
            </div>
        </div>


        <div class="container margin_60">
            @if(session('success'))

                <div class="alert alert-success">{{session('success')}}!</div>

            @endif
            @if(session('failed'))
                <div class="alert alert-danger">
                    {{session('failed')}}!
                </div>
            @endif

            <script>
                $(document).ready(function () {
                    var audio = new Audio('/sound/game.mp3');
                    audio.play();

                });
            </script>


            {{-- <div class="main_title">



             </div>--}}

            <div class="row">

                <div class="col-md-8 mx-auto home-bg" id="aside"
                     style="background-color: #E3E9DD; border-radius: 30px 30px 71px 70px;">
                    <div class="">
                        <div class="">

                            {{--<label id="minutes">00</label>:<label id="seconds">00</label>--}}



                            @foreach($results as $key => $result)

                                <div id="panel_{{$key}}">


                                    <div class="instruction ">
                                        <p>{{--{{++$key}} : --}}{{$result['question']}}
                                            <span id="myspan" class=" float-right">Remaining 0/5  </span>
                                        </p>
                                    </div>
                                    <div class="row">
                                        @foreach($result['options'] as $option)

                                            <div class="col-xs-4 col-md-4 col-6 selection"
                                                 onclick="selectedItem(`{{$result['code']}}`, `{{$option['code']}}`, `{{$option['id']}}`)">
                                                <img id="option_{{$option['id']}}" src="{{$option['relative_path']}}"
                                                     class="img-thumbnail"
                                                     width="100%"  style="height: 175px;" alt=""/>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>


                            @endforeach


                            <button class="btn  btn-block text-black font-weight-bold" id="save" onclick="goNext()">
                                <img src="/images/game/next_btn.png" height="60px" ; width="150px">
                            </button>
                        </div>

                    </div>
                </div>


            </div>
            <!--End row -->-


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


        function selectedItem(questionCode, optionCode, id) {
            /*console.log('message', questionCode);
            console.log('message', optionCode);*/


            let item = document.getElementById('option_' + id);
            if (item.style.border !== '4px solid red') {
                item.style.border = '4px solid red'

                if (questionCode == optionCode) {
                    right_answer++;
                    console.log('Right', right_answer);
                } else {
                    wrong_answer++;
                    console.log('Wrong', wrong_answer);
                }

            } else {
                item.style.border = '1px solid black'

                if (questionCode == optionCode) {
                    right_answer--;
                    console.log('Right', right_answer);
                } else {
                    wrong_answer++;
                    console.log('Wrong', wrong_answer);
                }
            }

        }

        console.log('message', right_answer);

        function goNext() {

            counter++;
            document.getElementById("myspan").innerHTML = "Remaining " + counter + "/5";


            console.log("Click");


            if (counter == 0) {
                document.getElementById('panel_0').style.display = "block";
                document.getElementById('panel_1').style.display = "none";
                document.getElementById('panel_2').style.display = "none";
                document.getElementById('panel_3').style.display = "none";
                document.getElementById('panel_4').style.display = "none";

                console.log(counter);
            } else if (counter == 1) {
                document.getElementById('panel_0').style.display = "none";
                document.getElementById('panel_1').style.display = "block";
                document.getElementById('panel_2').style.display = "none";
                document.getElementById('panel_3').style.display = "none";
                document.getElementById('panel_4').style.display = "none";
                console.log(counter);
            } else if (counter == 2) {
                console.log("Button");


                document.getElementById('panel_0').style.display = "none";
                document.getElementById('panel_1').style.display = "none";
                document.getElementById('panel_2').style.display = "block";
                document.getElementById('panel_3').style.display = "none";
                document.getElementById('panel_4').style.display = "none";
                console.log(counter);
            } else if (counter == 3) {
                console.log("Button");


                document.getElementById('panel_0').style.display = "none";
                document.getElementById('panel_1').style.display = "none";
                document.getElementById('panel_2').style.display = "none";
                document.getElementById('panel_3').style.display = "block";
                document.getElementById('panel_4').style.display = "none";
                console.log(counter);
            } else if (counter == 4) {
                console.log("Button");
                //document.getElementById("save").innerText = "SAVE";

                document.getElementById('panel_0').style.display = "none";
                document.getElementById('panel_1').style.display = "none";
                document.getElementById('panel_2').style.display = "none";
                document.getElementById('panel_3').style.display = "none";
                document.getElementById('panel_4').style.display = "block";
                console.log(counter);
            } else {
                console.log("Save");


                if (typeof(Storage) !== "undefined") {
                    // Store
                    sessionStorage.setItem("total_seconds", totalSeconds);
                    sessionStorage.setItem("total_right_answer", right_answer);
                    sessionStorage.setItem("total_wrong_answer", wrong_answer);

                }

                window.location.href = `{{URL::to('/game/image-select/result')}}`;


                console.log("Time" + totalSeconds);
            }
        }


        document.getElementById('panel_0').style.display = "block";
        document.getElementById('panel_1').style.display = "none";
        document.getElementById('panel_2').style.display = "none";
        document.getElementById('panel_3').style.display = "none";
        document.getElementById('panel_4').style.display = "none";
        console.log(counter);

    </script>




@stop
