@extends('layouts.common')

@section('title', $video->video_title)
@section('description', $video->video_title)



@section('content')


    <div class="container margin_60" style="margin-top: 30px">
        <div class="row">

            <div class="col-lg-9">
                <div class="box_style_1">

                    @if($video->youtube_links != null)
                        <div class="col-sm-12">

                            <iframe class="youtube-details" height="488"
                                    src="https://www.youtube.com/embed/{{$video->youtube_links}}?autoplay=1"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>

                        </div>
                    @else

                        <video width="400" controls autoplay>
                            <source src="/images/video/{{$video->video}}" type="video/mp4">

                        </video>

                    @endif

                    <div class="post_info clearfix">
                        <div class="post-left">
                            <ul>
                                <li><i class="icon-user"></i><a
                                        href="/blogs/author/{{$video->id}}"><span>{{$video->full_name}}</span></a>
                                <li><i class="icon-calendar-empty"></i>On
                                    <span>{{ dateFormat($video->created_at) }}</span>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <h2>{{$video->video_title}}</h2>

                    <p>
                        {!! $video->video_details !!}
                    </p>


                    <?php
                    use Illuminate\Support\Facades\URL;

                    $url = URL::to('/video/details/' . $video->video_id . "/" . getTitleToUrl($video->video_title));
                    $twitter_message = $video->video_title;

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
                    <h4>{{__('localize.recent_video')}}</h4>
                    <ul>

                        @foreach($recents as $recent)

                            <a href="/beauty-gram/video-details/{{$recent->video_id}}/{{getTitleToUrl($recent->video_title)}}"><h6
                                    class="text-danger">{{$recent->video_title}}</h6></a>

                        @endforeach


                        {{-- @foreach($categories as $cat)
                             <li><a href="/catagory/{{$cat->id}}">{{$cat->category_name}}</a>
                             </li>
                         @endforeach--}}

                    </ul>
                </div>
            </aside>
        </div>
    </div>


@stop
