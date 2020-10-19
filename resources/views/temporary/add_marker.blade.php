<!DOCTYPE html>
<html>
<head>
    <title>Removing Markers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 400px;
        }

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

    </style>
</head>
<body>
<br>
<div id="floating-panel">
    {{--    <input onclick="showMarkers();" type=button value="Show All Markers">--}}
</div>
<div class="container">


    <div class="col-md-8 mx-auto">
        <div class="card">

            <div class="card-body">
                <div id="map"></div>
            </div>
        </div>

    </div>

</div>

<script>

    function initMap() {
        var myLatLng = {lat: 23.7808875, lng: 90.2792365};
        var myLatLng2 = {lat: 23.7801875, lng: 90.1792365};
        var markers = [];
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: myLatLng
        });

        setMapOnAll();

        function setMapOnAll() {

            var contentString = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
                '<div id="bodyContent">'+
                '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
                'sandstone rock formation in the southern part of the '+
                'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
                'south west of the nearest large town, Alice Springs; 450&#160;km '+
                '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
                'features of the Uluru - Kata Tjuta National Park. Uluru is '+
                'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
                'Aboriginal people of the area. It has many springs, waterholes, '+
                'rock caves and ancient paintings. Uluru is listed as a World '+
                'Heritage Site.</p>'+
                '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
                'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
                '(last visited June 22, 2009).</p>'+
                '</div>'+
                '</div>';
            for (var i=0;i<=2;i++){

                markers = new google.maps.Marker({
                    position: {lat: 23.7805+i, lng: 90.27365+i},
                    map: map,
                    title: 'Hello World!',
                    animation:google.maps.Animation.BOUNCE,
                    /*icon:'pinkball.png'*/
                });

                markers.addListener('click', function() {
                    infowindow.open(map, markers);
                });

                markers = new google.maps.Marker({
                    position: myLatLng2,
                    map: map,
                    title: 'Hello World!'
                });
                markers.addListener('click', function() {
                    infowindow.open(map, markers);
                });
            }

            var infowindow = new google.maps.InfoWindow({
                content: contentString,
                maxWidth: 300

            });
        }


    }
</script>


<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLgpS20108Sdu98jPU8NtjL2CpSsyDOE8&callback=initMap">
</script>
</body>
</html>