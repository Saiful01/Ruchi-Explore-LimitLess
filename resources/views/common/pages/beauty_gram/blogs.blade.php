@extends('layouts.common')

@section('title', 'Blogs-Beutigram Ruchi')



@section('content')

    <div class="container margin_60">
        <div class="main_title">
            <h2>Blogs from Beautigram</h2>

        </div>


        <div class="row">


            @foreach($blogs as $blog)
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.2s">
                    <div class="feature_home">

                        <img src="{{'/images/blog/'.$blog->featured_image}}" class="card-img-top" alt="..."
                             height="200">
                        <h3 class="card-title">{{$blog->blog_title}}</h3>
                        <p>
                            {{--   {!!html_entity_decode( getLimitedPostContent($blog->blog_details))!!}--}}
                        </p>
                        <a href="/beauty-gram/blog/{{$blog->blog_id}}/{{getTitleToUrl($blog->blog_title)}}"
                           class="btn_1 outline">Read more</a>

                    </div>
                </div>
            @endforeach

        </div>
        {{$blogs->links()}}

    </div>









@stop
