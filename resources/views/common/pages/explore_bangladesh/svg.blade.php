<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,shrink-to-fit=no">
    <meta name="description"
          content="">
    <meta name="author" content="PIXONLAB">
    <title>Map</title>

    <meta name="description" content="@yield('description')">

{{--    For Facebook--}}
<!--for fb -->
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:site_name" content="Explore Limitless"/>
    <meta property="og:description" content=""/>

    <meta property="og:type" content="article"/>
    <!--<meta property="article:author" content="[author_link]" />-->

    {{--   <meta property="og:url" content="https://www.prothomalo.com/economy/article/1659844" />--}}

    <meta property="og:image" content="@yield('thumbnail')"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>

{{--    For Facebook--}}

<!-- Favicons-->
    <link rel="shortcut icon" href="/template/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="/template/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
          href="/template/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="/template/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="/template/img/apple-touch-icon-144x144-precomposed.png">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="/asset/css/plugins/summernote/summernote-bs4.css" rel="stylesheet">


    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Montserrat:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;469;500;600;700&display=swap"
          rel="stylesheet">

    <!-- COMMON CSS -->
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/style.css" rel="stylesheet">
    <link href="/template/css/vendors.css" rel="stylesheet">

    <!-- ALTERNATIVE COLORS CSS -->
    <link href="#" id="colors" rel="stylesheet">

    <!-- CUSTOM CSS -->
    <link href="/template/css/custom.css" rel="stylesheet">
    <link href="/template/css/blog.css" rel="stylesheet">
    <link href="/template/css/admin.css" rel="stylesheet">
    <link href="/template/css/shop.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <style>

        .blank_padding {
            padding-top: 75px;
        }

        body {
            font-size: 15px;
        }

        p {
            font-size: 17px !important;
        }

        iframe, video {
            position: relative;
        }

        iframe {
            height: 400px;
            width: 100%;
        }

        #logo_home h1 a, header#colored #logo_home h1 a, header#plain #logo_home h1 a, header.sticky #logo_home h1 a {
            height: 50px;
            background-size: 163px 50px;

        }

        .share {
            font-size: 30px;
        }

        .rounded-circle {
            height: 100px;
            width: 100px;
        }

        p {
            color: #373232;
        }

        .mobile-logo {
            height: 69px;
            width: 110px;
            margin: -25px;
        }

        @media (max-width: 480px) {
            .icon_search {
                padding-right: 10px;
            }

            .mobile-logo {
                height: 79px !important;
                margin: 0px !important;
            }

            #logo_home h1 a, header#colored #logo_home h1 a, header#plain #logo_home h1 a, header.sticky #logo_home h1 a {

                margin-top: -13px;
            }

            header.sticky {

                height: 50px;
            }

        }

        @media only screen and (min-device-width: 768px) {
            #logo_home h1 a, header#colored #logo_home h1 a, header#plain #logo_home h1 a, header.sticky #logo_home h1 a {
                width: auto;
                height: 65px;
                display: block;
                background-repeat: no-repeat;
                background-position: left top;
                background-size: contain;
                text-indent: -9999px;
            }

            .img_list img {
                left: 47%;
            }
        }

        .btn_1, a.btn_1 {
            background: #005F29;
        }

        body, p, h1, h2, h3, h4, h6, span {
            font-family: 'Oswald', sans-serif;
        }

        .img_list img {
            left: 17%;
        }

        .owl-theme.list_carousel .owl-next i:hover, .owl-theme.list_carousel .owl-prev i:hover {
            color: #F09723;
        }

        .owl-theme.list_carousel .owl-next i:hover, .owl-theme.list_carousel .owl-prev i:hover {
            color: #f36b20;
        }


        #vmap {
            /*   width: 100%;*/
            height: 500px;
        }

        svg {
            touch-action: none;
            margin-left: -83px;
            margin-top: 11px;
        }
        svg{
       /*     width: 800px;
            margin-left: -178px;
            margin-top: 75px;*/
           /* margin-left: -75px;*/
        }
    </style>

    <script>
        var app = angular.module('ruchiApp', []);

        console.log("My App Initiated")
        /*  app.controller('parcelController', function ($scope, $http) {

              $http.get("/angular")
                  .then(function (response) {
                      // $scope.myWelcome = response.data;
                      console.log(response.data);
                      $scope.parcels = response.data;
                      //$scope.delivery_charge=response.data.charge
                  });
              // console.log(parcel_type);

              /!*function parcelTypeChange(){

                  console.log($scope.my_parcel);
              }*!/


          });*/

    </script>

</head>

<body ng-app="ruchiApp">

{{--<div id="preloader">
    <div class="sk-spinner sk-spinner-wave">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div>--}}
<!-- End Preload -->

<div class="layer"></div>
<!-- Mobile menu overlay mask -->

