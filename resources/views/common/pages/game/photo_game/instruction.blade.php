@extends('layouts.common')

@section('title', 'Instruction')

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

   {{-- <a href="/game/image-select">--}}
        <div class="" style="background: #4d536d url(/images/game/gaming_background.png);background-repeat: no-repeat;
    background-size: 100% 750px;
    height: 750px;">


            <div class="container margin_60">
                <div class="row">

                    <div class="col-md-5 col-8 mx-auto mt-4">
                        <a href="/game/image-select">
                        <img src="/images/game/rules_1.png" width="100%"; height="auto;">
                        </a>
                    </div>
                </div>
                <div class="row">

                    <div class="col-3">
                        <a href="/game/image-select/leaderdboard/0">
                        <img src="/images/game/leader.png" width="100%"; height="auto;">
                        </a>
                    </div>
                </div>

                {{--<div class="row">
                    <div class="col-lg-6 mx-auto wow fadeIn" data-wow-delay="0.1s"
                         style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                        <div class="instruction">
                            <h4>খেলার নিয়ম</h4>
                            <ul class="list_ok">


                                <li> সঠিক ছবিটি সিলেক্ট করুন</li>
                                <li> সঠিক জায়গার ছবি সিলেক্ট করুন</li>
                                <li> সর্বমোট ৫টি প্রশ্ন রয়েছে</li>
                                <li> প্রতিবার খেলার জন্য ৫ বার সুযোগ পাবেন</li>
                                <li> ৫ বার সুযোগ ব্যবহারের পর আবার পুনরায় খেলতে হবে</li>


                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 mx-auto">
                    <a class="btn_map " href="/game/image-select">Play Now</a>
                </div>--}}


            </div>
        </div>
    </a>

@stop
