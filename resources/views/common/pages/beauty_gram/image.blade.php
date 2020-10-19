@extends('layouts.common')

@section('title', 'Photos-Beutigram Ruchi')



@section('content')

    <div class="container margin_60" style="margin-top: 30px">

        <div class="main_title">
            <h2> Photos from Beutigram</h2>
        </div>
        <div class="row">

            @foreach($trips as $trip)
                <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s"
                     style="visibility: visible; animation-delay: 0.2s; animation-name: zoomIn;">


                    <div class="tour_container">
                        <div class="img_container">
                            <a href="/beauti-gram-album/{{$trip->trip_album_id}}/{{$trip->trip_album_title}}">
                                <img src="/images/blog/{{$trip->trip_album_image}}" width="100%" class="img-fluid"
                                     alt="image"
                                     style="height: 235px;">
                                <div class="short_info">
                                    <h4 class="text-white" style="font-weight: bold"> {{$trip->trip_album_title}}</h4>


                                    <em class="fa fa-user fa-fw"></em>{{getNameFromId($trip->author_id)}}
                                    <em class="fa fa-calendar fa-fw"></em> {{dateFormat($trip->created_at)}}
                                </div>
                            </a>
                        </div>


                    </div>

                    <!-- End box tour -->
                </div>
            @endforeach


        </div>

        {{$trips->links()}}
    </div>
    <!-- End row-->


@endsection


