@extends('layouts.common')

@section('title', 'Tour Package')



@section('content')


    <div class="container margin_60">
        <div class="main_title ">
            <h4 class="mt-2" id="font">{{$result->title}}</h4>

        </div>
        <div class="row">

                    <div class="col-lg-8 mx-auto wow zoomIn" data-wow-delay="0.2s">
                        <img src="/images/package/{{$result->package_image}}" width="100%" class="card-img-top"
                             alt="..." >

                            <p>{!! $result->details !!}</p>

                    </div>
                  {{--  <div class="col-lg-4 wow zoomIn" data-wow-delay="0.2s">
                            <img src="/images/package/{{$result->package_image}}" width="100%" class="card-img-top"
                                 alt="..." >
                    </div>--}}





        </div>
    </div>






@stop
