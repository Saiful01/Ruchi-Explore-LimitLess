@extends('layouts.common')

@section('title', $spot->spot_name)



@section('content')
    <style>
        img {
            max-width: 100%;
        }
    </style>

    <div class="container margin_60">
        <div class="row">

            <div class="col-lg-9 mx-auto">
                <div class="box_style_1">
                    <div class="post nopadding">
                        @if($spot->featured_image==null)
                            <img src="/template/img/blog-1.jpg" alt="Image" class="img-fluid">

                        @else
                            <img src="{{'/images/tourist_spot/'.$spot->featured_image}}" alt="Image" class="img-fluid" width="100%">
                        @endif
                        {{--            <img src="/template/img/blog-1.jpg" alt="Image" class="img-fluid">--}}
                        <div class="post_info clearfix">
                            <div class="post-left">
                                <ul>
                                    {{--<li><i class="icon-user"></i><a
                                            href="/blogs/author/{{$blog->id}}"><span>{{$blog->full_name}}</span></a>--}}
                                    <li><i class="icon-calendar-empty"></i>On <span>{{dateFormat($spot->created_at)}}</span></li>
                                    <li><i class="icon-inbox-alt"></i> {{($spot->en_name)}}<a href="#"></a>



                                    {{--<li><i class="icon-tags"></i>Tags <a href="#">Works</a> <a href="#">Personal</a>--}}
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <h2>{{$spot->spot_name}}</h2>
                        <p>

                            {!! $spot->spot_details !!}
                        </p>

                        <?php
                        use Illuminate\Support\Facades\URL;
                        $url = URL::to('/explore-bangladesh/' . $spot->spot_id . "/" . getTitleToUrl($spot->spot_name));
                        ?>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" class="share"
                                   onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('<?php echo $url ?>'),'facebook-share-dialog','width=626,height=436');return false;"><i
                                        class="icon-facebook-circled"></i></a>
                                <a href="#" class="share"
                                   onclick="window.open('https://twitter.com/intent/tweet?text='+'<?php echo $spot->spot_name?>'+'&url='+encodeURIComponent('<?php echo $url ?>'),'facebook-share-dialog','width=626,height=436');return false;"><i
                                        class="icon-twitter-circled"></i></a>
                                <!-- LinkedIn -->
                                <a href="#" class="share"
                                   onclick="window.open('mailto:?Subject='+'<?php echo $spot->spot_name?>'+'&Body='+encodeURIComponent('<?php echo $url ?>'));return false;"><i
                                        class="icon-mail-circled"></i></a>

                                <a href="#" class="share"
                                   onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url='+encodeURIComponent('<?php echo $url ?>'),'facebook-share-dialog','width=626,height=436');return false;"><i
                                        class="icon-linkedin-circled"></i></a>

                            </div>
                        </div>

                    </div>
                    <!-- end post -->
                </div>
                <!-- end box_style_1 -->




                <!-- End Comments -->


            </div>
            <!-- End col-md-8-->



        </div>
        <!-- End row-->
    </div>
@stop
