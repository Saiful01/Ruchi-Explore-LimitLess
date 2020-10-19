
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Citytours - Premium site template for city tours agencies, transfers and tickets.">
    <meta name="author" content="Ansonika">
    <title>CITY TOURS - City tours and travel site template by Ansonika</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="/template/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="/template/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="/template/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="/template/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="/template/img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Montserrat:300,400,700" rel="stylesheet">

    <!-- COMMON CSS -->
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/style.css" rel="stylesheet">
    <link href="/template/css/vendors.css" rel="stylesheet">

    <!-- ALTERNATIVE COLORS CSS -->
    <link href="#" id="colors" rel="stylesheet">

    <!-- CUSTOM CSS -->
    <link href="/template/css/custom.css" rel="stylesheet">

</head>
<body>

<div id="preloader">
    <div class="sk-spinner sk-spinner-wave">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div>
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

<div id="map" class="map" style="border-bottom:none; height:100%; width:100%; position:absolute; top:0; left:0;"></div>
<div id="map_filter">
    <ul>
        <li><a href="javascript:toggleMarkers('Historic');"><i class="icon_set_1_icon-44"></i><span>River</span></a></li>
        <li><a href="javascript:toggleMarkers('Sightseeing');"><i class="icon_set_1_icon-3"></i><span>Beach</span></a></li>
        <li><a href="javascript:toggleMarkers('Museums');"><i class="icon_set_1_icon-4"></i><span>Museum</span></a></li>
        <li><a href="javascript:toggleMarkers('Skyline');"><i class="icon_set_1_icon-28"></i><span>Peak</span></a></li>
        <li><a href="javascript:toggleMarkers('Eat_drink');"><i class="icon_set_1_icon-14"></i><span>Eat & Drink</span></a></li>
        <li><a href="javascript:toggleMarkers('Walking');"><i class="icon_set_1_icon-37"></i><span>Walking tours</span></a></li>
        <li><a href="javascript:toggleMarkers('Churches');"><i class="icon_set_1_icon-43"></i><span>Churces</span></a></li>
    </ul>
</div>

<!-- Search Menu -->
<div class="search-overlay-menu">
    <span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
    <form role="search" id="searchform" method="get">
        <input value="" name="q" type="search" placeholder="Search..." />
        <button type="submit"><i class="icon_set_1_icon-78"></i>
        </button>
    </form>
</div><!-- End Search Menu -->




<!-- Common scripts -->
<script src="/template/js/jquery-2.2.4.min.js"></script>
<script src="/template/js/common_scripts_min.js"></script>
<script src="/template/js/functions.js"></script>
<!-- Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEDWXvfmNADy9lDpov7EBTwSCL5GxL7KM"></script>
<script src="/template/js/infobox.js"></script>

<script>
    var markersData=[];
    app.controller('forumController', function ($scope, $http, $window) {

        $scope.upVote = function (id) {
            console.log("start");

            $http.post('/test-data', {
                topic_id: id,

            }).then(function mySuccess(response) {

                for (let item of response.data)
                {

                    console.log(response.data);
                }


                var
                    mapObject,
                    markers = [],
                    markersData = {
                        'Historic': response.data
                    };
                /* markersData = {
                     'Historic': [
                         {
                             name: 'Arc de Triomphe',
                             location_latitude: 23.798594,
                             location_longitude: 90.33784358,
                             map_image_url: '/images/tourist_spot/1589148467.jpg',
                             name_point: 'Arc de Triomphe',
                             description_point: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                             get_directions_start_address: '',
                             phone: '+3934245255',
                             url_point: 'single_tour.html'
                         },

                     ]
                 };*/

                (function (A) {

                    if (!Array.prototype.forEach)
                        A.forEach = A.forEach || function (action, that) {
                            for (var i = 0, l = this.length; i < l; i++)
                                if (i in this)
                                    action.call(that, this[i], i, this);
                        };

                })(Array.prototype);


                var mapOptions = {
                    zoom: 7,
                    center: new google.maps.LatLng(23.798594, 90.3378435),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,

                    mapTypeControl: false,
                    mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                        position: google.maps.ControlPosition.LEFT_CENTER
                    },
                    panControl: false,
                    panControlOptions: {
                        position: google.maps.ControlPosition.TOP_RIGHT
                    },
                    zoomControl: true,
                    zoomControlOptions: {
                        style: google.maps.ZoomControlStyle.LARGE,
                        position: google.maps.ControlPosition.TOP_RIGHT
                    },
                    scrollwheel: false,
                    scaleControl: false,
                    scaleControlOptions: {
                        position: google.maps.ControlPosition.LEFT_CENTER
                    },
                    streetViewControl: true,
                    streetViewControlOptions: {
                        position: google.maps.ControlPosition.LEFT_TOP
                    },
                    styles: [
                        {
                            "featureType": "administrative.country",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.province",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.locality",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.neighborhood",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.land_parcel",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape.man_made",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "simplified"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape.natural.landcover",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape.natural.terrain",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.attraction",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.business",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.government",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.medical",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.place_of_worship",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.school",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.sports_complex",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway.controlled_access",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "simplified"
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "simplified"
                                }
                            ]
                        },
                        {
                            "featureType": "transit.line",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "transit.station.airport",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "transit.station.bus",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "transit.station.rail",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        }
                    ]
                };
                var
                    marker;
                mapObject = new google.maps.Map(document.getElementById('map'), mapOptions);
                for (var key in markersData)
                    markersData[key].forEach(function (item) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(item.location_latitude, item.location_longitude),
                            map: mapObject,
                            icon: 'template/img/pins/' + key + '.png',
                        });

                        if ('undefined' === typeof markers[key])
                            markers[key] = [];
                        markers[key].push(marker);
                        google.maps.event.addListener(marker, 'click', (function () {
                            closeInfoBox();
                            getInfoBox(item).open(mapObject, this);
                            mapObject.setCenter(new google.maps.LatLng(item.location_latitude, item.location_longitude));
                        }));

                    });


                function hideAllMarkers() {
                    for (var key in markers)
                        markers[key].forEach(function (marker) {
                            marker.setMap(null);
                        });
                };

                function closeInfoBox() {
                    $('div.infoBox').remove();
                };

                function getInfoBox(item) {
                    return new InfoBox({
                        content:
                            '<div class="marker_info" id="marker_info">' +
                            '<img width="100%" height="150px" src="' + item.map_image_url + '" alt="Image"/>' +
                            '<h3>' + item.name_point + '</h3>' +
                            '<span>' + item.description_point + '</span>' +
                            '<div class="marker_tools">' +
                            '<form action="http://maps.google.com/maps" method="get" target="_blank" style="display:inline-block""><input name="saddr" value="' + item.get_directions_start_address + '" type="hidden"><input type="hidden" name="daddr" value="' + item.location_latitude + ',' + item.location_longitude + '"><button type="submit" value="Get directions" class="btn_infobox_get_directions">Directions</button></form>' +
                            '</div>' +
                            /*   '<a href="' + item.url_point + '" class="btn_infobox">Details</a>' +*/
                            '</div>',
                        disableAutoPan: false,
                        maxWidth: 0,
                        pixelOffset: new google.maps.Size(10, 125),
                        closeBoxMargin: '5px -20px 2px 2px',
                        closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif",
                        isHidden: false,
                        alignBottom: true,
                        pane: 'floatPane',
                        enableEventPropagation: true
                    });


                };

            }, function myError(response) {
                // response.statusText;
            });


        };

        $scope.upVote(1);

    });

</script>


</body>
</html>
