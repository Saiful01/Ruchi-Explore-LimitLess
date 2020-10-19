@extends('layouts.beautigram')

@section('title', 'Beautigram Ruchi')



@section('content')

    <div class="container margin_60">
        {{--<div class="row pt-4 pb-4">

            <div class="col-md-5 mx-auto ">
                <center>
                    <a href="/beauty-gram/image" class="btn_1">Photos </a>
                    <a href="/beauty-gram/video" class="btn_1">Videos </a>
                   <a href="/beauty-gram/blogs" class="btn_1">Blogs </a>
                </center>
            </div>
        </div>--}}
        <div class="main_title">
            <h2>RUCHI BEAUTIGRAM</h2>
            <P class="text-justify pt-5 pb-3" style="font-family: Oswald, sans-serif; font-size: 18px; text-align: center;">The initial concept of Beautigram was pretty simple. “Dekha hoyni chokkhu meliya, ghor hote du’pa feliya”! There are numerous travellers who have travelled all over the world in search for beauty or adventure, but missed out on the unseen beauties right here in Bangladesh, or worse yet, right beside your own homes. The purpose of Beautigram was to bring out the hidden beauties of our beautiful Bangladesh through the lenses of fellow travellers during the Eid Holidays, when many of us travel with our families to go closer to nature for a bit of respite from our busy lives. The goal was to develop an “Instagram” for the natural Beauties of Bangladesh. Hence, launched Beautigram.</P>
        </div>
        <div class="main_title" style="overflow: hidden">
            <h2>BEAUTIGRAM SEASON 2 (2019)</h2>
            <div class="row pt-5">
                <div class="col-sm-12">
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                        <iframe width="1920" height="700"
                                src="https://video.helloeko.com/v/MO0yGd/embed?autoplay=true&amp;publisherID=D4rIhN"
                                frameborder="0" allowfullscreen=""></iframe>
                    </div>

                </div>
            </div>
        </div>

        {{--        <div class="main_title">--}}
        {{--            <h2><a class="btn btn-danger" href="/beauty-gram/image">Image</a> <a class="btn btn-danger" href="/beauty-gram/video">Video</a> </h2>--}}

        {{--        </div>--}}
        <div class="main_title" style="overflow: hidden">
            <h2>EVENT PHOTOS</h2>
            <div class="row pt-5">
                <div class="col-sm-12">

                    <div class="owl-carousel owl-theme list_carousel add_bottom_30 owl-loaded owl-drag">


                        <div class="owl-stage-outer">

                            <div class="owl-stage"
                                 style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1850px;">
                                @for($i=1 ;$i<=16;$i++)
                                    <div class="owl-item active wow zoomIn" data-wow-delay="0.2s" style="width: 370px;">

                                        <div class="item">

                                            <div class="tour_container">
                                                <div class="img_container">

                                                    <img style="height: 235px" src="/images/beautigram/{{$i.".jpg"}}"
                                                         height="235"
                                                         class="img-fluid"
                                                         alt="image">
                                                    {{-- <div class="short_info">
                                                         <h4 class="text-white text-center"
                                                             style="font-weight: bold"> {{$video->video_title}}</h4>
                                                     </div>--}}

                                                </div>


                                            </div>

                                            <!-- End box tour -->
                                        </div>

                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="main_title">
            <h2>BEAUTIGRAM SEASON SEASON 1 (2018)</h2>
            <div class="row pt-5">
                <div class="col-sm-12">
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                        <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fruchi.square%2Fvideos%2F1046560735497047%2F&show_text=0&width=560"
                                width="100%" height="315" style="border:none;overflow:hidden" scrolling="no"
                                frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
                    </div>

                </div>
            </div>
        </div>
        {{--        @include('common.pages.beauty_gram.event')--}}

        <div class="main_title" style="overflow: hidden">
            <h2>EVENT PHOTOS</h2>
            <div class="row pt-5">
                <div class="col-sm-12">

                    <div class="owl-carousel owl-theme list_carousel add_bottom_30 owl-loaded owl-drag">


                        <div class="owl-stage-outer">

                            <div class="owl-stage"
                                 style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1850px;">
                                @for($i=20 ;$i<=27;$i++)
                                    <div class="owl-item active wow zoomIn" data-wow-delay="0.2s" style="width: 370px;">

                                        <div class="item">

                                            <div class="tour_container">
                                                <div class="img_container">

                                                    <img style="height: 235px" src="/images/beautigram/{{$i.".jpg"}}"
                                                         height="235"
                                                         class="img-fluid"
                                                         alt="image">
                                                    {{-- <div class="short_info">
                                                         <h4 class="text-white text-center"
                                                             style="font-weight: bold"> {{$video->video_title}}</h4>
                                                     </div>--}}

                                                </div>


                                            </div>

                                            <!-- End box tour -->
                                        </div>

                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="main_title" style="overflow: hidden">
            <div class="row pt-5">
                <div class="col-sm-5 mx-auto">
                    <img src="/images/beautigram/01.png" width="100%"/>
                </div>
            </div>
        </div>

    </div>



@stop
