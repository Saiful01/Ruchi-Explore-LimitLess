@extends('layouts.common')

@section('title', 'Game')



@section('content')
    <style>
        @media (max-width: 767px) {
            .margin_60 {
                padding-top: 27px;
                padding-bottom: 30px;
                margin-top: -53px;
            }
        }
    </style>
    <div class="main-bg" style="background: #4d536d url(./images/game/gaming_background.png);    background-repeat: no-repeat;
    background-repeat: no-repeat;
    background-size: cover;
    margin-top: 49px;">


        <div class="container margin_60">

            <div class="main_title">
                {{--  <h2> game</h2>--}}
                {{--  <p>
                      Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.
                  </p>--}}
            </div>

            <div class="col-md-8 mx-auto">
                <div class="row">
                    <div class="col-lg-4 mx-auto wow zoomIn" data-wow-delay="0.4s">
                        <center>
                            <img src="/images/game/games_btn.png" style="width: 200px;">
                        </center>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-4 mx-auto wow zoomIn" data-wow-delay="0.4s">

                        <a href="/game-1/instruction">
                            <center>
                                <img src="/images/game/game1.png" style="width: 200px;
    margin-top: 50px;">
                            </center>
                        </a>
                    </div>
                    <div class="col-lg-4 mx-auto wow zoomIn" data-wow-delay="0.4s">
                        <a href="/game-2/instruction">
                            <center>
                                <img src="/images/game/game2.png" style="width: 200px;
    margin-top: 50px;">
                            </center>
                        </a>
                    </div>
                </div>


                {{-- <div class="col-lg-3 wow zoomIn" data-wow-delay="0.4s">
                     <div class="feature_home">
                         <i class="icon-gamepad"></i>
                         <h3><span style="color:black ">Select Right Image</span></h3>

                         <a href="/game-1/instruction" class="btn_1 outline">Play Now</a>
                     </div>
                 </div>


                 <div class="col-lg-3 wow zoomIn" data-wow-delay="0.2s">
                     <div class="feature_home">
                         <i class="icon-gamepad"></i>
                         <h3><span  style="color:black ">Spot the Difference</span></h3>

                        <a href="/game-2/instruction" class="btn_1 outline">Play Now</a>
                     </div>
                 </div>--}}

            </div>
            <!--End row -->-


        </div>
    </div>

@stop
