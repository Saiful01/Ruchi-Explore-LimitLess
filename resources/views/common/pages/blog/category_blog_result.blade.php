@extends('layouts.common')

@section('title', $category_id)



@section('content')

    <div class="container margin_60">

        <div class="main_title">
            <h2>{{$category_id}}
                {{-- {{ __('localize.blogs')}}--}}

            </h2>
            <p class="pt-4" data-provide="markdown">{!! $blog_details->category_details  !!}</p>
            {{--  >      <p>--}}
            {{--            Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.--}}
            {{--        </p>--}}
        </div>

        <div class="row">
            @if(count($blogs)<=0)

                <div class="col-lg-9 mx-auto wow zoomIn" data-wow-delay="0.2s">
                    <div class="box_style_1">
                        {{ __('localize.no_blogs') }}
                    </div>

                </div>
            @endif
            <?php $i = 0;
            $j = 0;
            ?>
            @foreach($blogs as $blog)
                @php($i++)

                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.2s" >
                    <div class="feature_home" style="height: 470px">
                        <img src="{{'/images/blog/'.$blog->featured_image}}" height="250" class="card-img-top"
                             alt="..." style="max-height: 250px">

                        <div class="" style="padding-top: 10px">
                            <em class="fa fa-user fa-fw"></em>{{getNameFromId($blog->author_id)}}
                            <em class="fa fa-calendar fa-fw"></em> {{dateFormat($blog->created_at)}}
                        </div>

                        <h3 style="height: 65px"  class="card-title">{{$blog->blog_title}}</h3>
                        {{--    <p>
                                {!!html_entity_decode( getLimitedPostContent($blog->blog_details))!!}
                            </p>--}}
                        <a href="/blog/{{$blog->blog_id}}/{{getTitleToUrl($blog->blog_title)}}"
                           class="btn_1 ">{{__('localize.read_more')}}</a>
                    </div>
                </div>

                @if($i%3==0)
                    @php($j++)
                    @if(count($advertise)>0)
                        <div class="col-lg-12 wow zoomIn" data-wow-delay="0.2s">

                            @if($j==2 && count($advertise)>1)
                                <a href="/{{$advertise[1]->url}}">
                                    <img src="/images/advertise_image/{{$advertise[1]->advertise_image}}"
                                         class="img-thumbnail"
                                         width="100%"/>
                                </a>
                            @else
                                <a href="/{{$advertise[0]->url}}">
                                    <img src="/images/advertise_image/{{$advertise[0]->advertise_image}}"
                                         class="img-thumbnail" width="100%"/>
                                </a>
                            @endif


                        </div>
                    @endif
                @endif

            @endforeach

        </div>
        <!--End row -->


    </div>

@stop
