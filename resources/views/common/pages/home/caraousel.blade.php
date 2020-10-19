<div id="carousel-home">
    <style>
        .my-btn{
            background: red;
        }
        .my-btn:hover{
            background: #000;
        }

        .ls-v5 .ls-bottom-slidebuttons, .ls-v5 .ls-nav-start, .ls-v5 .ls-nav-stop, .ls-v5 .ls-nav-sides {
            top: -30px;
            display: none;
        }
    </style>

    <div id="full-slider-wrapper">
        <div id="layerslider" style="width:100%;height:600px;rgba(0, 0, 0, 0.5); background: #000;">

        @foreach($slider as $slide )
            <!-- first slide -->
                <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:5;">
                    <img src="/template/img/slides/{{$slide->slider_name}}" class="ls-bg" alt="Slide background">
                    <h3 class="ls-l slide_typo" style="top: 45%; left: 50%; font-size: 50px;font-family: Sans-serif;"
                        data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">


                        @if (\Session::has('locale'))

                            @if(\Session::get('locale')=="en")
                                {{$slide->en_title}}
                            @else
                                {{$slide->bn_title}}
                            @endif
                        @else
                            {{$slide->en_title}}
                        @endif


                    </h3>
                    <p class="ls-l slide_typo_2" style="top:52%; left:50%;"
                       data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
                        {{$slide->en_sub_title}}
                    </p>
                    <a class="ls-l button_intro_2  my-btn p-2" style="top:370px; left:50%; white-space: nowrap; font-size: 30px"
                       data-ls="durationin:2000;delayin:1400;easingin:easeOutElastic;" href='{{$slide->url}}'>CLICK FOR MORE</a>
                </div>
            @endforeach

        </div>
    </div>

    {{--    @if(count($slider)>2)
            <div class="owl-carousel owl-theme">
                <div class="owl-slide cover" style="background-image: url(/template/img/slides/slide_home_3.jpg);">
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <div class="container">
                            <div class="row justify-content-center justify-content-md-start">
                                <div class="col-lg-12 static">
                                    <div class="slide-text text-center white">
                                        @if (\Session::has('locale'))

                                            @if(\Session::get('locale')=="en")
                                                <h2 class="owl-slide-animated owl-slide-title">{{$slider[0]->en_title}}
                                                </h2>
                                            @else
                                                <h2 class="owl-slide-animated owl-slide-title">{{$slider[0]->bn_title}}</h2>
                                            @endif
                                        @else
                                            <h2 class="owl-slide-animated owl-slide-title">{{$slider[0]->en_title}}
                                                @endif

                                                @if (\Session::has('locale'))

                                                    @if(\Session::get('locale')=="en")
                                                        <p class="owl-slide-animated owl-slide-subtitle">
                                                            {{$slider[0]->en_sub_title}}
                                                        </p>
                                                    @else
                                                        <p class="owl-slide-animated owl-slide-subtitle">
                                                            {{$slider[0]->bn_sub_title}}
                                                        </p>
                                                        <h2 class="owl-slide-animated owl-slide-title">
                                                        </h2>
                                                    @endif
                                                @else
                                                    <p class="owl-slide-animated owl-slide-subtitle">
                                                        {{$slider[0]->en_sub_title}}
                                                    </p>

                                                @endif


                                                <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                                                                                 href="/"
                                                                                                 role="button">Read more</a>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/owl-slide-->
                <div class="owl-slide cover" style="background-image: url(/template/img/slides/slide_home_2.jpg);">
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                        <div class="container">
                            <div class="row justify-content-center justify-content-md-end">
                                <div class="col-lg-6 static">
                                    <div class="slide-text text-right white">
                                        @if (\Session::has('locale'))

                                            @if(\Session::get('locale')=="en")
                                                <h2 class="owl-slide-animated owl-slide-title">{{$slider[1]->en_title}}
                                                </h2>
                                            @else
                                                <h2 class="owl-slide-animated owl-slide-title">{{$slider[1]->bn_title}}
                                                </h2>
                                            @endif
                                        @else
                                            {{$slider[1]->en_title}}
                                        @endif
                                        @if (\Session::has('locale'))

                                            @if(\Session::get('locale')=="en")
                                                <p class="owl-slide-animated owl-slide-subtitle">
                                                    {{$slider[1]->en_sub_title}}
                                                </p>
                                            @else
                                                <p class="owl-slide-animated owl-slide-subtitle">
                                                    {{$slider[1]->bn_sub_title}}
                                                </p>
                                                <h2 class="owl-slide-animated owl-slide-title">
                                                </h2>
                                            @endif
                                        @else
                                            <p class="owl-slide-animated owl-slide-subtitle">
                                                {{$slider[1]->en_sub_title}}
                                            </p>

                                        @endif
                                        <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                                                                         href="/"
                                                                                         role="button">Read more</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/owl-slide-->
                <div class="owl-slide cover" style="background-image: url(/template/img/slides/slide_home_1.jpg);">
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <div class="container">
                            <div class="row justify-content-center justify-content-md-start">
                                <div class="col-lg-6 static">
                                    <div class="slide-text white">
                                        @if (\Session::has('locale'))

                                            @if(\Session::get('locale')=="en")
                                                <h2 class="owl-slide-animated owl-slide-title">{{$slider[2]->en_title}}
                                                </h2>
                                            @else
                                                <h2 class="owl-slide-animated owl-slide-title">{{$slider[2]->bn_title}}
                                                </h2>
                                            @endif
                                        @else
                                            {{$slider[2]->en_title}}
                                        @endif
                                        @if (\Session::has('locale'))

                                            @if(\Session::get('locale')=="en")
                                                <p class="owl-slide-animated owl-slide-subtitle">
                                                    {{$slider[2]->en_sub_title}}
                                                </p>
                                            @else
                                                <p class="owl-slide-animated owl-slide-subtitle">
                                                    {{$slider[2]->bn_sub_title}}
                                                </p>
                                                <h2 class="owl-slide-animated owl-slide-title">
                                                </h2>
                                            @endif
                                        @else
                                            <p class="owl-slide-animated owl-slide-subtitle">
                                                {{$slider[2]->en_sub_title}}
                                            </p>

                                        @endif
                                        <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                                                                         href="/"
                                                                                         role="button">Read more</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/owl-slide-->
            </div>
        @endif
        <div id="icon_drag_mobile"></div>--}}
</div>
<!--/carousel-->

