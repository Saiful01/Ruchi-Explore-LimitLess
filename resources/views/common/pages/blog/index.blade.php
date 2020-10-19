@extends('layouts.common')

@section('title', 'Tourist Spots')



@section('content')

    <div class="container margin_60">
        <div class="row">


            <div class="col-lg-9">
                <div class="box_style_1">
                    @foreach($blogs as $blog)
                        <div class="post nopadding">

                            @if($blog->featured_image==null)
                                <img src="/images/blog/$blog->featured_image" alt="Image" class="img-fluid">
                            @else

                                <img src="{{'/images/blog/'.$blog->featured_image}}" alt="Image" class="img-fluid">
                            @endif


                            <div class="post_info clearfix">
                                <div class="post-left">
                                    <ul>
                                        <li><i class="icon-calendar-empty"></i>On
                                            <span>{{dateFormat($blog->created_at)}}</span>
                                        </li>

                                    </ul>
                                </div>

                            </div>
                            <a href="/blog/{{$blog->blog_id}}"><h2>{{$blog->blog_title}}</h2></a>

                         {{--   <p>{!! substr( $blog->blog_details,0,500) !!}</p>--}}
                            <p> {!! getLimitedPostContent($blog->blog_details) !!}</p>
                            <a href="/blog/{{$blog->blog_id}}/{{str_replace(" ","-","$blog->blog_title")}}"
                               class="btn_1">{{__('localize.read_more')}}</a>


                        </div>
                        <!-- end post -->


                        <hr>
                    @endforeach
                    {{$blogs->links()}}
                </div>


                <!-- end pagination-->


                <!-- End col -->
            </div>

            <aside class="col-lg-3">
                <form method="get" action="/search">
                    <div class="widget">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="{{__('localize.search')}}"
                                   id="query" value="{{request()->input('query')}}" required>
                            <span class="input-group-btn">
						<button class="btn btn-default" type="submit" style="margin-left:0;"><i class="icon-search"></i></button>

						</span>
                        </div>
                        <!-- /input-group -->
                    </div>
                </form>

                <!-- End Search -->
                <hr>
                <div class="widget" id="cat_blog">
                    <h4>{{__('localize.blog_category')}}</h4>
                    <ul>
                        @foreach($categories as $category)


                            @if(\Session::has('locale'))

                                @if(\Session::get('locale')=="bn")

                                    <li><a href="/blogs/{{$category->blog_category_id}}/{{getTitleToUrl($category->en_name)}}"> {{$category->bn_name}}</a>
                                    </li>
                                @else
                                    <li><a href="/blogs/{{$category->blog_category_id}}/{{getTitleToUrl($category->en_name)}}"> {{$category->en_name}}</a>
                                    </li>
                                @endif

                            @else
                                <li><a href="/blogs/{{$category->blog_category_id}}/{{getTitleToUrl($category->en_name)}}"> {{$category->en_name}}</a></li>
                            @endif
                        @endforeach

                    </ul>
                </div>
                <!-- End widget -->

                <hr>

                <div class="widget">
                    <h4>{{__('localize.recent_post')}}</h4>
                    <ul class="recent_post">
                        @foreach($blogs as $blog)
                            <li class="wow zoomIn" data-wow-delay="0.2s">
                                <i class="icon-calendar-empty"></i> {{$blog->created_at}}
                                <div>
                                    <a href="/blog/{{$blog->blog_id}}/{{str_replace(" ","-","$blog->blog_title")}}">{{$blog->blog_title}} </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- End widget -->
                <hr>

                <!-- End widget -->

            </aside>
            <!-- End aside -->

        </div>
        <!-- End row-->
    </div>
    <!-- End container -->

@endsection
