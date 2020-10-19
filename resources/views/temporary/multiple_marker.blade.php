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
        #googleMap {
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
                <div id="googleMap"></div>
            </div>
        </div>

    </div>

</div>

<script>


        var mapProp= {
            center:new google.maps.LatLng(51.508742,-0.120850),
            zoom:5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);


</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLgpS20108Sdu98jPU8NtjL2CpSsyDOE8&callback=initMap">
</script>
</body>
</html>