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

                 .owl-carousel .owl-stage {
                     position: relative;
                     -ms-touch-action: pan-Y;
                     touch-action: manipulation;
                     -moz-backface-visibility: hidden;
                     height: 350px;
                 }

    </style>

    <div class="container margin_60">

        <div class="row pt-5 " style="margin-left: 5px">
            <div class="col-sm-12">
                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                    <iframe width="1920" height="700"
                            src="https://video.helloeko.com/v/MO0yGd/embed?autoplay=true&amp;publisherID=D4rIhN"
                            frameborder="0" allowfullscreen=""></iframe>
                </div>

            </div>
        </div>
        <div  >
            <h4 class="banner" id="banner"  style=" font-family: 'Sriracha', cursive; font-weight: bold;">BEAUTiGRAM SEASON 2 (2019)</h4>
        </div>


        {{--        <div class="main_title">--}}
        {{--            <h2><a class="btn btn-danger" href="/beauty-gram/image">Image</a> <a class="btn btn-danger" href="/beauty-gram/video">Video</a> </h2>--}}

        {{--        </div>--}}
        <div class=" mt-2 ml-3 ">
            <a  href="/beauty-gram/image"  ><h4 id="font">BEAUTiGRAM PHOTOS</h4></a>

        </div>


        <div class="owl-carousel owl-theme list_carousel add_bottom_30">

            @foreach($trips as $blog)
                <div class="item">
                    <a href="/beauti-gram-album/{{$blog->trip_album_id}}/{{getTitleToUrl($blog->trip_album_title)}}">

                        <div class=" wow zoomIn" data-wow-delay="0.2s" style="loop: true">
                            <div class="">
                                <img src="/images/blog/{{$blog->trip_album_image}}" class="card-img-top" alt="..."
                                     height="200" width="100%">
                                <h3 class="">{{$blog->trip_album_title}}</h3>
                                 <em class="fa fa-user fa-fw"></em>{{getNameFromId($blog->author_id)}}
                                 <em class="fa fa-calendar fa-fw"></em> {{dateFormat($blog->created_at)}}

                            </div>
                        </div>
                    </a>

                </div>
            @endforeach
        </div>
        <div class=" mt-2 ml-3">
            <a href="/beauty-gram/video"  ><h4 id="font">BEAUTiGRAM VIDEOS</h4></a>

        </div>


        <div class="owl-carousel owl-theme list_carousel add_bottom_30">

            @foreach($videos as $video)
                <div class="item">
                    <a href="/beauty-gram/video-details/{{$video->video_id}}/{{getTitleToUrl($video->video_title)}}">

                        <div class=" wow zoomIn" data-wow-delay="0.2s">
                            <div class="">
                                <img src="/images/video_image/{{$video->video_image}}" class="card-img-top" alt="..."
                                     height="200" width="100%">
                                <h3 class="">{{$video->video_title}}</h3>
                                <em class="fa fa-user fa-fw"></em>{{getNameFromId($video->author_id)}}
                                <em class="fa fa-calendar fa-fw"></em> {{dateFormat($video->created_at)}}


                            </div>
                        </div>
                    </a>

                </div>
            @endforeach
        </div>
        <!-- /carousel -->
        <div class=" mt-2 ml-3">
            <a href="/beauty-gram/blogs"  ><h4 id="font">BEAUTiGRAM BLOGS</h4></a>

        </div>


        <div class="owl-carousel owl-theme list_carousel add_bottom_30">

            @foreach($blogs as $blog)
                <div class="item">
                    <a href="/beauty-gram/blog/{{$blog->blog_id}}/{{getTitleToUrl($blog->blog_title)}}">

                        <div class=" wow zoomIn" data-wow-delay="0.2s">
                            <div class="">

                                <img src="{{'/images/blog/'.$blog->featured_image}}" class="card-img-top" alt="..."
                                     height="200" width="100%">
                                <h3 class="">{{$blog->blog_title}}</h3>
                                <em class="fa fa-user fa-fw"></em>{{getNameFromId($blog->author_id)}}
                                <em class="fa fa-calendar fa-fw"></em> {{dateFormat($blog->created_at)}}


                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <!-- /carousel -->
        <div class=" mt-2 ml-3">
            <h4 id="font">EVENT PHOTOS</h4>

        </div>


        <div class="owl-carousel owl-theme list_carousel add_bottom_30">


            @for($i=1 ;$i<=16;$i++)
                <div class="item">

                    <div class="tour_container">
                        <div class="img_container">
                            <a href="#">
                                <img src="/images/beautigram/{{$i.".jpg"}}"
                                     width="100%"
                                     class="img-fluid"
                                     alt="image" style="height: 205px;">
                                {{-- <div class="short_info">
                                     <h4 class="text-white"
                                         style="font-weight: bold">{{$category->en_name}}</h4>
                                 </div>--}}
                            </a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <!-- /carousel -->



        {{--<div class="main_title" style="overflow: hidden">
            <div class="row ">

                <div class="col-md-7 mx-auto col-12">
                    <div class="row ">

                        <a href="/beauty-gram/image">
                            <div class="col-md-3 col-3 mx-auto">
                                <img src="/images/beautigram/photos.png" width="100%"/>
                                <a style="color: black !important; margin-top:10px "
                                   href="/beauty-gram/image">PHOTOS</a>
                            </div>

                        </a>
                        <a href="/beauty-gram/video">
                            <div class="col-md-3 col-3 mx-auto">
                                <img src="/images/beautigram/video.png" width="100%"/>
                                <a style="color: black !important; margin-top:10px "
                                   href="/beauty-gram/video">VIDEOS</a>
                            </div>

                        </a>
                        <a href="/beauty-gram/blogs">
                            <div class="col-md-3 col-3 mx-auto">
                                <img src="/images/beautigram/blog.png" width="100%"/>
                                <a style="color: black !important; margin-top:10px " href="/beauty-gram/blogs">BLOGS</a>
                            </div>

                        </a>
                    </div>
                </div>
            </div>
        </div>--}}
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
