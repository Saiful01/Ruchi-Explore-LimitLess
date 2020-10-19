<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
          content="">
    <meta name="author" content="PIXONLAB">
    <title>Ruchi Explorer Limitless @yield('title')</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="/template/img/main-logo.png" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="/template/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
          href="/template/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="/template/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="/template/img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Montserrat:300,400,700" rel="stylesheet">

    <!-- COMMON CSS -->
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/style.css" rel="stylesheet">
    <link href="/template/css/vendors.css" rel="stylesheet">
    <link href="/template/css/layerslider.css" rel="stylesheet">
    <!-- ALTERNATIVE COLORS CSS -->
    <link href="#" id="colors" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;469;500;600;700&display=swap" rel="stylesheet">

    <!-- CUSTOM CSS -->
    <link href="/template/css/custom.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
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

    <style>
        .mobile-logo {
            /*     height: 67px;
                 padding-right: -29px;
                 margin: -20px;
                 width: 120px;*/
        }
        ul#top_tools li {
            display: inline-block;
            padding: 0 10px;
            padding-right: 25px;
        }
        @media only screen and (max-device-width: 640px) {
            .mobile-logo {
                /* margin-top: 15px;*/
            }
        }
        @media only screen and (max-device-width: 768px) {
            /* .mobile-logo{
                 margin-top: 23px;
             }*/
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
        @media (max-width: 481px)  {
            #mobile{
                display:block;
            }
            #desktop{
                display:none;
            }
        }
        @media (min-width:480px)  {
            #mobile{
                display:none;
            }
            #desktop{
                display:block;
            }
        }
        body, p, h1, h2, h3, h4, h6, span{
            font-family: 'Oswald', sans-serif;
        }
        a.button_intro_2, .button_intro_2 {
            background-color:rgba(0, 0, 0, 0.5);
            color: #e04f67;
        }
        a.button_intro_2:hover, .button_intro_2:hover {
            background-color:rgba(38, 120, 67, .7);
            color: #ffffff !important;
            border: 1px solid rgba(38, 120, 67, 1);
        }
        a {
    color: #333333;
}
    </style>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MMZX7RL');</script>
    <!-- End Google Tag Manager -->


</head>

<body ng-app="ruchiApp">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MMZX7RL"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

{{--<div id="preloader">
    <div class="sk-spinner sk-spinner-wave">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div>
<!-- End Preload -->--}}

<div class="layer"></div>
<!-- Mobile menu overlay mask -->

<!-- Header================================================== -->
<header>
    <div id="top_line">
        <div class="container">
            <div class="row">
                @include('includes.common.top_header')
            </div><!-- End row -->
        </div><!-- End container-->
    </div><!-- End top line-->

    <div class="container mobile-logo">
        <div class="row">
            @include('includes.common.header')
        </div>
    </div><!-- container -->
</header><!-- End Header -->

<main>

@include('common.pages.home.caraousel')
{{--    @include('common.pages.home.offers')
    @include('common.pages.home.spots')
    @include('common.pages.home.tour_plan')--}}

{{--@include('common.pages.home.about')--}}
@include('common.pages.home.about')
@include('common.pages.travel_calculator.tour_manager')
{{--@include('common.pages.home.about')--}}
@include('common.pages.home.blog')
@include('common.pages.home.featured_stories')

@include('common.pages.home.video')
@include('common.pages.home.trip_album')


<!-- End container -->
</main>
<!-- End main -->
@include('includes.common.footer')

</body>

</html>
