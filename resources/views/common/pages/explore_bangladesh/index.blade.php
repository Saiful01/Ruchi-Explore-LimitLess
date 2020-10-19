@extends('layouts.common')

@section('title', 'Explore Bangladesh')




@section('content')
    <style>
        #map_filter {
            position: static;
            bottom: 0;
            left: 0;
            background-color: rgba(255, 255, 255, .7);
            z-index: 2;
            width: 100%;
        }

        #map_filter ul li:hover {
            display: inline-block;
            text-align: center;
            background: #cabfbf;
        }
    </style>

    <div class="col-md-12">


        <div class=" margin_60" ng-controller="forumController">

            <div class="row">

                <div id="map" class="map"></div>
                <div class="col-md-12 mx-auto">
                    <!-- End map -->
                    <div id="" style="padding-top: 10px">
                        <ul class="d-flex align-items-center justify-content-center">
                            @foreach($categories as $category)

                                <a style="padding: 10px" href="#" ng-click="showSpots('{{$category->spot_category_id}}')"><i
                                            class="fa fa-map-marker"
                                            aria-hidden="true"></i><span>{{$category->en_name}}</span></a>

                            @endforeach

                            {{-- <li><a href="javascript:toggleMarkers('Sightseeing');"><i class="icon_set_1_icon-3"></i><span>Beach</span></a></li>
                             <li><a href="javascript:toggleMarkers('Museums');"><i class="icon_set_1_icon-4"></i><span>Museum</span></a></li>
                             <li><a href="javascript:toggleMarkers('Skyline');"><i class="icon_set_1_icon-28"></i><span>Peak</span></a></li>
                             <li><a href="javascript:toggleMarkers('Eat_drink');"><i class="icon_set_1_icon-14"></i><span>Eat & Drink</span></a></li>
                             <li><a href="javascript:toggleMarkers('Walking');"><i class="icon_set_1_icon-37"></i><span>Walking tours</span></a></li>
                             <li><a href="javascript:toggleMarkers('Churches');"><i class="icon_set_1_icon-43"></i><span>Churces</span></a></li>--}}
                        </ul>
                    </div>
                </div>






                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEDWXvfmNADy9lDpov7EBTwSCL5GxL7KM"></script>
                <script src="/template/js/infobox.js"></script>

                <script>
                    var markersData = [];
                    app.controller('forumController', function ($scope, $http, $window) {

                        $scope.gettingSpots = function (id) {
                            console.log("start");

                            $http.post('/get-spot', {
                                id: id,

                            }).then(function mySuccess(response) {

                                for (let item of response.data) {

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
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "administrative.province",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "administrative.locality",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "administrative.neighborhood",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "administrative.land_parcel",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
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
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "poi.attraction",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "poi.business",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "poi.government",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "poi.medical",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
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
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "poi.place_of_worship",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "poi.school",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "poi.sports_complex",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "road.highway",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "road.highway",
                                            "elementType": "labels",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "road.highway.controlled_access",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
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
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "transit.station.airport",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "transit.station.bus",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "transit.station.rail",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
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
                                                    "visibility": "on"
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
                                            '<div class="marker_info" id="marker_info" style="padding-top:10px; margin-right:60px">' +
                                              '<img width="100%" height="150px" src="' + item.map_image_url + '" alt="Image"/>' +
                                            '<h3>' + item.name_point + '</h3>' +
                                            '<span>' + item.description_point + '</span>' +
                                            '<div class="marker_tools">' +
                                            '<form action="http://maps.google.com/maps" method="get" target="_blank" style="display:inline-block""><input name="saddr" value="' + item.get_directions_start_address + '" type="hidden"><input type="hidden" name="daddr" value="' + item.location_latitude + ',' + item.location_longitude + '"><button type="submit" value="Get directions" class="btn_infobox_get_directions">Directions</button></form>' +
                                            '</div>' +
                                            /*   '<a href="' + item.url_point + '" class="btn_infobox" target="_BLANK">Details</a>' +*/
                                            '</div>',
                                        disableAutoPan: false,
                                        maxWidth: 0,
                                        pixelOffset: new google.maps.Size(10, 125),
                                        closeBoxMargin: '0px 30px 2px 0px',
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


                        $scope.showSpots = function (id) {


                            $scope.gettingSpots(id);

                        };
                        $scope.gettingSpots(<?php echo $categories[0]->spot_category_id?>);

                    });

                </script>

            </div>

        </div>
    </div>

@stop



