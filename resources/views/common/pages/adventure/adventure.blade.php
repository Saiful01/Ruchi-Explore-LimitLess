@extends('layouts.common')

@section('title', 'Adventure Trip')



@section('content')



    <div class="container margin_60">
        <div class="main_title">
            <h2><span>ADVENTURE</span> TRIPS</h2>
            <P class="text-justify pt-5 pb-3">If you have not sought out the unknown at least once in your lifetime, you
                have not lived, ever. They say adventures have, among others, one very special quality- It is something
                where we lose your mind just to find your soul. Magic happens when we become fearless in pursuit of
                something that sets our soul on fire. A bungee jump, a sky dive, or a simple jetski experience on the
                Cox&#8217;sBazaar coastline- these are the things that can give you stories to tell your grandchild.
                These will stay with you, motivating you, inspiring you to explore every inch of your wit and imprint
                memories for a lifetime. Whatever you do, experience such thrill at least once in your lifetime and let
                everyone know through your adventure writeup. To start you off, here are a few adventures worthy of a
                look-through.</P>
        </div>

        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-md-4 wow zoomIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: zoomIn;">
                <div class="tour_container">
                    <div class="img_container">
                        @if($blog->featured_image==null)
                            <img src="/images/blog/Bashbaria.jpg" width="100%" height="533" class="img-fluid" alt="Image">
                        @else

                            <img src="{{'/images/blog/'.$blog->featured_image}}" width="100%" height="800" alt="Image" class="img-fluid">
                        @endif

                    </div>
                    <div class="tour_title">
                        <h3 class="text-center"><strong>{{$blog->blog_title}}</strong></h3>
                     <div class="rating">

                        </div>
                        <!-- end rating -->

                    </div>
                </div>
                <!-- End box tour -->
            </div>
            <!-- End col-md-6 -->
            @endforeach

        </div>

    </div>



@stop
