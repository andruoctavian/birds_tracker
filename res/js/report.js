var GOOGLE_MAPS_API_KEY = 'AIzaSyDGU_2xmTU8FVCthyScIOTGrSQ4ND9tFqk';

function initMap() {
    var uluru = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('report-map'), {
        zoom: 4,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
    var clickListener = google.maps.event.addListener(marker, "click", function (event) {
        var latitude = event.latLng.lat();
        var longitude = event.latLng.lng();
        console.log( latitude + ', ' + longitude );
    });
}


