<div class="container margin_60" style="padding-top: 35px;padding-bottom: 35px">

    <div class="main_title">
        <div class="row">

            <div class="col-md-6">
                <h2 class="float-left">{{ __('localize.video')}} </h2>
            </div>

            <div class="col-md-6">
                <img src="/image/powered.png" style="width: 190px;
    float: right;">
            </div>

        </div>


    </div>

    <div class="row">


        @foreach($videos as $video)
            <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">


                <div class="tour_container">
                    <div class="img_container">
                        <a href="/video/details/{{$video->video_id}}/{{getTitleToUrl($video->video_title)}}">
                            <img src="/images/video_image/{{$video->video_image}}" width="100%"
                                 class="img-fluid"
                                 alt="image" style="height: 205px;">
                            <div class="short_info">
                                <h4 class="text-white" style="font-weight: bold"> {{$video->video_title}}</h4>
                            </div>
                        </a>
                    </div>


                </div>

                <!-- End box tour -->
            </div>
        @endforeach

        {{--    <div class="owl-carousel owl-theme list_carousel add_bottom_30 owl-loaded owl-drag">


                <div class="owl-stage-outer">

                    <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1850px;">
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

                                    <!-- End box tour -->
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>

                <p class="text-center pt-4">
                    <a href="/video/all" class="btn_1">{{ __('localize.view_all_video')}}</a>

                </p>


            </div>--}}
    </div>
</div>
