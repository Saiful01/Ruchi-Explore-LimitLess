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

    // In the following example, markers appear when the user clicks on the map.
    // The markers are stored in an array.
    // The user can then click an option to hide, show or delete the markers.
    var map;
    var markers = [];

    function initMap() {
        var haightAshbury = {lat: 37.769, lng: -122.446};

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: haightAshbury,
            mapTypeId: 'terrain'
        });

        // This event listener will call addMarker() when the map is clicked.
        map.addListener('click', function (event) {
            addMarker(event.latLng);
        });

        // Adds a marker at the center of the map.
        addMarker(haightAshbury);
    }

    // Adds a marker to the map and push to the array.
    function addMarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });


        console.log(marker);


        markers.push(marker);
    }

    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    // Shows any markers currently in the array.
    function showMarkers() {
        setMapOnAll(map);
    }

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLgpS20108Sdu98jPU8NtjL2CpSsyDOE8&callback=initMap">
</script>
</body>
</html>