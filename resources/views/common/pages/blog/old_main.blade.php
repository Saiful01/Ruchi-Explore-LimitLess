<div class="col-lg-9">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{session('success')}}!</strong>
        </div>
    @endif
    @if(session('failed'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{session('failed')}}!</strong>
        </div>
    @endif
    <div class="box_style_1">
        <div class="post nopadding">
            <center>
                @if($blog->featured_image==null)
                    <img src="/template/img/blog-1.jpg" alt="Image" class="img-fluid">

                @else
                    <img src="{{'/images/blog/'.$blog->featured_image}}" alt="Image" class="img-fluid">
                @endif
            </center>
            {{--            <img src="/template/img/blog-1.jpg" alt="Image" class="img-fluid">--}}
            <div class="post_info clearfix">
                <div class="post-left">
                    <ul>
                        <li><i class="icon-user"></i><a
                                href="/blogs/author/{{$blog->id}}"><span>{{$blog->full_name}}</span></a>
                        <li><i class="icon-calendar-empty"></i>On <span>{{dateFormat($blog->created_at)}}</span></li>


                        {{--<li><i class="icon-tags"></i>Tags <a href="#">Works</a> <a href="#">Personal</a>--}}

                    </ul>
                </div>
                <div class="post-right"><i class="icon-comment"></i><a href="#">{{$comment_count}} </a>Comments</div>
            </div>
            <h2>{{$blog->blog_title}}</h2>
            <p>

                {!! $blog->blog_details !!}
            </p>

            <?php
            use Illuminate\Support\Facades\URL;
            $url = URL::to('/blog/' . $blog->blog_id . "/" . getTitleToUrl($blog->blog_title));
            $twitter_message = $blog->video_title;
            ?>

            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="share"
                       onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('<?php echo $url ?>'),'facebook-share-dialog','width=626,height=436');return false;"><i
                            class="icon-facebook-circled"></i></a>
                    <a href="#" class="share"
                       onclick="window.open('https://twitter.com/intent/tweet?text='+'<?php echo $blog->blog_title?>'+'&url='+encodeURIComponent('<?php echo $url ?>'),'facebook-share-dialog','width=626,height=436');return false;"><i
                            class="icon-twitter-circled"></i></a>
                    <!-- LinkedIn -->
                    <a href="#" class="share"
                       onclick="window.open('mailto:?Subject='+'<?php echo $blog->blog_title?>'+'&Body='+encodeURIComponent('<?php echo $url ?>'));return false;"><i
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

    <h4>{{$comment_count}} comments</h4>

    <div id="comments">
        <ol>
            @foreach($comments as $comment)
                <li>
                    <div class="avatar">
                        @if(Auth::check())
                            @if(Auth::user()->profile_pic!=null)
                                <a href="/blogs/author/{{$comment->id}}"><img
                                        src="/images/user/{{Auth::user()->profile_pic}}" alt="Image"
                                        style="width: 50px;height: 50px;"></a>
                            @else
                                <a href="/blogs/author/{{$comment->id}}"><img src="/images/user/user.jpg" alt="Image"
                                                                              style="width: 50px;height: 50px;"></a>
                            @endif
                        @endif
                    </div>
                    <div class="comment_right clearfix">
                        <div class="comment_info">
                            Posted by <a
                                href="/blogs/author/{{$comment->id}}">  {{$comment->full_name}}</a><span>|</span>{{ dateFormat($comment->created_at)  }}
                            {{-- <span>|</span><a
                                     href="#">Reply</a>--}}
                        </div>
                        <p>
                            {{$comment->comment}}
                        </p>
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
    <!-- End Comments -->

    <h4>Leave a comment</h4>
    @if(Auth::check())

        <form action="/blog/comment/store" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <input type="hidden" name="blog_post_id" value="{{$blog_post_id}}"/>
            <div class="form-group">
                        <textarea name="comment" class="form-control style_2" style="height:150px;"
                                  placeholder="Message" required></textarea>
            </div>
            <div class="form-group">
                <input type="reset" class="btn_1" value="Clear form"/>
                <input type="submit" class="btn_1" value="Post Comment"/>
            </div>
        </form>

    @else
        <a class="btn btn-success btn-sm" href="/login">Login To Comment</a>

    @endif
</div>
<!-- End col-md-8-->
