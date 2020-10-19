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
                                        <li><i class="icon-calendar-empty"></i>On
                                            <span>{{dateFormat($blog->created_at)}}</span></li>


                                        {{--<li><i class="icon-tags"></i>Tags <a href="#">Works</a> <a href="#">Personal</a>--}}
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-right"><i class="icon-comment"></i><a href="#">{{$comment_count}} </a>Comments
                                </div>
                            </div>
                            <h2>{{$blog->blog_title}}</h2>
                            <p>

                                প্রথম যাত্রা শুরু টাঙ্গুয়ার উদ্দেশ্যে,হাওর এলাকায় অনেক আগে প্রবেশ করলেও মূল হাওরে তখনো
                                প্রবেশ করিনি আমরা,কয়েক ঘন্টা নিরবিচ্ছিন্ন যাত্রার পরে চোখে যেন কিছুটা দৃষ্টি বিভ্রম
                                দেখা
                                দিল। দৃষ্টি বিভ্রমই বটে, নাহলে দেশের সবচেয়ে সমতল এলাকা, মাইলের পর মাইলে হাওরের জলা,
                                এখানে
                                পাহাড় আসবে কোথা থেকে? চোখ ভালমত রগড়ে আবার তাকালাম, আরে পাহাড়ইতো! তাও চা বাগানের ছোট
                                খাট
                                টিলা নয় একবারে সুউচ্চ পাহাড়, অনেকটা টেকনাফ থেকে আরাকানের পাহাড় দেখতে যেমন লাগে সে রকম
                                পাহাড়শ্রেণী। হতবিহবল অবস্থা কাটালেন দলের একজন, অনেকটা ঘোষণা দেবার ভঙ্গীতে বললেন–
                                মেঘালয়!
                                মেঘালয়!!

                                তাই তো, আমরা এখন সীমান্তবর্তী এলাকায়, দূরে মেঘালয়ের পাহাড়শ্রেনী আবছাভাবে দেখা যাচ্ছে,
                                পাহাড়ের মাথায় মেঘ জমে আছে, দূর থেকে মনে হচ্ছে পেজাঁ তুলোর ভেলা ভীড় করে আছে,
                                সহযাত্রীদের
                                কেউ বলে উঠল যথার্থ নাম মেঘালয়- মেঘের আলয়।
                            </p>
                            <div class="img-thumbnail">
                                <img src="/images/blog/IMG_2846-1024x683.jpg" alt="Image" class="img-fluid">

                            </div>
                            <p>পথে পানাবিলে দেখা হল বিশ্বব্যপী বিপন্ন এবং মাছ ধরায় অপরিসীম দক্ষতার অধিকারী পাখি
                                মাছমুরালের সাথে, সে উড়ে এসেছে ইউরোপের কোন প্রান্ত থেকে, নাতিষীতোষ্ণ শীতের আশায়। এরকমই
                                এক বিশাল বিলের মাঝে ব্যতিক্রমী নীল ছোপ দেখা যেতেই সবার উৎসুক হয়ে নৌকা থামাল ,যা ভাবা
                                হয়েছে তাই, সুবিশাল জল-কাদাময় ভূ-খন্ডের এক কোণায় কয়েকশ পদ্ম নীল কালেম পাখির ঝাক।
                                মানুষের রসনা তৃপ্ত করতে করতে এদের অস্তিত্ব ধ্বংস প্রায়,বাংলার এইসব নির্জন বিরান
                                প্রান্তরেই আজ তাদের আস্তানা।

                                টাঙ্গুয়ার হাওরে যেখানে ফি বছর পাখি পর্যবেক্ষকেরা নৌকা থামিয়ে আস্তানা গাড়েন, সেখানে
                                নোঙ্গর ফেলার সাথে সাথেই কুরাঈগলের সাথে দেখা হল, কাছেই গাছের মাথায় তার বিশাল বাসা,
                                সেখানে ছানা লালন-পালন আর খাদ্য জোগাড়েই সে ব্যস্ত। এই প্যালাসাস ফিশ ঈগল বা পালাসি
                                কুরাঈগল বিশ্বের অন্যতম বিরল প্রজাতির শিকারী পাখি, আই ইউ সি এন কতৃক প্রনীত সমস্ত বিশ্বের
                                প্রায় বিলুপ্ত পাখিদের তালিকা রেড বুকে এদের নাম আছে।</p>
                            <div class="img-thumbnail">
                                <img src="/images/blog/IMG_2459-1024x683.jpg" alt="Image" class="img-fluid">

                            </div>
                            <p>বাসোপযোগী গাছ এবং খাদ্যের উৎস জলাভূমি ধ্বংসের কারণে এদের একসময় বাংলাদেশের হাওর প্রধান
                                সমস্ত এলাকায় ও সুন্দরবনে দেখা গেলেও এখন প্রধানত সুনামগন্জেই দেখা যায়। এরা মৎস্যভোজী।
                                পালাসি কুরাঈগলের ওড়ার ভঙ্গী সত্যিকার অর্থেই রাজকীয়, বিশাল ডানার বিস্তার, কালো লেজের
                                ঠিক মাঝখানের সাদা পালকের সারি লেজকে তিনরঙ্গা পতাকায় পরিণত করেছে(তা উড়ন্ত অবস্থায়
                                চিন্থিত করতেও সুবিধাজনক), আর পাখা সঞ্চালনের ভঙ্গী এর ওড়াকে এছে সুষমামন্ডিত।

                                পাখিঅন্তপ্রাণ ইনাম ভাই তখনি ভিডিও ক্যামেরা হাতে সেই অপরূপা ঈগলকে ফ্রেম বন্ধী করতে গেলেন,
                                সারাদিনের ভ্রমণ শেষেও আশ্চর্য রকমের প্রাণবন্ত এই কাজপাগল মানুষটি! আমরা তখন আগামীকদিনের
                                আবাসটি দেখে নেওয়ার সাথে সাথে মাঝির তৈরী চায়ের অপেক্ষারত।</p>
                            <div class="img-thumbnail">
                                <img src="/images/blog/IMG_2371-1024x683.jpg" alt="Image" class="img-fluid">

                            </div>
                            <p>পরদিন সাতসকালে উঠেই যাত্রার তোড়জোড়, বড় ট্রলার বা বজরাটি নোঙ্গররত, অপেক্ষাকৃত ছোট এক
                                নৌকা আনা হল যাতে আমরা টেলিস্কোপ, ভিডিও ক্যামেরাসহ সারাদিন হাওরে পাখি গণনার কাজ করব।
                                বিশাল বিস্তীর্ণ টাঙ্গুয়ার হাওর, যে দিকেই তাকায় থৈ থৈ পানি, অনেক জায়গা থেকেই কিনারা
                                দেখা যায় না, তার মধ্যে একরত্তি নৌকোয় আমরা কজন প্রকৃতিপ্রেমিক, খানিকপরেই হাঁসের দলের
                                সন্ধান পাওয়া গেল।

                                দেশী মেটেহাঁস, নীলমাথা হাঁস, খুন্তেহাঁস,গিরিয়া হাঁসের দল খাবারের সন্ধানে চরতে
                                বেরিয়েছে, আহ, কি অপরূপ সৌন্দর্য তাদের, তেল চকচকে ভেজা শরীরে সূর্যের আলো যেন ঠিকরে
                                পরছে,কিছু মানুষ কেমন করে পারে এই পাখিগুলোকে গুলি করতে?

                                সুদর্শন পাখি নেউ পিপির (যাদের অনেকেই লম্বা লেজের কারণে জলময়ূর বলে) দল ভেচ্ছে যাচ্ছে নল
                                খাগড়ার বনে, হঠাৎ-ই হাওরের এমন এক জায়গায় হাজির হলাম আমরা যেখানে শুধু হাঁস আর হাঁস, জল
                                পর্যন্ত দেখা যাচ্ছে না থিকথিকে হাঁসের দঙ্গলের ভীড়ে! অনেকক্ষণ গণনার পর জানা গেল প্রায়
                                দেড়লক্ষ হাঁস আছে সেই এক জায়গাতেই, তাদের ফাঁকে ফাঁকে কিছু বড় খোঁপা ডুবুরি ইতস্ততঃ মাছ
                                শিকারে ব্যস্ত। আমরা বেশ দূরে অবস্থান করে টেলিস্কোপের সাহায্যে গুনছিলাম বলে পাখির দলে তা
                                কোন আলোড়নের সৃষ্টি করেনি, কিন্তু হঠাৎই এমন এক অভূতপূর্ব দৃশ্যের অবতারণা ঘটল, যা
                                চর্মচক্ষে দেখার সৌভাগ্য খুব মানুষের হয়েছে বলেই আমার বিশ্বাস!

                                একেবারে কোন রকম জানান না দিয়েই দেখি মহাকাশের উল্কার মত সেই বিশাল হাঁসের ঝাকের উপরে দুই
                                দিক থেকে দুইটি পৃথিবী সবচেয়ে দ্রুতগতির প্রাণী (জলচর, স্থলচর, খেঁচর মিলিয়ে) পেরিগ্রিন
                                শাহিন ( পেরিগ্রিন ফ্যালকন) তীব্রগতিতে ধেয়ে আসছে, যা সেই ভাসমান পাখিগুলোর কাছে মূর্তীমান
                                বিভীষিকা, যেকোনটার প্রাণ তখন সুতোর উপর ঝুলছে, প্রাণ ভয়ে দেড়লক্ষ হাঁস একসাথে সপাটে ডানা
                                ঝাপটিয়ে উড়াল দেয়ার মাধ্যমে যে স্বর্গীয় দৃশ্যের অবতারণা করল তাতে এক মূহুর্তের জন্য
                                হলেও গোটা আকাশ যেন ঢেকে গেল সেই ঝাকে, এই দৃশ্য মহাকবি কালিদাস দেখতে হয়ত হংসবধ্য কাব্য
                                লিখে ফেলতেন, আমরা বেরসিকের দল কেমন স্থাণু ভাবে দাড়িয়ে সেই সৌন্দর্যসুধা উপভোগ করতে
                                থাকলাম।</p>
                            <div class="img-thumbnail">
                                <img src="/images/blog/IMG_1984-1024x683.jpg" alt="Image" class="img-fluid">

                            </div>
                            <p>দুপুরে খানিকপরে ফেরার পথে জেলেদের মাছধরার বাঁশ ফাদের উপরে কুচকুচে কালো পানকৌড়ির ঝাকের
                                ভিতরে বিশ্বের অন্যতম বিরল পাখি সাপপাখি বা উদয়ী গয়ারের দেখাও মিলল, টাঙ্গুয়ার এই হাওরটি
                                যে জীববৈচিত্রে কত সম্পদশালী!

                                ইনাম ভাইয়ের কাছেই জানা গেল, এই বিশাল হাওড়ের জীববৈচিত্র রক্ষার জন্য প্রতিদিন কয়েক
                                হাজার টন ইউরিয়া সারের প্রয়োজন হত, যা বাংলাদেশে কখনোই সম্ভব হত না, কিন্তু এই বিশাল
                                হাঁসের ঝাঁকের বিষ্ঠা সেই প্রয়োজনীয় পুষ্টির জোগাড় দেয়!

                                টাঙ্গুয়ার চিত্তহরণকারী সূর্যাস্তের কথা আর নাই বা বলি, সে কেবলমাত্র চোখে দেখার জিনিস এবং
                                অনুভবের জিনিস। সন্ধ্যার বেশ খানিক পর ফিরে আসার সময় দেখি আমান ভাই ছইয়ের পাশে আরাম করে
                                চন্দ্রাহত মানুষের মত বসে আছে, শুধু বললেন-, ভাই, সূর্য ডোবার সময়টাতে ঈগলটাকে দেখলাম
                                দারুণ ভাবে উড়ে এসে বাড়ীতে বসল, আহা, বুকটা ভরে গেছে! এ জীবন সার্থক!!

                                দেখা মিলল উত্তুরে ল্যান্জাহাঁস, ইউরেশীয় সিথীহাঁস, গাডওয়াল হাঁস, দেশী মেটেহাঁস লালঝুটি
                                ভুতিহাঁসের বিশাল ঝাকের। উল্লেখ্য রামসার সাইট ঘোষিত এই হাওরে ২৬ প্রজাতির হাঁস এ পর্যন্ত
                                দেখা গেছে, এমনকি সুদূর চীন থেকে আসা মান্দারিন হাঁস পর্যন্ত। শেষমেষ প্রায় তিন লক্ষ হাঁস
                                গুনলাম আমরা, এই হাঁসগুলোর বিষ্ঠা সার হিসেবে এই বিশাল জীববৈচিত্রকে রক্ষা করতে মূল ভমিকা
                                পালন করছে।

                                পাখিশুমারি শেষে ফেরার পথে, দূরে নদী বাঁকে মনে হল গাছে গাছে সাদা বিশাল আকৃতির সব ফুল ফুটে
                                আছে, এত বড় কোন ফুল হতে পারে? সাত-পাঁচ ভেবে কাছে যেতেই টাঙ্গুয়ার আরেকটি জাদুকরী দৃশ্য
                                দেখা গেল- নদীর ধারে দেশ কিছু গাছ আলো করে নানা ধরনের বক ধ্যানে মগ্ন, এগুলো তাদের
                                রাত্রিকালীন আবাস, আহা পুরাণে স্বর্গের বর্ণনা বুঝি এমনটাই হয়!

                                টাঙ্গুয়ার হাওড় আমার কাছে পৃথিবীর শেষ স্বর্গের নাম, আর এখানের প্রথম ভ্রমণটি তাই এখনো
                                মনের মুকুরে জ্বলজ্বল করে।</p>
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

            @include('common.pages.blog.sidebar')


                        </div>
                        <!-- End row-->
                    </div>
@stop
