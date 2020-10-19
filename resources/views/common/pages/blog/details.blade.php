@extends('layouts.common')

@section('title', $blog->blog_title)
@section('description', $blog->blog_details)
@section('thumbnail',URL::to('/').'/images/blog/'.$blog->featured_image)


@section('content')
    <style>
        img {
            max-width: 100%;
        }
    </style>
    <div class="container margin_60" style="margin-top: 30px">

        <div class="row">

            @include('common.pages.blog.main_blog')
            @include('common.pages.blog.sidebar')


        </div>
        <!-- End row-->
    </div>
@stop
