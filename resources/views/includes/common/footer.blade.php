<footer class="revealed" style="background-color: #1E2227">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3>{{--{{__('localize.about')}}--}}</h3>
                <ul>
                    <li><a href="/about">{{__('localize.about_us')}}</a></li>

                  {{--  <li class="">
                        <a href="/game">{{ __('localize.game') }}</a>
                    </li>
                    <li class="">
                        <a href="/contact">{{ __('localize.contact') }}</a>
                    </li>
                    <li><a href="/user/forums">{{__('localize.forum')}}</a></li>--}}

                </ul>

                <h3></h3>

                <h3>{{__('localize.need_help')}}</h3>
                <a href="#" id="phone" hidden>{{__('localize.phone')}}</a>
                <a href="mailto:info@ruchiexplorelimitless.com" id="email_footer">{{__('localize.mail')}}</a>
            </div>
            <div class="col-md-5">


                <blockquote style="padding-top: 20px;padding-bottom: 10px">
                    “I HAVE FOUND ADVENTURE IN FLYING, IN WORLD TRAVEL, IN BUSINESS, AND EVEN CLOSE AT HAND… ADVENTURE
                    IS A STATE OF MIND- AND SPIRIT,,

                    <br>
                    -Jacqueline Cochran

                </blockquote>
            </div>
            <div class="col-md-4">
                <div class="fb-page" data-href="https://www.facebook.com/ruchi.square/" {{-- data-tabs="timeline"--}}
                data-width="" data-height="155" data-small-header="true" data-adapt-container-width="true"
                     data-hide-cover="true" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/ruchi.square/" class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/ruchi.square/">RUCHI Explore Limitless</a></blockquote>
                </div>
            </div>
        </div><!-- End row -->
        <div class="row">
            <div class="col-md-12">
                <div id="social_footer">
                    <ul>
                        <li><a href="https://www.facebook.com/ruchi.square/"><i class="icon-facebook"></i></a></li>
                        {{--   <li><a href="#"><i class="icon-twitter"></i></a></li>
                           <li><a href="#"><i class="icon-google"></i></a></li>
                           <li><a href="#"><i class="icon-instagram"></i></a></li>

                           <li><a href="#"><i class="icon-vimeo"></i></a></li>--}}
                        <li><a href="https://www.instagram.com/ruchi.explore.limitless/"><i class="icon-instagram"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCsfGe0s18GDZPdTM-tev5yA/featured"><i
                                        class="icon-youtube-play"></i></a></li>
                    </ul>
                    <p>{{__('localize.copyright')}}</p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
</footer><!-- End footer -->

<div id="toTop"></div><!-- Back to top button -->

<!-- Search Menu -->
<div class="search-overlay-menu">
    <span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
    <form role="search" id="searchform" method="get" action="/search">
        <input value="" name="search" type="search" placeholder="Search..."/>
        {{--        <input  value="{{csrf_token()}}" name="_token" type="hidden" placeholder="Search..."/>--}}
        <button type="submit"><i class="icon_set_1_icon-78"></i>
        </button>
    </form>
</div><!-- End Search Menu -->

<!-- Common scripts -->
<script src="/template/js/jquery-2.2.4.min.js"></script>
<script src="/template/js/common_scripts_min.js"></script>
<script src="/template/js/functions.js"></script>





<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>

<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel();
    });
</script>


<!-- Specific scripts -->
<script src="/template/layerslider/js/greensock.js"></script>
<script src="/template/layerslider/js/layerslider.transitions.js"></script>
<script src="/template/layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        'use strict';
        $('#layerslider').layerSlider({
            autoStart: true,
            responsive: true,
            responsiveUnder: 1280,
            layersContainer: 1170,
            skinsPath: '/template/layerslider/skins/'
            // Please make sure that you didn't forget to add a comma to the line endings
            // except the last line!
        });
    });
</script>

{{--

<script type="text/javascript">
    // Disable right click on web page
    $("html").on("contextmenu", function (e) {
        return false;
    });
    // Disable cut, copy and paste on web page
    $('html').bind('cut copy paste', function (e) {
        e.preventDefault();
    });

    /*  document.addEventListener('copy', function (e){
          e.preventDefault();
          e.clipboardData.setData("text/plain", "Do not copy this site's content!");
      })*/

    function killCopy(e) {
        return false
    }

    function reEnable() {
        return true
    }

    document.onselectstart = new Function("return false")
    if (window.sidebar) {
        document.onmousedown = killCopy
        document.onclick = reEnable
    }
</script>--}}

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $('#summernote').summernote({
        tabsize: 2,
        height: 350
    });
</script>
