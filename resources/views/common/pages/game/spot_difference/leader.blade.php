@extends('layouts.common')

@section('title', 'LeaderBoard')

@section('content')
    {{-- <a href="/game/image-select">--}}
    <div class="" style="background: #4d536d url(/images/game/gaming_background.png);background-repeat: no-repeat;
    background-size: 100% 550px;
    height: 550px;">


        <div class="container margin_60">

            <div class="row mt-5">
                <div class="col-4">
                </div>

                <div class="col-md-4 col-sm-12"
                     style="background-color:#FFEFB1;height: 430px;border: 10px solid; border-color: #7A3927;border-radius: 15px ">

                    @if($id==1)
                        <a href="/game/stp/result">

                            <img src="/images/game/leaderhead.png" width="450px"
                                 style="margin-top: -50px;margin-left: -59px ">
                        </a>

                    @else
                        <a href="/game-2/instruction">
                            <img src="/images/game/leaderhead.png" width="450px"
                                 style="margin-top: -50px;margin-left: -59px ">
                        </a>
                    @endif



                    @php($i=1)
                    @foreach($results as $result)
                        <div class="row mt-1"
                             style="margin-left: 20px;align-content: center;margin-right: 10px; border-radius: 5px ">
                            <div class="col-2" style="background-color:#54281B;  height: 50px;align-content: center; ">
                                <h4 class="text-white mt-2">{{$i++}}</h4>
                            </div>
                            <div class="col-6" style="background-color:#7A3927;  height: 50px;align-content: center; ;">
                                <h4 class="text-white mt-2">{{$result->full_name}}</h4>
                            </div>
                            <div class="col-4" style="background-color:#7A3927 ;  height: 50px;align-content: center;">
                                <span class="badge mt-2"
                                      style="width: 80px; background-color: #819C16; border-radius: 15px;"><h4
                                        class="text-white mt-1">{{$result->score}}</h4></span>
                            </div>

                        </div>
                    @endforeach
                </div>
                {{-- <div class="col-md-4 col-12">
                     <a href="/game/spot-the-difference">
                         <img id="start" src="/images/game/start_btn.png" alt="start" >
                     </a>
                 </div>--}}
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
