{{--

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Maps</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
--}}
{{--    Direction--}}{{--



--}}
{{--    https://maps.googleapis.com/maps/api/directions/json?origin=Disneyland&destination=Universal+Studios+Hollywood&key=AIzaSyDLgpS20108Sdu98jPU8NtjL2CpSsyDOE8--}}{{--



--}}
{{--Find Lat lon GEOCODINg--}}{{--

    <script src="https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyDLgpS20108Sdu98jPU8NtjL2CpSsyDOE8"></script>
    --}}
{{--Find Lat lon to Address Reverse GEOCODINg--}}{{--

    <script src="https://maps.googleapis.com/maps/api/geocode/json?latlng=40.714224,-73.961452&key=AIzaSyDLgpS20108Sdu98jPU8NtjL2CpSsyDOE8"></script>
</head>
<body>

https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,
+Mountain+View,+CA&key=YOUR_API_KEY
</body>
</html>
--}}

        <!DOCTYPE html>
<html>
<head>
    <title>Localizing the Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
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
<div id="map"></div>
<script>
    // This example displays a map with the language and region set
    // to Japan. These settings are specified in the HTML script element
    // when loading the Google Maps JavaScript API.
    // Setting the language shows the map in the language of your choice.
    // Setting the region biases the geocoding results to that region.
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: {lat: 35.717, lng: 139.731}
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLgpS20108Sdu98jPU8NtjL2CpSsyDOE8&callback=initMap"
        async defer>
</script>
</body>
</html>

