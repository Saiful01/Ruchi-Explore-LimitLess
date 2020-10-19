@extends('layouts.common')

@section('title', 'Videos-Beutigram Ruchi')



@section('content')

    <div class="container margin_60" style="margin-top: 30px">
        <div class="main_title">
            <h2>All Video from BeautiGram</h2>

        </div>


        <div class="row">


            @foreach($videos as $video)
                <div class="col-md-4">


                    <div class="tour_container">
                        <div class="img_container">
                            <a href="/beauty-gram/video-details/{{$video->video_id}}/{{getTitleToUrl($video->video_title)}}">
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
