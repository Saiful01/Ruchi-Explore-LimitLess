<aside class="col-lg-3 add_bottom_30">

{{--    <div class="widget">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
						<button class="btn btn-default" type="button" style="margin-left:0;"><i class="icon-search"></i></button>
						</span>
        </div>
        <!-- /input-group -->
    </div>
    <!-- End Search -->
    <hr>--}}
    <div class="widget" id="cat_blog">
        <h4>{{__('localize.blog_category')}}</h4>
        <ul>
            @foreach($categories as $category)
                <li><a href="/blogs/{{$category->blog_category_id}}/{{getTitleToUrl($category->en_name)}}">

                        @if(\Session::has('locale'))

                            @if(\Session::get('locale')=="bn")
                                {{$category->bn_name}}
                            @else
                                {{$category->en_name}}
                            @endif


                        @else
                            {{$category->en_name}}
                        @endif
                    </a></li>
            @endforeach
        </ul>
    </div>
    <!-- End widget -->

    <hr>

    <div class="widget">
        <h4>{{__('localize.recent_post')}}</h4>
        <ul class="recent_post">
            @foreach($posts as $post)
                <li>
                    <i class="icon-calendar-empty"></i> {{dateFormat($post->created_at)}}
                    <div><a href="/blog/{{$post->blog_id}}/{{getTitleToUrl($post->blog_title)}}">{{$post->blog_title}} </a>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>


</aside>
<!-- End aside -->
