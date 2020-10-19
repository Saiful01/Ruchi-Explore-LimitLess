@extends('layouts.common')

@section('title', 'Beautigram Ruchi')



@section('content')
    <style>
        .owl-carousel .owl-item {
            position: relative;
            min-height: 1px;
            float: left;
            -webkit-backface-visibility: hidden;
            -webkit-tap-highlight-color: transparent;
            -webkit-touch-callout: none;
            width: 274px !important;
            height: 275px !important;
        }

         main{
             background: url(/images/common_bg.png);
         }

    </style>
    <div class="container margin_60">

        <div class="row pt-5 " style="margin-left: 5px">
            <div class="col-sm-12">
                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                    <iframe width="1920" height="700"
                            src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fruchi.square%2Fvideos%2F1046560735497047%2F&show_text=0&width=560"
                            frameborder="0" allowfullscreen=""></iframe>
                </div>

            </div>
        </div>
        <div  >
            <h4 class="banner" id="banner"  style=" font-family: 'Sriracha', cursive; font-weight: bold;">BEAUTiGRAM SEASON 1 (2018)</h4>
        </div>

        <div class=" mt-2 ml-3 ">
            <a  href="/beauty-gram/image/season1"  ><h4 id="font">BEAUTiGRAM PHOTOS</h4></a>

        </div>


        <div class="owl-carousel owl-theme list_carousel add_bottom_30">

            @foreach($trips as $trip)
                <div class="item">
                    <a href="/beauti-gram-album/{{$trip->trip_album_id}}/{{$trip->trip_album_title}}">

                        <div class=" wow zoomIn" data-wow-delay="0.2s">
                            <div class="">
                                <img src="/images/blog/{{$trip->trip_album_image}}" class="card-img-top mb-2" alt="..."
                                     height="200" width="100%">
                               {{-- <h3 class="">{{$trip->trip_album_title}}</h3>--}}
                                <em class="fa fa-user fa-fw"></em>{{getNameFromId($trip->author_id)}}
                                <em class="fa fa-calendar fa-fw"></em> {{dateFormat($trip->created_at)}}


                            </div>
                        </div>
                    </a>

                </div>
            @endforeach
        </div>


        <div class="" style="overflow: hidden">
            <div class=" mt-2 ml-3 ">
                <a  href="/beauty-gram/image"  ><h4 id="font">EVENT PHOTOS</h4></a>

            </div>
            <div class="row">
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
