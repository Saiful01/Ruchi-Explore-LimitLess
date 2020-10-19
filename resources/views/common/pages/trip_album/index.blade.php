@extends('layouts.common')

@section('title', ' Trip Album')



@section('content')

    <div class="container margin_60" xmlns="http://www.w3.org/1999/html">
        <div class="main_title">
            <h2>  Video Gallery</h2>
        </div>
        <hr>

        <div class="owl-carousel owl-theme list_carousel add_bottom_30 owl-loaded owl-drag">


            <div class="owl-stage-outer">

                <div class="owl-stage"
                     style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1850px;">
                    @foreach($videos as $video)
                        <div class="owl-item active wow zoomIn" data-wow-delay="0.2s" style="width: 370px;">

                            <div class="item">

                                <div class="tour_container">
                                    <div class="img_container">
                                        <a href="/video/details/{{$video->video_id}}/{{getTitleToUrl($video->video_title)}}">
                                            <img style="height: 235px" src="/images/video_image/{{$video->video_image}}"
                                                 height="235"
                                                 class="img-fluid"
                                                 alt="image">
                                            <div class="short_info">
                                                <h4 class="text-white text-center"
                                                    style="font-weight: bold"> {{$video->video_title}}</h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>

            <p class="text-center pt-4">
                <a href="/video/all" class="btn_1">{{ __('localize.view_all_video')}}</a>

            </p>

        </div>
        <hr>


        <div class="main_title">
            <h2>All images from Trip Album</h2>
        </div>
        <hr>

        <div class="row magnific-gallery add_bottom_60 ">
            @foreach($trips as $trip)
                <div class="col-sm-3">


                    <div class="img_wrapper_gallery">

                        <div class="img_container_gallery">

                            <a href="/images/blog/{{$trip->trip_album_image}}" title="{{$trip->trip_album_title}}"
                               data-effect="mfp-zoom-in"><img src="/images/blog/{{$trip->trip_album_image}}"
                                                              alt="Image" class="img-fluid" style="height: 160px; width: 100%">
                                <i class="icon-resize-full-2"></i>
                                <div class="short_info">
                                    <h4 class="text-white text-center"
                                        style="font-weight: bold"> {{$trip->trip_album_title}}</h4>
                                </div>
                            </a>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <!-- End row -->

    </div>


@stop
