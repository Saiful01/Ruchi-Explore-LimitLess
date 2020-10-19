@extends('layouts.common')

@section('title', $trip->trip_album_title)



@section('content')


    <div class="container margin_60">
        <div class="row">

            <div class="col-lg-9">
                <div class="box_style_1">

                    <img src="/images/blog/{{$trip->trip_album_image}}" width="100%"/>

                    <div class="post_info clearfix">
                        <div class="post-left">
                            <ul>
                                <li><i class="icon-calendar-empty"></i>On
                                    <span>{{ dateFormat($trip->created_at) }}</span>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <h2>{{$trip->trip_album_title}}</h2>
                    <p>

                        {!! $trip->trip_album_details !!}
                    </p>

                    <?php
                    use Illuminate\Support\Facades\URL;
                    $url = URL::to('/trip-album/' . $trip->trip_album_id . "/" . getTitleToUrl($trip->trip_album_title));
                    ?>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" class="share"
                               onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('<?php echo $url ?>'),'facebook-share-dialog','width=626,height=436');return false;"><i
                                        class="icon-facebook-circled"></i></a>


                        </div>
                    </div>


                </div>
            </div>

            <aside class="col-lg-3">

                <div class="widget" id="cat_blog">
                    <h4>{{__('localize.recent_post')}}</h4>
                    <ul>

                        @foreach($trips as $trip)

                            <a href="/beauti-gram-album/{{$trip->trip_album_id}}/{{$trip->trip_album_title}}"><h6
                                        class="text-danger">{{$trip->trip_album_title}}</h6></a>

                        @endforeach



                    </ul>
                </div>
            </aside>
        </div>
    </div>


@stop