<!-- Header Plain:  add the id plain to header and change logo.png to logo_sticky.png ======================= -->
<header id="plain">
    <div id="top_line">
        <div class="container">
            <div class="row">
                @include('includes.common.top_header')
            </div><!-- End row -->
        </div><!-- End container-->
    </div><!-- End top line-->

    <div class="container">
        <div class="row">

            @include('includes.common.header')

        </div>
    </div><!-- container -->
</header><!-- End Header -->

<main class="blank_padding">
    <div class=" margin_60">
    <div class="row">

        <aside class="col-lg-3  wow zoomIn" data-wow-delay="0.2s">
            <p>
                <a class="btn_map" href="/explore-bangladesh">View
                    on map</a>
            </p>

            <div class="box_style_cat">
                <ul id="cat_nav">
                    {{--@foreach($categories as $category)
                        <li onclick="myFunction({{$category->spot_category_id}})"><a href="#"><i
                                        class="icon_set_1_icon-3"></i>{{$category->en_name}}
                               --}}{{-- <span>(20)</span>--}}{{--</a>
                        </li>
                    @endforeach--}}

                    <li onclick="myFunction(4)"><a href="#"><i
                                    class="icon_set_1_icon-3"></i>Explore Bangladesh
                            {{-- <span>(20)</span>--}}</a>
                    </li>

                    <li onclick="myFunction(1)"><a href="#"><i
                                    class="icon_set_1_icon-3"></i>Festival
                            {{-- <span>(20)</span>--}}</a>
                    </li>
                    <li onclick="myFunction(2)"><a href="#"><i
                                    class="icon_set_1_icon-3"></i>Forest
                            {{-- <span>(20)</span>--}}</a>
                    </li>
                    <li onclick="myFunction(3)"><a href="#"><i
                                    class="icon_set_1_icon-3"></i>Heritage
                            {{-- <span>(20)</span>--}}</a>
                    </li>

                </ul>
            </div>


        </aside>


        <aside class="col-lg-6 mx-auto  wow zoomIn" data-wow-delay="0.2s">

            <div id="vmap"></div>

        </aside>
        <div class="col-md-3 box_style_1 wow zoomIn" data-wow-delay="0.4s"
             style="max-height: 450px;  overflow-x: scroll;">


            <div id="map_text">
                <h4>Explorer Bangladesh</h4>
                <br>
                “I HAVE FOUND ADVENTURE IN FLYING, IN WORLD TRAVEL, IN BUSINESS, AND EVEN CLOSE AT HAND…
                ADVENTURE IS A STATE OF MIND- AND SPIRIT,
                <br>
                -Jacqueline Cochran


            </div>


            <div id="forest">
                <h4><strong>বন</strong></h4>

                <div id="forest1" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">

                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#forest2" href="#collapseOne_forest2" aria-expanded="false">
                                    <div class="headliness">
                                        সুন্দরবন
                                    </div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>


                        </div>
                        <div id="collapseOne_forest1" class="collapse" data-parent="#forest1" style="">
                            <div class="card-body">

                                বাংলাদেশের খুলনা, সাতক্ষীরা ও বাগেরহাট জেলা জুড়ে অবস্থিত পৃথিবীর সবচেয়ে বড়
                                ম্যানগ্রোভ বন
                                সুন্দরবন। আয়তনে ১০ হাজার বর্গ কিলোমিটার, যার ৬০১৭ বর্গ কিলোমিটার বাংলাদেশের অংশে
                                অবস্থিত,
                                বাদবাকি অংশ ভারতের অন্তর্গত। প্রকৃতির অপার বিস্ময় এই বন ১৯৯৭ সালে ইউনেস্কো
                                কর্তৃক বিশ্ব
                                ঐতিহ্যবাহী স্থান এর স্বীকৃতি পায়।
                            </div>
                        </div>
                    </div>
                </div>

                <div id="forest2" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#forest2" href="#collapseOne_forest2" aria-expanded="false">
                                    <div class="headliness">
                                        রেমা কালেঙ্গাঃ
                                    </div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_forest2" class="collapse" data-parent="#forest2" style="">
                            <div class="card-body">
                                রেমা কালেঙ্গা বন্যপ্রাণ অভয়ারণ্য দেশের সংরক্ষিত বনাঞ্চলের মাঝে অন্যতম।
                                সুন্দরবনের পর দেশের
                                সবচেয়ে বড় প্রাকৃতিক বনভূমি রেমা কালেঙ্গা। সিলেট বিভাগের হবিগঞ্জ জেলার চুনারুঘাট
                                উপজেলার
                                অন্তর্গত
                                এই অভয়ারণ্য প্রতিষ্ঠা করা হয় ১৯৮২ সালে।
                            </div>
                        </div>
                    </div>
                </div>

                <div id="forset3" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#forset3" href="#collapseOne_forset3" aria-expanded="false">
                                    <div class="headliness"> লাউয়াছড়া জাতীয় উদ্যানঃ</div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_forset3" class="collapse" data-parent="#forset3" style="">
                            <div class="card-body">
                                বাংলাদেশের চিরহরিৎ বনের সংরক্ষিত বনাঞ্চল লাউয়াছড়া জাতীয় উদ্যান। মৌলভীবাজার জেলার
                                কমলগঞ্জ
                                উপজেলায়
                                এর অবস্থান। ১২৫০ হেক্টর আয়তনের এই উদ্যান জীববৈচিত্র‍্যে ভরপুর। ১৯৯৭ সালে
                                লাউয়াছড়াকে জাতীয়
                                উদ্যান
                                ঘোষণা করা হয়। বিলুপ্তপ্রায় উল্লুক সহ মুখপোড়া হনুমান, বানর, শেয়াল, মেছোবাঘ, ভালুক
                                ও মায়া
                                হরিণের
                                আবাসস্থল লাউয়াছড়া।
                            </div>
                        </div>
                    </div>
                </div>


                <div id="forest4" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#forest4" href="#collapseOne_forest4" aria-expanded="false">
                                    <div class="headliness"> সাতছড়ি জাতীয় উদ্যানঃ</div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_forest4" class="collapse" data-parent="#forest4" style="">
                            <div class="card-body">
                                বাংলাদেশের অন্যতম প্রাকৃতিক উদ্যান সাতছড়ি প্রাকৃতিক উদ্যান। ২৪৩ হেক্টর আয়তন
                                বিশিষ্ট এই
                                বনভূমি
                                ২০০৫ খ্রিষ্টাব্দে প্রতিষ্ঠা করা হয়। এর আগের নাম ছিলো রঘুনন্দন হিল রিজার্ভ
                                ফরেস্ট। ভেতরে
                                সাতটি
                                ছড়া থাকায় পরবর্তীতে এর নামকরণ হয় সাতছড়ি।
                            </div>
                        </div>
                    </div>
                </div>

                <div id="forest5" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#forest5" href="#collapseOne_forest5" aria-expanded="false">
                                    <div class="headliness"> দুধপুকুরিয়া- ধোপাছড়ি বন্যপ্রাণ অভয়ারণ্যঃ</div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_forest5" class="collapse" data-parent="#forest5" style="">
                            <div class="card-body">
                                এই বন্যপ্রাণ অভয়ারণ্য বাংলাদেশের চট্টগ্রাম জেলায় অবস্থিত। ২০১০ সালের ৬ এপ্রিল এর
                                উদবোধন করা
                                হয়।
                                এর আয়তন ৪৭১৬.৫৭ হেক্টর। বিভিন্ন প্রজাতির জীব জন্তুতে সমৃদ্ধ এই বন্যপ্রাণ
                                অভয়ারণ্য।
                            </div>
                        </div>
                    </div>
                </div>

                <div id="forest6" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#forest6" href="#collapseOne_forest6" aria-expanded="false">
                                    <div class="headliness">
                                        চুনতি বন্যপ্রাণ অভয়ারণ্যঃ
                                    </div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_forest6" class="collapse" data-parent="#forest6" style="">
                            <div class="card-body">
                                বাংলাদেশের সংরক্ষিত বনাঞ্চল ও অভয়ারণ্য। চট্টগ্রাম থেকে ৭০ কিলোমিটার দক্ষিণে
                                চট্টগ্রাম
                                কক্সবাজার
                                মহাসড়কের পাশে এর অবস্থান। এর আয়তন ৭৭৬৪ হেক্টর। প্রায় ১২০০ প্রজাতির উদ্ভিদ ও ১৭৮
                                প্রজাতির
                                জীবজন্তু ও পাখি নিয়ে এই বনাঞ্চল সমৃদ্ধ ।
                            </div>
                        </div>
                    </div>
                </div>


                <div id="forest7" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#forest7" href="#collapseOne_forest7" aria-expanded="false">
                                    <div class="headliness">
                                        টেকনাফ বন্যপ্রাণ অভয়ারণ্যঃ
                                    </div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_forest7" class="collapse" data-parent="#forest7" style="">
                            <div class="card-body">
                                বাংলাদেশের একমাত্র গেম রিজার্ভ বন। ১১,৬১৫ হেক্টর জায়গা নিয়ে প্রতিষ্ঠিত এই
                                অভয়ারণ্য বন্য
                                হাতির
                                আবাসস্থল বলে পরিচিত। ১৯৮৩ খ্রিষ্টাব্দে প্রতিষ্ঠা হয় এই বনাঞ্চলের। কক্সবাজার
                                জেলার টেকনাফে এর
                                অবস্থান। এর অভ্যন্তরে নাইটং পাহাড়, কুদুম গুহা, কুঠি পাহাড়, তৈঙ্গা চূড়াসহ বিভিন্ন
                                আকর্ষণীয়
                                স্থান
                                রয়েছে। এই অভয়ারণ্যের জীববৈচিত্র্য বাংলাদেশের মাঝে সর্বাধিক।
                            </div>
                        </div>
                    </div>
                </div>


                <div id="forest8" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#forest8" href="#collapseOne_forest8" aria-expanded="false">
                                    <div class="headliness">
                                        হিমছড়ি জাতীয় উদ্যানঃ
                                    </div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_forest8" class="collapse" data-parent="#forest8" style="">
                            <div class="card-body">
                                চট্টগ্রাম বিভাগের কক্সবাজার জেলার হিমছড়িতে এর অবস্থান। ১৯৮০ সালে প্রতিষ্ঠা করা
                                হয় এই
                                বনাঞ্চলের,
                                ১৭২৯ হেক্টর আয়তন বিশিষ্ট এই জাতীয় উদ্যান প্রতিষ্ঠিত হয় গবেষণা ও শিক্ষা, পর্যটন ও
                                বিনোদনকেন্দ্র
                                এবং বন্যপ্রাণী সংরক্ষণের জন্য।
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div id="festival">
                <h4><strong> উৎসব</strong></h4>


                <div id="festival1" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#festival1" href="#collapseOne_festival1" aria-expanded="false">
                                    <div class="headliness"> পহেলা বৈশাখ, মঙ্গল শোভাযাত্রাঃ</div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_festival1" class="collapse" data-parent="#festival1" style="">
                            <div class="card-body">
                                বাংলা পঞ্জিকা অনুসারে, বৈশাখের ১ তারিখ, বাঙালিদের সর্বজনীন লোকউৎসব পহেলা বৈশাখ
                                পালন করা হয়।
                                এই
                                দিনে শোভাযাত্রা, মেলা, পান্তাভাত খাওয়া, হালখাতা খোলা সহ বিভিন্ন কর্মকান্ড উদযাপন
                                করা হয়।
                                ঢাকা
                                বিশ্ববিদ্যালয়ের চারুকলা বিভাগ থেকে আয়োজন করা হয় মঙ্গল শোভাযাত্রা।
                            </div>
                        </div>
                    </div>
                </div>

                <div id="festival2" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#festival2" href="#collapseOne_festival2" aria-expanded="false">
                                    <div class="headliness"> সাকরাইনঃ</div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_festival2" class="collapse" data-parent="#festival2" style="">
                            <div class="card-body">
                                এই উৎসব মূলত পৌষসংক্রান্তি, যা ঘুড়ি উৎসব নামেও পরিচিত। সংস্কৃত শব্দ সংক্রান্তি
                                ঢাকাইয়া
                                অপভ্রংশে
                                সাকরাইন নাম নিয়েছে। পৌষ মাসের শেষদিন এই উৎসব পালন করা হয়। হাজারো মানুষের
                                উপস্থিতিতে পুরান
                                ঢাকার
                                এই উৎসব বর্ণিল হয়ে উঠে। সুপ্রাচীন এই উৎসব ঐক্য ও বন্ধুত্বের প্রতীক বলে বিবেচনা
                                করা হয়।
                            </div>
                        </div>
                    </div>
                </div>

                <div id="festival4" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#festival4" href="#collapseOne_festival4" aria-expanded="false">

                                    <div class="headliness">

                                        জব্বারের বলীখেলাঃ
                                    </div>

                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_festival4" class="collapse" data-parent="#festival4" style="">
                            <div class="card-body">
                                জব্বারের বলীখেলা এক বিশেষ ধরণের কুস্তি খেলা, যা চট্টগ্রামের লালদিঘী ময়দানে
                                প্রতিবছর ১২ই
                                বৈশাখ
                                অনুষ্ঠিত হয়। এই খেলায় অংশগ্রহণকারীদের বলা হয় বলী। ১৯০৯ সালে চট্টগ্রামের ধনাঢ্য
                                ব্যবসায়ী
                                আব্দুল
                                জব্বার সওদাগর এই খেলার আয়োজন করেন।
                            </div>
                        </div>
                    </div>
                </div>

                <div id="festival5" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#festival5" href="#collapseOne_festival5" aria-expanded="false">

                                    <div class="headliness"> বৈসাবি উৎসবঃ</div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_festival5" class="collapse" data-parent="#festival5" style="">
                            <div class="card-body">
                                পার্বত্য চট্টগ্রাম এলাকার প্রধান ৩ টি আদিবাসী সমাজের বর্ষবরণ উৎসব বৈসাবি।
                                ত্রিপুরাদের কাছে
                                বৈসু,
                                মারমাদের কাছে সাংগ্রাই, চাকমা ও তঞ্চঙ্গাদের কাছে বিজু নামে পরিচিত। বৈসাবি নামকরণ
                                হয়েছে এই
                                তিনটি
                                উৎসবের আদ্যক্ষরগুলো নিয়ে।
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div id="heritage">
                <h4><strong> ঐতিহ্যবাহী স্থান (Historic Places)</strong></h4>


                <div id="heritage1" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#heritage1" href="#collapseOne_heritage1" aria-expanded="false">

                                    <div class="headliness"> লালবাগ কেল্লা</div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_heritage1" class="collapse" data-parent="#heritage1" style="">
                            <div class="card-body">
                                ঢাকার দক্ষিণ- পশ্চিমাঞ্চলে বুড়িগঙ্গা নদীর তীরে অবস্থিত একটি মুঘল দুর্গের নাম
                                লালবাগ কেল্লা।
                                ১৬৭৮
                                সালে মুঘল সুবাদার মুহাম্মদ আজম শাহ এর নির্মাণকাজ শুরু করেন। মুঘল সুবাদার
                                শায়েস্তা খাঁ ১৬৮০
                                সালে
                                নির্মাণকাজ পুনরায় শুরু করেন, যদিও তা সমাপ্ত হয়নি। কেল্লার তিনটি স্থাপনার মধ্যে
                                একটি পরি
                                বিবির
                                সমাধি, শায়েস্তা খান তার কন্যার স্মরণে এই মাজার নির্মাণ করেন। ভেতরে আরও আছে তিন
                                গম্বুজ ওয়ালা
                                দুর্গ মসজিদ এবং দেওয়ান-ই-আম, যা কিনা মূলত সুবেদারদের বাস ভবন হিসেবে ব্যবহার করা
                                হতো।বর্তমানে
                                বাংলাদেশ প্রত্নতত্ত্ব অধিদপ্তরের আওতায় আছে দুর্গটি।
                            </div>
                        </div>
                    </div>
                </div>


                <div id="heritage2" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#heritage2" href="#collapseOne_heritage2" aria-expanded="false">

                                    <div class="headliness"> স্মৃতিসৌধঃ</div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_heritage2" class="collapse" data-parent="#heritage2" style="">
                            <div class="card-body">
                                বাংলাদেশের স্বাধীনতা যুদ্ধের শহিদদের স্মৃতির উদ্দেশ্যে নিবেদিত একটি স্মারক
                                স্থাপনা। এর নকশা
                                প্রণয়ন করেছেন স্থপতি সৈয়দ মাইনুল হোসেন। মুক্তিযুদ্ধে নিহতদের দশটি গণকবর আছে
                                অভ্যন্তরে। ১৯৭৮
                                সালে
                                এর নির্মাণকাজ শুরু হয়, সমাপ্ত হয় ১৯৮২ সালে। এখানে সাতটি ত্রিভুজাকৃতির মিনারের
                                শিখরের মাধ্যমে
                                বাংলাদেশের মুক্তি সংগ্রামের সাতটি পর্যায় নির্দেশ করা হয়। ১৯৫২'র ভাষা আন্দোলন,
                                ১৯৫৪'র
                                যুক্তফ্রন্ট
                                নির্বাচন, ১৯৫৬'র শাসনতন্ত্র আন্দোলন, ১৯৬২'র শিক্ষা আন্দোলন, ১৯৬৬'র ছয় দফা
                                আন্দোলন, ১৯৬৯'র গণ
                                অভ্যুত্থান এবং ১৯৭১'র মহান মুক্তিযুদ্ধ— এই সাতটি ঘটনাকে স্বাধীনতা আন্দোলনের
                                পরিক্রমা হিসেবে
                                দেখানো হয়েছে স্মৃতিসৌধের সাতটি মিনারের মাধ্যমে। মিনারটি ৪৫ মিটার উঁচু, আয়তন ৮৪
                                একর।
                                স্মৃতিসৌধ
                                প্রাঙ্গনে আরও রয়েছে উন্মুক্ত মঞ্চ, হেলিপ্যাড এবং ক্যাফেটেরিয়া।
                            </div>
                        </div>
                    </div>
                </div>


                <div id="heritage3" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#heritage3" href="#collapseOne_heritage3" aria-expanded="false">

                                    <div class="headliness"> কান্তজির মন্দিরঃ</div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_heritage3" class="collapse" data-parent="#heritage3" style="">
                            <div class="card-body">
                                বাংলাদেশের দিনাজপুরে অবস্থিত একটি প্রাচীন মন্দির কান্তজীউ বা কান্তজির মন্দির।
                                এটি নবরত্ন
                                মন্দির
                                নামেও পরিচিত কারণ তিনতলাবিশিষ্ট এই মন্দিরে নয়টি চূড়া বা রত্ন ছিলো। দিনাজপুরের
                                মহারাজা
                                প্রাণনাথ
                                রায় তার শেষ বয়সে মন্দিরের কাজ শুরু করেন, তার পোষ্যপুত্র মহারাজা রামনাথ রায় ১৭৫২
                                খ্রিস্টাব্দে
                                এটি
                                নির্মাণ সম্পন্ন করেন। ৭০ ফুট উচ্চতার এই মন্দিরের নয়টি চূড়া ১৮৯৭ খ্রিষ্টাব্দের
                                ভূমিকম্পে ভেঙে
                                যায়। এই মন্দিরের গায়ে পোড়ামাটির অলংকরণে ফুটিয়ে তোলা হয়েছে পৌরাণিক কাহিনিসমূহ।
                                বাংলাদেশের
                                সর্বোৎকৃষ্ট টেরাকোটা শিল্পের নিদর্শন এই মন্দির।
                            </div>
                        </div>
                    </div>
                </div>

                <div id="heritage4" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#heritage4" href="#collapseOne_heritage4" aria-expanded="false">

                                    <div class="headliness">
                                        ষাট গম্বুজ মসজিদঃ
                                    </div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_heritage4" class="collapse" data-parent="#heritage4" style="">
                            <div class="card-body">
                                বাংলাদেশের বাগেরহাট জেলায় অবস্থিত একটি প্রাচীন মসজিদ ষাট গম্বুজ মসজিদ। মসজিদের
                                গায়ে কোন
                                শিলালিপি
                                না থাকায় এর নির্মাতা সম্পর্কে জানা যায় না। স্থাপত্যশৈলী দেখে ধারণা করা হয় এটি
                                খান জাহান আলী
                                তৈরি
                                করেছিলেন, ১৫শ শতাব্দীতে। রাজমহল থেকে পাথর আনা হয়েছিলো এটি নির্মাণ করতে। ১৯৮৩
                                সালে ইউনেস্কো
                                এই
                                মসজিদকে বিশ্ব ঐতিহ্যবাহী স্থানের মর্যাদা দেয়।এই মসজিদে গম্বুজের সংখ্যা ৮১ টি,
                                কালের বিবর্তনে
                                ষাট
                                গম্বুজ লোকমুখে প্রচলিত হয়ে যায়। তুঘলকি ও জৌনপুরী নির্মানশৈলী এতে সুস্পষ্ট। কারও
                                কারও মতে,
                                খান-ই-জাহান এই মসজিদটিকে নামাজের কাজ ছাড়াও দরবার ঘর হিসেবে ব্যবহার করতেন। কেউ
                                কেউ বলেন,
                                মসজিদটি
                                মাদ্রাসা হিসেবেও ব্যবহৃত হতো।
                            </div>
                        </div>
                    </div>
                </div>


                <div id="heritage5" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#heritage5" href="#collapseOne_heritage5" aria-expanded="false">


                                    <div class="headliness">
                                        বায়তুল মোকাররম মসজিদঃ
                                    </div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_heritage5" class="collapse" data-parent="#heritage5" style="">
                            <div class="card-body">
                                বাংলাদেশের জাতীয় মসজিদ বায়তুল মোকাররম। ১৯৬৮ সালে এর নির্মাণকাজ সম্পন্ন হয়।
                                তৎকালীন
                                পাকিস্তানের
                                বিশিষ্ট শিল্পপতি লতিফ বাওয়ানি ও তার ভাতিজা ইয়াহিয়া বাওয়ানির উদ্যোগে এই মসজিদ
                                নির্মাণ করা হয়।
                                এখানে একসাথে ৪০ হাজার মুসল্লি নামাজ আদায় করতে পারে, ধারণক্ষমতার দিক দিয়ে এটি
                                পৃথিবীর ১০ম
                                বৃহত্তম
                                মসজিদ। এর আয়তন ২৬৯৪.১৯ বর্গ মিটার, উচ্চতা ৩০.১৮ মিটার। এর অবকাঠামো মক্কা শরীফের
                                কাবার মতো,
                                বিশাল
                                এলাকা জুড়ে বাগান এই সৌন্দর্যবর্ধন করেছে। ঢাকার পল্টনে অবস্থিত এই মসজিদটি ৮ তালা,
                                নিচতলায়
                                বিশাল
                                মার্কেট, দুইতালা থেকে ছয়তালা পর্যন্ত প্রতি তালায় নামাজ পড়া হয়।
                            </div>
                        </div>
                    </div>
                </div>


                <div id="heritage6" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#heritage6" href="#collapseOne_heritage6" aria-expanded="false">


                                    <div class="headliness">
                                        মহাস্থানগড়ঃ
                                    </div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_heritage6" class="collapse" data-parent="#heritage6" style="">
                            <div class="card-body">
                                বাংলাদেশের অন্যতম প্রাচীন পুরাকীর্তি মহাস্থানগড়। প্রসিদ্ধ এই নগরী ইতিহাসে
                                পুন্ড্রবর্ধন বা
                                পুন্ড্রনগর নামে পরিচিত ছিলো। যিশু খ্রিস্টের জন্মের ছয় হাজার বছর আগে এখানে সভ্যতা
                                গড়ে
                                উঠেছিলো, এক
                                সময় বাংলার রাজধানী ছিলো এই মহাস্থানগড়। ২০১৬ সালে এটি সার্কের রাজধানী হিসেবে
                                ঘোষণা হয়। কয়েক
                                শতাব্দী পর্যন্ত এ স্থান মৌর্য, গুপ্ত, পাল ও সেন শাসকবর্গের প্রাদেশিক রাজধানী
                                ছিলো। চীন ও
                                তিব্বত
                                থেকে ভিক্ষুরা তখন মহাস্থানগড় আসতেন লেখাপড়া করতে। বগুড়া জেলার শিবগঞ্জ উপজেলায়
                                মহাস্থানগড়ের
                                অবস্থান। ১৮০৮ সালে ফ্রান্সিস বুকানন হ্যামিলটন প্রথম মহাস্থানগড়ের অবস্থান চিহ্নিত
                                করেন। খোদার
                                পাথর ভিটা, মানকালীর ঢিবি, বৈরাগীর ভিটা, স্কন্ধের ধাপ, মঙ্গলকোট স্তুপ সহ বিভিন্ন
                                ঐতিহাসিক
                                নিদর্শন
                                মহাস্থানগড়ে ছড়িয়ে ছিটিয়ে আছে।
                            </div>
                        </div>
                    </div>
                </div>


                <div id="heritage7" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#heritage7" href="#collapseOne_heritage7" aria-expanded="false">


                                    <div class="headliness">
                                        বেহুলার বাসর ঘরঃ
                                    </div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_heritage7" class="collapse" data-parent="#heritage7" style="">
                            <div class="card-body">
                                বেহুলার বাসর ঘর ঐতিহাসিক মহাস্থানগড়ে অবস্থিত। মহাস্থানগড় বাসস্ট্যান্ড থেকে প্রায়
                                ২ কি.মি.
                                দক্ষিণ
                                পশ্চিমে একটি বৌদ্ধ স্তম্ভ রয়েছে যা সম্রাট অশোক নির্মাণ করেছুলেন বলে ধারণা করা
                                হয়। স্তম্ভের
                                উচ্চতা প্রায় ৪৫ ফুট, এর পূর্বার্ধে রয়েছে ২৪ কোণ বিশিষ্ট চৌবাচ্চা সদৃশ গোসলখানা।
                                এটি বেহুলার
                                বাসর
                                ঘর নামেই পরিচিত।
                            </div>
                        </div>
                    </div>
                </div>


                <div id="heritage7" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#heritage7" href="#collapseOne_heritage7" aria-expanded="false">


                                    <div class="headliness">
                                        মেজবানিঃ
                                    </div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_heritage7" class="collapse" data-parent="#heritage7" style="">
                            <div class="card-body">
                                মেজবান বাংলাদেশের চট্টগ্রাম অঞ্চলের বহুমাত্রিক ঐতিহ্যবাহী একটি ভোজের অনুষ্ঠান
                                চট্টগ্রামের আঞ্চলিক ভাষায় একে মেজ্জান বলা হয়। কারো মৃত্যুর পর কুলখানি,
                                মৃত্যুবার্ষিকী, শিশুর
                                জন্মের পর আকিকা, জন্মদিবস উপলক্ষে, ব্যক্তিগত সাফল্য, বিবাহ, খৎনা ও ধর্মীয়
                                ব্যক্তির
                                মৃত্যুবার্ষিকী উপলক্ষে মেজবানির আয়োজন করা হয়। এটি একটি ঐতিহ্যবাহী আঞ্চলিক উৎসব
                                যেখানে
                                অতিথীদের
                                সাদা ভাত এবং গরুর মাংস খাওয়ার জন্য আমন্ত্রণ জানানো হয়। বর্তমানে মেজবান
                                ঐতিহ্যবাহী খাবার
                                হিসেবে
                                প্রসিদ্ধি লাভ করেছে।
                            </div>
                        </div>
                    </div>
                </div>


                <div id="heritage7" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#heritage7" href="#collapseOne_heritage7" aria-expanded="false">

                                    <div class="headliness">
                                        রাজশাহী সিল্ক:

                                    </div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_heritage7" class="collapse" data-parent="#heritage7" style="">
                            <div class="card-body">
                                রাজশাহীর বিশেষ সূক্ষ ও নরম মোলায়েম আঁশ দিয়ে তৈরি রাজশাহী সিল্ক শাড়িতে জনপ্রিয়
                                একটি নাম।
                                রাজশাহীর
                                সিল্ক দিয়ে তৈরি শাড়ি এবং অন্যান্য পণ্যগুলো দেশ এবং দেশের বাইরে ব্যাপক জনপ্রিয়তা
                                অর্জন করেছে।
                                রাজশাহী রেশম শিল্পের বিকাশের জন্য সিল্ক গবেষণা ইন্সটিটিউট গড়ে তুলেছে। প্রায় ১০
                                হাজার মানুষ
                                প্রত্যক্ষ বা পরোক্ষভাবে এই শিল্পের সাথে জড়িত।
                            </div>
                        </div>
                    </div>
                </div>


                <div id="heritage7" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#heritage7" href="#collapseOne_heritage7" aria-expanded="false">

                                    <div class="headliness">
                                        চুই ঝালঃ
                                    </div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_heritage7" class="collapse" data-parent="#heritage7" style="">
                            <div class="card-body">
                                চুই ঝাল গাছ দেখতে পানের লতার মতো। পাতায় ঝাল নেই, কান্ড বা লতা কেটে ছোট টুকরা করে
                                মাছ-মাংস
                                রান্নায় ব্যবহার করা হয়। চুইয়ের নিজস্ব স্বাদ ও ঘ্রাণ আছে। গাছটির কাণ্ড বা লতা
                                মসলা হিসেবে
                                ব্যবহার
                                করা হয়। রান্নায় এর ঝাল খাবারের স্বাদ বাড়ায় কিন্তু শরীরের কোন ক্ষতি করে না।
                                বাংলাদেশের
                                দক্ষিণ-
                                পশ্চিমাঞ্চলে চুই ঝাল খুবই জনপ্রিয়।
                            </div>
                        </div>
                    </div>
                </div>

                <div id="heritage7" class="accordion_styled">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                   data-parent="#heritage7" href="#collapseOne_heritage7" aria-expanded="false">

                                    <div class="headliness">
                                        মনিপুরী তাঁতঃ
                                    </div>
                                    <i class="indicator float-right icon-plus"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne_heritage7" class="collapse" data-parent="#heritage7" style="">
                            <div class="card-body">
                                সিলেট, মৌলভীবাজার, সুনামগঞ্জ ও হবিগঞ্জ জেলায় মনিপুর জনগোষ্ঠীর বসবাস। মনিপুরীরা
                                বুননশিল্পে
                                খুব
                                দক্ষ। তাদের উৎপাদিত তাঁত পণ্য মনিপুরী তাঁত বলে পরিচিত। ফানেক, শাড়ি, শাল, ওড়না,
                                ত্রি পিস,
                                গামছা,
                                ফতুয়া, পাঞ্জাবি ইত্যাদি তৈরি করে থাকে তারা। মনিপুরী ভাষায় তাঁতকে বলে ইয়োং।
                                বর্তমানে ঐতিহ্য ও
                                আধুনিকতার মেলবন্ধনে মনিপুরী শাড়ি খুবই বিখ্যাত, উজ্জ্বল রঙের সুতায় তৈরি মনিপুরী
                                শাড়ি দেখতে
                                যেমন
                                সুন্দর, তেমনি মসৃন ও হালকা।
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>


        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.js'>
        <!-- partial -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        <script src='/js/map_api.js'></script>
        <script src="/js/mapa_data.js"></script>
    </div>
    </div>
