var map;
function initMap() {
    //getting the Point Of Interest's ID
    var courseId = document.getElementById("course").innerHTML;
    //Creating a XMLHttpRequest
    var xhr = new XMLHttpRequest(), pois;
    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var labelIndex = 0;
    xhr.open('GET', '/course/ajax/' + courseId);
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){ //If request is ok
            var pois = JSON.parse(xhr.responseText);
            var coordOrigin = {lat: pois[0].latitude , lng:  pois[0].longitude};
            var coordFirstStage = {lat: pois[1].latitude , lng:  pois[1].longitude};
            var coordSecondStage = {lat: pois[2].latitude , lng:  pois[2].longitude};
            var coordThirdStage = {lat: pois[3].latitude , lng:  pois[3].longitude};
            var coordMapCenter = {lat: (pois[0].latitude + pois[1].latitude + pois[2].latitude + pois[3].latitude)/4, lng: (pois[0].longitude + pois[1].longitude + pois[2].longitude + pois[3].longitude)/4};
            var map = new google.maps.Map(document.getElementById('map'), {
                center: coordMapCenter,
                zoom: 14
            });
            var contentOrigin = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">' + pois[0].name + '</h1>'+
                '<div id="bodyContent">'+
                '<p>' + pois[0].typeDetail + '</p>'+
                '<p>' + pois[0].adress + '</p>'+
                '<p>' + pois[0].postalCode + '</p>'+
                '<p>' + pois[0].city + '</p>'+
                '<p>' + pois[0].phoneNumber + '</p>'+
                '<p>' + pois[0].openingHours + '</p>'+
                '<p>' + pois[0].tariff + '</p>'+
                '</div>'+
                '</div>';

            var contentFirstStage = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">' + pois[1].name + '</h1>'+
                '<div id="bodyContent">'+
                '<p>' + pois[1].typeDetail + '</p>'+
                '<p>' + pois[1].adress + '</p>'+
                '<p>' + pois[1].postalCode + '</p>'+
                '<p>' + pois[1].city + '</p>'+
                '<p>' + pois[1].phoneNumber + '</p>'+
                '<p>' + pois[1].openingHours + '</p>'+
                '<p>' + pois[1].tariff + '</p>'+
                '</div>'+
                '</div>';

            var contentSecondStage = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">' + pois[2].name + '</h1>'+
                '<div id="bodyContent">'+
                '<p>' + pois[2].typeDetail + '</p>'+
                '<p>' + pois[2].adress + '</p>'+
                '<p>' + pois[2].postalCode + '</p>'+
                '<p>' + pois[2].city + '</p>'+
                '<p>' + pois[2].phoneNumber + '</p>'+
                '<p>' + pois[2].openingHours + '</p>'+
                '<p>' + pois[2].tariff + '</p>'+
                '</div>'+
                '</div>';

            var contentThirdStage = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">' + pois[3].name + '</h1>'+
                '<div id="bodyContent">'+
                '<p>' + pois[3].typeDetail + '</p>'+
                '<p>' + pois[3].adress + '</p>'+
                '<p>' + pois[3].postalCode + '</p>'+
                '<p>' + pois[3].city + '</p>'+
                '<p>' + pois[3].phoneNumber + '</p>'+
                '<p>' + pois[3].openingHours + '</p>'+
                '<p>' + pois[3].tariff + '</p>'+
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
                title: pois[0].name
            });

            var markerFirstStage = new google.maps.Marker({
                position: coordFirstStage,
                label: labels[labelIndex++ % labels.length],
                map: map,
                title: pois[1].name
            });

            var markerSecondStage = new google.maps.Marker({
                position: coordSecondStage,
                label: labels[labelIndex++ % labels.length],
                map: map,
                title: pois[2].name
            });

            var markerThirdStage = new google.maps.Marker({
                position: coordThirdStage,
                label: labels[labelIndex++ % labels.length],
                map: map,
                title: pois[3].name
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