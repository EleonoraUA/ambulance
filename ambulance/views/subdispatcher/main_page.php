<?php

use yii\bootstrap\NavBar;

?>
<style>
    .fill {
        margin-top: -60px;
        margin-left: -130px;
        height: 100%;
    }
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmjI8t-x5OZdt1JbGA76oyGWyCIqI42KA&callback=initMap&sensor=false">
</script>
<div class="container fill">
    <div class="row">
        <div class="col-xs-6 col-md-2">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="/calls/index">
                        Виклики <span class="label label-success">1</span>
                    </a>

                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="/brigades/index">
                        Бригади
                    </a>
                </li>

            </ul>
        </div>
        <div class="col-xs-6 col-md-10">
            <div id="map_canvas" style="width: 1200px; height:620px;"></div>
        </div>
    </div>
</div>
<script type="text/javascript">

    // check DOM Ready
    $(document).ready(function() {
        var position = [50.45466, 30.5238];
        // execute
        (function() {
            // map options
            var options = {
                zoom: 12,
                center: new google.maps.LatLng(50.45466, 30.5238), // centered US
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: false
            };

            // init map
            var map = new google.maps.Map(document.getElementById('map_canvas'), options);

            // NY and CA sample Lat / Lng
            var southWest = new google.maps.LatLng(50.44, 30.450);
            var northEast = new google.maps.LatLng(50.41, 30.350);
            var lngSpan = northEast.lng() - southWest.lng();
            var latSpan = northEast.lat() - southWest.lat();

            // set multiple marker
                var markers = [];
            for (var i = 0; i < 10; i++) {
                // init markers
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(southWest.lat() + latSpan * Math.random(), southWest.lng() + lngSpan * Math.random()),
                    map: map,
                    title: 'Click Me ' + i
                });

                // process multiple info windows
                (function(marker, i) {
                    // add click event
                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow = new google.maps.InfoWindow({
                            content: 'Бригада 9809/01'
                        });
                        infowindow.open(map, marker);
                    });
                })(marker, i);
                // markers[] = marker;
            }

                // google.maps.event.addListener(map, 'click', function(event) {
                //     markers.forEach(function (val) {
                //         transition(val);
                //     });
                // });

                var numDeltas = 100;
                var delay = 100; //milliseconds
                var i = 0;
                var deltaLat;
                var deltaLng;

                function transition(result){
                    i = 0;
                    deltaLat = (result[0] - position[0])/numDeltas;
                    deltaLng = (result[1] - position[1])/numDeltas;
                    moveMarker();
                }

                function moveMarker(){
                    position[0] += deltaLat;
                    position[1] += deltaLng;
                    var latlng = new google.maps.LatLng(position[0], position[1]);
                    marker.setTitle("Latitude:"+position[0]+" | Longitude:"+position[1]);
                    marker.setPosition(latlng);
                    if(i!=numDeltas){
                        i++;
                        setTimeout(moveMarker, delay);
                    }
                }
        }
        )();
    });
</script>