<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
          content="">
    <meta name="author" content="PIXONLAB">
    <title>@yield('title')</title>

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

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Montserrat:300,400,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;469;500;600;700&display=swap" rel="stylesheet">


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
        }

        body, p, h1, h2, h3, h4, h6, span{
            font-family: 'Oswald', sans-serif;
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

            @include('includes.common.beautigram')

        </div>
    </div><!-- container -->
</header><!-- End Header -->

<main class="blank_padding">

    @yield('content')

</main>
<!-- End main -->
@include('includes.common.beauty_footer')
</body>

</html>
