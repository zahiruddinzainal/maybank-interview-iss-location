<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Map</title>
    <link rel="stylesheet" href="map.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <style>
        a[href^="http://maps.google.com/maps"],
        a[href^="https://maps.google.com/maps"],
        a[href^="https://www.google.com/maps"] {
            display: none !important;
        }

        .gm-bundled-control .gmnoprint {
            display: block;
        }

        .gmnoprint:not(.gm-bundled-control) {
            display: none;
        }

    </style>
</head>

<body>

    <body onload="initializeMap()">
        <div class="container">
            <div>
                <div id="map-canvas"></div>
            </div>
        </div>
    </body>



    <script>
        var location_at = @json($location_at);
        var locations_before = @json($locations_before);
        var locations_after = @json($locations_after);

        function initializeMap() {
            console.log('initialize');
            var myOptions = {
                center: new google.maps.LatLng(location_at['latitude'], location_at['longitude']),
                zoom: 2.5,
                mapTypeId: 'roadmap',
                disableDefaultUI: true

            };

            var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

            // REQUESTED TIME LOCATION
            var gps = new google.maps.Marker({
                position: new google.maps.LatLng(location_at['latitude'], location_at['longitude']),
                map: map,
                icon: "http://maps.google.com/mapfiles/kml/pal4/icon49.png"
            });
            google.maps.event.addListener(gps, "click", function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    console.log('Geolocation is not supported by this browser.');
                }
            });

            // BLUE PIN 1 - LOCATION BEFORE

            locations_before.forEach((element) => {
                var bluepin1 = new google.maps.Marker({
                    position: new google.maps.LatLng(element['latitude'], element['longitude']),
                    map: map,
                    icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                });
                console.log(element['latitude']);
                console.log(element['longitude']);
            });

            // RED PIN 1 - LOCATION after

            locations_after.forEach((element) => {
                var bluepin1 = new google.maps.Marker({
                    position: new google.maps.LatLng(element['latitude'], element['longitude']),
                    map: map,
                    icon: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
                });
                console.log(element['latitude']);
                console.log(element['longitude']);
            });

        }
    </script>

</html>
