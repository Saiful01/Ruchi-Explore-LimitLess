<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,shrink-to-fit=no">
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
    <link rel="shortcut icon" href="/template/img/main-logo.png" type="image/x-icon">
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
    <link href="/css/custom.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    {{--google font cdn--}}
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">



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
      /*  $(document).ready(function () {
            $('a[href$="' + location.pathname + '"]').addClass('active');
        });*/

    </script>


    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =upload_image
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MMZX7RL');</script>
    <!-- End Google Tag Manager -->

</head>

<body ng-app="ruchiApp">

<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MMZX7RL"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

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

<main class="blank_padding" style="margin: 0px;" >

    @yield('content')

</main>
<!-- End main -->
@include('includes.common.footer')
</body>

</html>