</main>
<!-- End main -->

<script>
    document.getElementById("heritage").style.display = "none";
    document.getElementById("festival").style.display = "none";
    document.getElementById("forest").style.display = "none";
    document.getElementById("map_text").style.display = "block";


    function myFunction(id) {


        if (id == 1) {
            document.getElementById("heritage").style.display = "none";
            document.getElementById("festival").style.display = "block";
            document.getElementById("forest").style.display = "none";
            document.getElementById("map_text").style.display = "none";
        } else if (id == 2) {
            document.getElementById("heritage").style.display = "none";
            document.getElementById("festival").style.display = "none";
            document.getElementById("forest").style.display = "block";
            document.getElementById("map_text").style.display = "none";
        } else if (id == 3) {
            document.getElementById("heritage").style.display = "block";
            document.getElementById("festival").style.display = "none";
            document.getElementById("forest").style.display = "none";
            document.getElementById("map_text").style.display = "none";
        } else {
            document.getElementById("heritage").style.display = "none";
            document.getElementById("festival").style.display = "none";
            document.getElementById("forest").style.display = "none";
            document.getElementById("map_text").style.display = "block";
        }


        console.log(id + 'jjjjjj');
        var image = document.getElementById("maps_id");
        image.src = "/images/explore/" + id + ".jpg"
    }
</script>
</body>



</html>


