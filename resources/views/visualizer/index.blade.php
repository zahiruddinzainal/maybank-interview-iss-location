<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Path Visualizer</title>
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
        var map;
        var location_at = @json($location_at);
        var locations_before = @json($locations_before);
        var locations_after = @json($locations_after);

        console.log(location_at[0]['latitude']);
        console.log(location_at[0]['longitude']);

        function initializeMap() {
            var mapOptions = {
                center: new google.maps.LatLng(location_at[0]['latitude'], location_at[0]['longitude']),
                zoom: 3,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            // LIVE LOCATION
            var gps = new google.maps.Marker({
                position: new google.maps.LatLng(location_at[0]['latitude'], location_at[0]['longitude']),
                map: map,
                icon: {
                    url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
                    labelOrigin: new google.maps.Point(0, 45)
                },
                label: {
                    color: '#fff',
                    fontSize: '9px',
                    text: 'Last location of ISS is here at ' + @json($now)
                }
            });
            google.maps.event.addListener(gps, "click", function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    console.log('Geolocation is not supported by this browser.');
                }
            });

            //BEFORE PATH / ROUTES

            var beforeTrip = new Array();
            locations_before.forEach((element) => {
                beforeTrip.push(new google.maps.LatLng(element['latitude'], element['longitude']));
                var x = new google.maps.Marker({
                    position: new google.maps.LatLng(element['latitude'], element['longitude']),
                    map: map,
                    icon: {
                        url: "satellite-turqoise.png",
                        labelOrigin: new google.maps.Point(0, 40)
                    },
                    label: {
                        color: '#c7fdff',
                        fontSize: '9px',
                        text: 'Location at ' + element['round'] + ' minutes ago (' + element['masa'] + ')'
                    }
                });
                console.log(element['latitude']);
                console.log(element['longitude']);
            });

            var beforepath = new google.maps.Polyline({
                path: beforeTrip,
                strokeColor: "#c7fdff",
                strokeOpacity: 0.8,
                strokeWeight: 2
            });
            beforepath.setMap(map);

            //AFTER PATH / ROUTES

            var afterTrip = new Array();
            locations_after.forEach((element) => {
                afterTrip.push(new google.maps.LatLng(element['latitude'], element['longitude']));
                var x = new google.maps.Marker({
                    position: new google.maps.LatLng(element['latitude'], element['longitude']),
                    map: map,
                    icon: {
                        url: "satellite.png",
                        labelOrigin: new google.maps.Point(0, 40)
                    },
                    label: {
                        color: '#fff',
                        fontSize: '9px',
                        text: 'Location in next ' + element['round'] + ' minutes (' + element['masa'] + ')'
                    }
                });
                console.log(element['latitude']);
                console.log(element['longitude']);
            });

            var afterpath = new google.maps.Polyline({
                path: afterTrip,
                strokeColor: "#000",
                strokeOpacity: 0.8,
                strokeWeight: 2
            });
            afterpath.setMap(map);

        }
    </script>

</html>
