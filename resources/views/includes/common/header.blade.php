<style>

    @media (max-width: 480px) {
        .icon_search {
            padding-right: 10px;
        }

        .mobile-logo {
            height: auto !important;
        }

        #header_menu {
            padding: 0px;
            margin: 0px;
        }


    }

    @media (max-width: 350px) {
        .mobile {
            display: block !important;
        }
    }

    @media (min-width: 479px) {
        .mobile {
            display: none !important;
            visibility: hidden;
        }
    }


</style>
<div class="col-1">
    <div id="logo_home">


        <h1><a href="/" title=""></a></h1>
    </div>
</div>
<nav id="navbar" class=" col-11">
    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close"
       href="/"><span>M</span></a>
    <div class="main-menu">
        <div id="header_menu">
            <a href="/">
                <img src="/images/mobile.png{{--template/img/logo_sticky.png--}}" class="mobile-logo" width="80"
                     alt=""
                     data-retina="true">
            </a>
        </div>
        <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
        <ul style="font-family: Oswald, Sans-serif;">
            {{-- <li class="">
                 <a href="/">{{ __('localize.home') }}</a>
             </li>--}}
            <li class="submenu">
                <a href="/">  {{ __('localize.home') }}</a>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);" class="show-submenu">{{ __('localize.destination') }} <i
                            class="icon-down-open-mini"></i></a>
                <ul>
                    @foreach(getNavbarWithId(1) as $navbar)
                        <li><a href="/blogs/{{$navbar->blog_category_id}}/{{getTitleToUrl($navbar->en_name)}}">
                                @if( Session::get('locale')=="bn")
                                    {{$navbar->bn_name}}
                                @else
                                    {{$navbar->en_name}}
                                @endif
                            </a>
                        </li>

                    @endforeach

                   {{-- <li><a href="/explore-bangladesh">
                            {{ __('localize.exploreBangladesh') }}
                        </a>
                    </li>--}}
                    <li><a href="/explore-bangladesh-map">
                            {{ __('localize.exploreBangladeshmap') }}
                        </a>
                    </li>
                   {{-- <li><a href="/explore-bangladesh-svg">
                            Explore Bangladesh Svg
                        </a>
                    </li>--}}
                </ul>
            </li>

            {{--    <li class="">
                    <a href="/campaign">{{ __('localize.campaign') }}</a>
                </li>--}}

            <li class="submenu">
                <a href="javascript:void(0);" class="show-submenu">{{ __('localize.travel_stories') }} <i
                            class="icon-down-open-mini"></i></a>
                <ul>
                    {{--<li><a href="/adventure-trips">Adventure Travel</a></li>--}}

                    @foreach(getNavbarWithId(2) as $navbar)
                        <li><a href="/blogs/{{$navbar->blog_category_id}}/{{getTitleToUrl($navbar->en_name)}}">
                                @if( Session::get('locale')=="bn")
                                    {{$navbar->bn_name}}
                                @else
                                    {{$navbar->en_name}}
                                @endif
                            </a>
                        </li>

                    @endforeach
                </ul>
            </li>

            <li class="submenu">
                <a href="javascript:void(0);" class="show-submenu">{{ __('localize.tour_tips') }} <i
                            class="icon-down-open-mini"></i></a>
                <ul>
                    @foreach(getNavbarWithId(3) as $navbar)
                        <li><a href="/blogs/{{$navbar->blog_category_id}}/{{getTitleToUrl($navbar->en_name)}}">
                                @if( Session::get('locale')=="bn")
                                    {{$navbar->bn_name}}
                                @else
                                    {{$navbar->en_name}}
                                @endif
                            </a>
                        </li>

                    @endforeach

                    <li><a href="/moon-calendar">
                            @if( Session::get('locale')=="bn")
                                মুন ক্যালেন্ডার
                            @else
                                Moon Calendar
                            @endif
                        </a>
                    </li>
                    <li class="">
                        <a href="/travel-company">{{ __('localize.Travel company') }}</a>
                    </li>
                    <li class="">
                        <a href="/tour-manager">{{ __('localize.Travel calculator') }}</a>
                    </li>
                   {{-- <li class="">
                        <a href="/tour-manager2?from_id=1&to=1&transport_type=1&vehicle_type=1&hotel_type=1&person=&day=">Travel Calculator2</a>
                    </li>--}}

                </ul>
            </li>


            <li class="">
                <a href="/trip-album">{{ __('localize.trip_album') }}</a>
            </li>


            <li class="">
                <a href="/beauty-gram">{{ __('localize.beautigram') }}</a>
            </li>
            {{-- <li class="">
                 <a href="/explore-bangladesh"></a>
             </li>--}}
         {{--   <li class="mobile">
                <a href="/game">{{ __('localize.game') }}</a>
            </li>

            <li class="mobile">
                <a href="/user/forums">{{ __('localize.forum') }}</a>
            </li>--}}

            <li class="">
                <a href="/products">{{ __('localize.products') }}</a>
            </li>
            <li class="">
                <a href="javascript:void(0);" class="show-submenu">{{ __('localize.ENGAGEMENT') }} <i
                            class="icon-down-open-mini"></i></a>
                <ul>
                    <li><a href="/game">{{ __('localize.game') }}</a></li>
                    <li class="">
                        <a href="/user/forums">{{ __('localize.forum') }}</a>
                    </li>
                    <li class="">
                        {{--<a href="/travel-company">Travel Company</a>--}}
                    </li>
                </ul>
            </li>
            {{-- <li class="">
                 <a href="/blogs">{{ __('localize.blogs') }}</a>
             </li>--}}

        </ul>
    </div><!-- End main-menu -->
    <ul id="top_tools">
        {{-- <li class="">
             <a href="#">About</a>
         </li>

         <li class="">
             <a href="#">Contact</a>
         </li>--}}
        <li>
            <a href="javascript:void(0);" class="search-overlay-menu-btn"><i class="icon_search"></i></a>
        </li>

    </ul>
</nav>
