var map;
var pointsOfInterest;
function initMap() {
    var markerArray = [];
    //getting the Point Of Interest's ID
    var courseId = document.getElementById("course").innerHTML;
    //Creating a XMLHttpRequest
    var xhr = new XMLHttpRequest();
    var labels = '123456';
    var labelIndex = 0;
    xhr.open('GET', '/parcours/ajax/' + courseId);
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){ //If request is ok
            pointsOfInterest = JSON.parse(xhr.responseText);
            var coordOrigin = {lat: pointsOfInterest[0].latitude , lng:  pointsOfInterest[0].longitude};
            var coordFirstStage = {lat: pointsOfInterest[1].latitude , lng:  pointsOfInterest[1].longitude};
            var coordSecondStage = {lat: pointsOfInterest[2].latitude , lng:  pointsOfInterest[2].longitude};
            var coordThirdStage = {lat: pointsOfInterest[3].latitude , lng:  pointsOfInterest[3].longitude};
            var coordMapCenter = {lat: (pointsOfInterest[0].latitude + pointsOfInterest[1].latitude + pointsOfInterest[2].latitude + pointsOfInterest[3].latitude)/4, lng: (pointsOfInterest[0].longitude + pointsOfInterest[1].longitude + pointsOfInterest[2].longitude + pointsOfInterest[3].longitude)/4};

            var directionsService = new google.maps.DirectionsService;

            var map = new google.maps.Map(document.getElementById('map'), {
                center: coordMapCenter,
                zoom: 14
            });
            var directionsDisplay = new google.maps.DirectionsRenderer({map: map});
            var stepDisplay = new google.maps.InfoWindow;

            calculateAndDisplayRoute(
                directionsDisplay, directionsService, markerArray, stepDisplay, map);
            // Listen to change events from the start and end lists.
            var onChangeHandler = function() {
                calculateAndDisplayRoute(
                    directionsDisplay, directionsService, markerArray, stepDisplay, map);
            };

            var contentOrigin = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">' + pointsOfInterest[0].name + '</h1>'+
                '<div id="bodyContent">'+
                '<p>' + pointsOfInterest[0].typeDetail + '</p>'+
                '<p>' + pointsOfInterest[0].adress + '</p>'+
                '<p>' + pointsOfInterest[0].postalCode + '</p>'+
                '<p>' + pointsOfInterest[0].city + '</p>'+
                '<p>' + pointsOfInterest[0].phoneNumber + '</p>'+
                '<p>' + pointsOfInterest[0].openingHours + '</p>'+
                '<p>' + pointsOfInterest[0].tariff + '</p>'+
                '</div>'+
                '</div>';

            var contentFirstStage = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">' + pointsOfInterest[1].name + '</h1>'+
                '<div id="bodyContent">'+
                '<p>' + pointsOfInterest[1].typeDetail + '</p>'+
                '<p>' + pointsOfInterest[1].adress + '</p>'+
                '<p>' + pointsOfInterest[1].postalCode + '</p>'+
                '<p>' + pointsOfInterest[1].city + '</p>'+
                '<p>' + pointsOfInterest[1].phoneNumber + '</p>'+
                '<p>' + pointsOfInterest[1].openingHours + '</p>'+
                '<p>' + pointsOfInterest[1].tariff + '</p>'+
                '</div>'+
                '</div>';

            var contentSecondStage = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">' + pointsOfInterest[2].name + '</h1>'+
                '<div id="bodyContent">'+
                '<p>' + pointsOfInterest[2].typeDetail + '</p>'+
                '<p>' + pointsOfInterest[2].adress + '</p>'+
                '<p>' + pointsOfInterest[2].postalCode + '</p>'+
                '<p>' + pointsOfInterest[2].city + '</p>'+
                '<p>' + pointsOfInterest[2].phoneNumber + '</p>'+
                '<p>' + pointsOfInterest[2].openingHours + '</p>'+
                '<p>' + pointsOfInterest[2].tariff + '</p>'+
                '</div>'+
                '</div>';

            var contentThirdStage = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">' + pointsOfInterest[3].name + '</h1>'+
                '<div id="bodyContent">'+
                '<p>' + pointsOfInterest[3].typeDetail + '</p>'+
                '<p>' + pointsOfInterest[3].adress + '</p>'+
                '<p>' + pointsOfInterest[3].postalCode + '</p>'+
                '<p>' + pointsOfInterest[3].city + '</p>'+
                '<p>' + pointsOfInterest[3].phoneNumber + '</p>'+
                '<p>' + pointsOfInterest[3].openingHours + '</p>'+
                '<p>' + pointsOfInterest[3].tariff + '</p>'+
                '</div>'+
                '</div>';

            var infowindowOrigin = new google.maps.InfoWindow({
                content: contentOrigin
            });

            var infowindowFirstStage = new google.maps.InfoWindow({
                content: contentFirstStage
            });

            var infowindowSecondStage = new google.maps.InfoWindow({
                content: contentSecondStage
            });

            var infowindowThirdStage = new google.maps.InfoWindow({
                content: contentThirdStage
            });

            var markerOrigin = new google.maps.Marker({
                position: coordOrigin,
                label: labels[labelIndex++ % labels.length],
                map: map,
                title: pointsOfInterest[0].name
            });

            var markerFirstStage = new google.maps.Marker({
                position: coordFirstStage,
                label: labels[labelIndex++ % labels.length],
                map: map,
                title: pointsOfInterest[1].name
            });

            var markerSecondStage = new google.maps.Marker({
                position: coordSecondStage,
                label: labels[labelIndex++ % labels.length],
                map: map,
                title: pointsOfInterest[2].name
            });

            var markerThirdStage = new google.maps.Marker({
                position: coordThirdStage,
                label: labels[labelIndex++ % labels.length],
                map: map,
                title: pointsOfInterest[3].name
            });

            markerOrigin.addListener('click', function() {
                infowindowOrigin.open(map, markerOrigin);
            });

            markerFirstStage.addListener('click', function() {
                infowindowFirstStage.open(map, markerFirstStage);
            });

            markerSecondStage.addListener('click', function() {
                infowindowSecondStage.open(map, markerSecondStage);
            });

            markerThirdStage.addListener('click', function() {
                infowindowThirdStage.open(map, markerThirdStage);
            });
        }
    };
    xhr.send('variable=valeur');

}

