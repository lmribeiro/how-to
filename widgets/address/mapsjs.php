<script src="https://maps.googleapis.com/maps/api/js?libraries=places,geometry&key=<?= Yii::$app->params['mapsApiKey']; ?>" ></script>


<script>

    var hasReloaded=0;
    var map=0;

    function updateCoords() {
        
    }

    function getMap() {
        var myLatlng = new google.maps.LatLng("41.15928", "-8.604428");
        var lat = $('#lat').val();
        var lng = $('#lng').val();
        if (lat && lng) {
            myLatlng = new google.maps.LatLng($('#lat').val(), $('#lng').val());
        }
        var map = new google.maps.Map(document.getElementById('my_map'), {
            zoom: 15,
            center: myLatlng
        });
        var marker = new google.maps.Marker({
            draggable: true,
            position: myLatlng
        });
        marker.setMap(map);

        google.maps.event.addListener(marker, 'dragend', function (event) {
            var lat = this.position.lat();
            var lng = this.position.lng();
            $('#lat').val(lat);
            $('#lng').val(lng);

        });
        google.maps.event.addListener(marker, 'drag', function (event) {
            $('#lat').val(this.position.lat());
            $('#lng').val(this.position.lng());
        });
    }

    function getGeo() {
        var url = "https://maps.googleapis.com/maps/api/geocode/json?address=";
        var loc;
        var location = "";
        location = address;
        location = location.replace(/\s+/g, '+');
        var result = $.get(url + location + "&sensor=false", function (data) {
            loc = data;
            if (data.status === "OK") {
                var lat = loc.results[0].geometry.location.lat.toPrecision(9);
                var lng = loc.results[0].geometry.location.lng.toPrecision(9);
                $('#lat').val(lat);
                $('#lng').val(lng);
                var map = new google.maps.Map(document.getElementById('my_map'), {
                    zoom: 15,
                    center: {lat: loc.results[0].geometry.location.lat, lng: loc.results[0].geometry.location.lng}
                });
                var marker = new google.maps.Marker({
                    draggable: true,
                    position: loc.results[0].geometry.location
                });
                marker.setMap(map);

                google.maps.event.addListener(marker, 'dragend', function (event) {
                    var lat = this.position.lat().toPrecision(9);
                    var lng = this.position.lng().toPrecision(9);
                });
                google.maps.event.addListener(marker, 'drag', function (event) {
                    var lat = this.position.lat().toPrecision(9);
                    var lng = this.position.lng().toPrecision(9);
                    $('#lat').val(lat);
                    $('#lng').val(lng);
                });
            } else {
                $('#addressError').modal('show');
            }

        }, "json");
    }

 

    function containsLocation(location, path) {
        var decodedPath = google.maps.geometry.encoding.decodePath(path);
        var polygon = new google.maps.Polygon({paths: decodedPath});
        return google.maps.geometry.poly.containsLocation(location, polygon);
    }

    function reload() {
        if (hasReloaded === 0) {
            hasReloaded = 1;
            setTimeout(function () {
                getMap();
            }, 500);
        }
    }

    </script>
