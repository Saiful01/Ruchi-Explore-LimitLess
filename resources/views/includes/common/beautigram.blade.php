<style>

    @media (max-width: 480px) {
        .icon_search {
            padding-right: 10px;
        }

        .mobile-logo {
            width: 90px;
            height: auto !important;
        }
        .mobile-main-logo{
            margin-top: -11px;
            width: 65px;
        }

        #header_menu {
            padding: 0px;
            margin: 0px;
        }
    }

</style>
<div class="col-2">
    <a href="/beauty-gram"><img src="/images/blogo.jpg" class="mobile-main-logo"> </a>
  {{--  <div id="logo_home">


        <h1><a href="/" title=""></a></h1>
    </div>--}}
</div>
<nav class="col-10">
    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close"
       href="/"><span>M</span></a>
    <div class="main-menu">
        <div id="header_menu">
            <a href="/beauty-gram">
                <img src="/images/blogo.jpg{{--template/img/logo_sticky.png--}}" class="mobile-logo" width="160"
                     height="45" alt=""
                     data-retina="true">
            </a>
        </div>
        <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
        <ul class="{{--font-weight-bold--}}">
            {{-- <li class="">
                 <a href="/">{{ __('localize.home') }}</a>
             </li>--}}
            <li class="submenu">
                <a href="/beauty-gram">  {{ __('localize.home') }}</a>
            </li>


            <li class="">
                <a href="/beauty-gram/image">PHOTOS</a>
            </li>
            <li class="">
                <a href="/beauty-gram/video">VIDEOS</a>
            </li>
            <li class="">
                <a href="/beauty-gram/blogs">BLOGS</a>
            </li>
            <li class="">
                <a href="/">RUCHIEXPLORELIMITLESS</a>
            </li>
            <li class="">
                <a href="https://www.facebook.com/ruchi.square">FOLLOW US</a>
            </li>
            <li class="">
                <a href="https://www.youtube.com/channel/UCsfGe0s18GDZPdTM-tev5yA/featured" target="_BLANK"><img src="/image/download.jpg" width="30px" alt="youtube image"></a>
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