function calculateAndDisplayRoute(directionsDisplay, directionsService,
                                  markerArray, stepDisplay, map) {
    waypts = [
        {location: new google.maps.LatLng(pointsOfInterest[2].latitude , pointsOfInterest[2].longitude), stopover: true},
        {location: new google.maps.LatLng(pointsOfInterest[3].latitude , pointsOfInterest[3].longitude), stopover: true}
    ];
    // First, remove any existing markers from the map.
    for (var i = 0; i < markerArray.length; i++) {
        markerArray[i].setMap(null);
    }

    // Retrieve the start and end locations and create a DirectionsRequest using
    // WALKING directions.
    directionsService.route({
        origin: new google.maps.LatLng(pointsOfInterest[0].latitude , pointsOfInterest[0].longitude),
        destination: new google.maps.LatLng(pointsOfInterest[1].latitude , pointsOfInterest[1].longitude),
        waypoints: waypts,
        optimizeWaypoints: true,
        travelMode: google.maps.TravelMode.WALKING
    }, function(response, status) {
        // Route the directions and pass the response to a function to create
        // markers for each step.
        if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);

        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });
}



function attachInstructionText(stepDisplay, marker, text, map) {
    google.maps.event.addListener(marker, 'click', function() {
        // Open an info window when the marker is clicked on, containing the text
        // of the step.
        stepDisplay.setContent(text);
        stepDisplay.open(map, marker);
    });
}