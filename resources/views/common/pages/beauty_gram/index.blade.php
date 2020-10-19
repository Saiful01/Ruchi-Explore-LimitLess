@extends('layouts.common')

@section('title', 'Beautigram Ruchi')



@section('content')
    <div class="" style="background: #4d536d url(./images/background.png); background-repeat: no-repeat;
  background-size: 100% 900px;">

        <div class="container margin_60" >
            {{--<div class="row pt-4 pb-4">

                <div class="col-md-5 mx-auto ">
                    <center>
                        <a href="/beauty-gram/image" class="btn_1">Photos </a>
                        <a href="/beauty-gram/video" class="btn_1">Videos </a>
                       <a href="/beauty-gram/blogs" class="btn_1">Blogs </a>
                    </center>
                </div>
            </div>--}}
            <div id="screen" class="row" >
                <div class="col-md-4">
                    <div class="">
                        <h2 class="text-white font-weight-bold" style="font-family: 'Sriracha', cursive;"><span style="color: #EF9622;font-family: 'Sriracha', cursive; font-weight: bold">RUCHi</span> <br> BEAUTiGRAM</h2>
                        <P class="text-justify text-white pb-3"
                           style="font-family: Oswald, sans-serif; font-size: 18px; text-align: center;">The initial concept of
                            Beautigram was pretty simple. “Dekha hoyni chokkhu meliya, ghor hote du’pa feliya”! There are
                            numerous
                            travellers who have travelled all over the world in search for beauty or adventure, but missed out
                            on
                            the unseen beauties right here in Bangladesh, or worse yet, right beside your own homes. The purpose
                            of
                            Beautigram was to bring out the hidden beauties of our beautiful Bangladesh through the lenses of
                            fellow
                            travellers during the Eid Holidays, when many of us travel with our families to go closer to nature
                            for
                            a bit of respite from our busy lives. The goal was to develop an “Instagram” for the natural
                            Beauties of
                            Bangladesh. Hence, launched Beautigram.</P>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="container">
                        <img class="img-thumbnail" src="images/Sajek-valley.jpg" alt="image">
                        <div class="row" id="season" >
                            <div class="col-lg-6 col-6 wow zoomIn" data-wow-delay="0.4s">
                                <a href="/beautigram/season-1">
                                    <div class="feature_home">
                                        <img src="/images/beautigram/season2.png"
                                             alt="Image" class="img-thumbnail"
                                             style="width: 100%; text-align: center">

                                        {{--
                                                                    <h6 class="mb-2 text-center">Beautigram</h6>
                                                                    <h6 class="mb-2 text-center">Season 1</h6>--}}

                                    </div>
                                </a>
                            </div>


                            <div class="col-lg-6 col-6 wow zoomIn" data-wow-delay="0.2s">
                                <a href="/beautigram/season-2">
                                    <div class="feature_home">
                                        <img src="/images/beautigram/season1.png"
                                             alt="Image" class="img-thumbnail"
                                             style="width:100%; text-align: center">
                                        {{-- <h6 class="mb-2 text-center">Beautigram</h6>
                                         <h6 class="mb-2 text-center">Season 2</h6>--}}
                                    </div>
                                </a>
                            </div>

                        </div>

                    </div>

                </div>
            </div>





        </div>
    </div>



@stop
