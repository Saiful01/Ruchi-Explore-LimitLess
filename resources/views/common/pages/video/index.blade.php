@extends('layouts.common')

@section('title', 'Videos')



@section('content')

    <div class="container margin_60">
        <div class="main_title">
            <h2>{{__('localize.all_videos')}}</h2>

        </div>


        <div class="row">


            @foreach($videos as $video)
                <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">


                    <div class="tour_container">
                        <div class="img_container">
                            <a href="/video/details/{{$video->video_id}}/{{getTitleToUrl($video->video_title)}}">
                                <img src="/images/video_image/{{$video->video_image}}" width="100%"
                                     class="img-fluid"
                                     alt="image" style="height: 235px;">
                                <div class="short_info">
                                    <h4 class="text-white" style="font-weight: bold"> {{$video->video_title}}</h4>
                                </div>
                            </a>
                        </div>


                    </div>

                    <!-- End box tour -->
                </div>
            @endforeach

        </div>

    </div>









@stop
