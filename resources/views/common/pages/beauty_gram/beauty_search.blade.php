@extends('layouts.beautigram')

@section('title', 'Blog Search')



@section('content')

    <div class="container margin_60">

        <div class="main_title">
            <h2>Search Result for {{$query}} </h2>
{{--            <p>--}}
{{--                Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.--}}
{{--            </p>--}}
        </div>

        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-lg-6 wow zoomIn" data-wow-delay="0.2s" >
                    <div class="feature_home">

                            <img src="{{'/images/blog/'.$blog->featured_image}}" class="card-img-top" alt="...">
                            <h3 class="card-title">{{$blog->blog_title}}</h3>
                            <p>

                                {!! getLimitedPostContent($blog->blog_details) !!}
                              {{--  {!! strip_tags(substr( $blog->blog_details,0,100)) !!}--}}
                            </p>
                            <a href="/blog/{{$blog->blog_id}}/{{getTitleToUrl($blog->blog_title)}}" class="btn_1 outline">Read more</a>

                    </div>
                </div>
            @endforeach

        </div>
        <!--End row -->


    </div>

@stop
