<div id="desktop"  class="container margin_60">
    <div class="main_title">

        <div class="row">

            <div class="col-md-6">
                <h2 class="pull-left" style="float: left">{{__('localize.travel')}}
                    {{__('localize.stories')}}</h2>
            </div>

            <div class="col-md-6">
                <h4><a href="/user/login" class="text-black-50"> <i class="icon-edit" aria-hidden="true"></i> WRITE YOUR
                        OWN STORIES</a></h4>
            </div>


        </div>

        {{--<p hidden>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>--}}
    </div>

    <div class="row">

        @foreach($blogs as $blog)
            <div class="col-lg-6 col-12 wow zoomIn" data-wow-delay="0.2s " style="max-height: 230px;">
                <a class="box_news" href="/blog/{{$blog->blog_id}}/{{str_replace(" ","-","$blog->blog_title")}}">
                    <?php

                    $date = getonlyDate($blog->created_at);
                    $month = getonlyMonth($blog->created_at);

                    ?>

                    <figure><img src="{{'/images/blog/'.$blog->featured_image}}" width="100%" alt="">
                        <figcaption><strong>{{$date}}</strong>{{$month}}</figcaption>
                    </figure>


                    <ul>
                        <li>{{$blog->full_name}}</li>
                        <li>{{dateFormat($blog->created_at)}}</li>
                    </ul>
                    <h4>{{$blog->blog_title}}</h4>

                    <p>{!! getLimitedPostContent($blog->blog_details) !!}</p>


                </a>
            </div>
        @endforeach

    </div>
    <!-- /row -->
    <p class="btn_home_align"><a href="/blogs" class="btn_1 rounded">{{__('localize.view_all_news')}}</a></p>
</div>
<div id="mobile"  class="container margin_60">
    <div class="main_title">

        <div class="row">

            <div class="col-md-6">
                <h2 class="pull-left" style="float: left">{{__('localize.travel')}}
                    <span>{{__('localize.stories')}}</span></h2>
            </div>

            <div class="col-md-6">
                <h4><a href="/user/login" class="text-black-50"> <i class="icon-edit" aria-hidden="true"></i> WRITE YOUR
                        OWN STORIES</a></h4>
            </div>


        </div>

        {{--<p hidden>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>--}}
    </div>

    <div class="row">

        @foreach($blogs as $blog)
            <div class="col-lg-6 col-12 wow zoomIn" data-wow-delay="0.2s " >
                <a class="box_news" href="/blog/{{$blog->blog_id}}/{{str_replace(" ","-","$blog->blog_title")}}">
                    <?php

                    $date = getonlyDate($blog->created_at);
                    $month = getonlyMonth($blog->created_at);

                    ?>

                    <figure><img src="{{'/images/blog/'.$blog->featured_image}}" width="100%" alt="">
                        <figcaption><strong>{{$date}}</strong>{{$month}}</figcaption>
                    </figure>


                    <ul>
                        <li>{{$blog->full_name}}</li>
                        <li>{{dateFormat($blog->created_at)}}</li>
                    </ul>
                    <h4>{{$blog->blog_title}}</h4>

                    <p>{!! getLimitedPostContent($blog->blog_details) !!}</p>


                </a>
            </div>
        @endforeach

    </div>
    <!-- /row -->
    <p class="btn_home_align"><a href="/blogs" class="btn_1 rounded">{{__('localize.view_all_news')}}</a></p>
</div>


