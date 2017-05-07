var GOOGLE_MAPS_API_KEY = 'AIzaSyDGU_2xmTU8FVCthyScIOTGrSQ4ND9tFqk';

var map, marker, infoWindow;

function initMap() {
    map = new google.maps.Map(document.getElementById('tracker-map'), {
        zoom: 10,
        center: {lat: 44.434, lng: 26.047}
    });
    marker = new google.maps.Marker({
        map: map
    });
    var clickListener = google.maps.event.addListener(map, "click", function (event) {
        var latitude = event.latLng.lat();
        var longitude = event.latLng.lng();
        marker.setPosition(event.latLng);
    });
    infoWindow = new google.maps.InfoWindow;

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}

var reportBird = function () {
    var select = document.getElementById("bird-select");
    var bird = select.options[select.selectedIndex].value;

    var report = {
        lat: marker.getPosition().lat(),
        lng: marker.getPosition().lng(),
        bird: bird
    };

    $.post("/src/routes/report.php", report, function (data) {
        console.log(data);
    });
};

$(document).ready(function () {
    $('#tracker').on('click', '#submit-report', reportBird)
});