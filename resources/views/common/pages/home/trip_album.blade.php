<div class="white_bg ">


    <div class="container margin_60" style="padding-top: 35px;padding-bottom: 35px">

        <div class="main_title  ">


            <div class="row">

                <div class="col-md-6">
                    <h2 class="pull-left" style="float: left">{{__('localize.trip')}}
                        {{__('localize.album')}}</h2>
                </div>

                <div class="col-md-6">
                    <img src="/image/powered.png" style="width: 190px;
    float: right;">
                </div>


            </div>
            @if(count($trip)>3)

                <div class="row small-gutters categories_grid" style="padding-top: 20px">


                    <div class="col-sm-12 col-md-6 wow zoomIn" data-wow-delay="0.2s">
                        <a href="{{--/trip-album/{{$trip[0]->trip_album_id}}/{{getTitleToUrl($trip[0]->trip_album_title)}}--}}">
                            <img src="/images/trip_album/{{$trip[0]->trip_album_image}}" alt="" style="    height: 477px;
    width: 100%;" class="img-fluid">

                            <div class="wrapper">
                                <h2>{{$trip[0]->trip_album_title}}</h2>

                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 wow zoomIn" data-wow-delay="0.2s">
                        <div class="row small-gutters mt-md-0 mt-sm-2">
                            <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                                <a href="{{--/trip-album/{{$trip[1]->trip_album_id}}/{{getTitleToUrl($trip[1]->trip_album_title)}}--}}">
                                    <img src="/images/trip_album/{{$trip[1]->trip_album_image}}" alt=""
                                         class="img-fluid">
                                    <div class="wrapper">
                                        <h2>{{$trip[1]->trip_album_title}}</h2>

                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                                <a href="{{--/trip-album/{{$trip[2]->trip_album_id}}/{{getTitleToUrl($trip[2]->trip_album_title)}}--}}">
                                    <img src="/images/trip_album/{{$trip[2]->trip_album_image}}" alt=""
                                         class="img-fluid">
                                    <div class="wrapper">
                                        <h2>{{$trip[2]->trip_album_title}}</h2>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-12 mt-sm-2 wow zoomIn" data-wow-delay="0.2s">
                                <a href="{{--/trip-album/{{$trip[3]->trip_album_id}}/{{getTitleToUrl($trip[3]->trip_album_title)}}--}}">
                                    <img src="/images/trip_album/{{$trip[3]->trip_album_image}}" alt=""
                                         class="img-fluid">
                                    <div class="wrapper">
                                        <h2>{{$trip[3]->trip_album_title}}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/categories_grid-->


            @endif

            <p class="text-center pt-5">
                <a href="/trip-album" class="btn_1">{{ __('localize.view_all_trip_album') }}</a>
            </p>
        </div>


    </div>

    <!-- /container -->

