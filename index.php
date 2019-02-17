<!DOCTYPE html>
<html>
<head>
	
	<title>NeaRestroom</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>


	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		#map {
			width: 100%;
			height: 100%;
		}
	</style>

	<?php
		include 'updateDB.php';
	?>

</head>
<body>

<div id='map'></div>

<!--<script src="project_functions.js" type="text/javascript"></script>-->

<script>
	function degreesToRadians(degrees) {
	  return degrees * Math.PI / 180;
	}

	function distanceInYdBetweenEarthCoordinates(lat1, lon1, lat2, lon2) {
	  var earthRadiusKm = 6371;

	  var dLat = degreesToRadians(lat2-lat1);
	  var dLon = degreesToRadians(lon2-lon1);

	  lat1 = degreesToRadians(lat1);
	  lat2 = degreesToRadians(lat2);

	  var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
	          Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2); 
	  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
	  var fakeDistance = earthRadiusKm * c;
	  var realDistance = 1093.61 * fakeDistance;
	  return realDistance;
	}

	function getRoute(position){
		var userLat = position.coords.latitude;
		var userLon = position.coords.longitude;
		var mymap = L.map('map').setView([userLat, userLon], 13);
		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
				maxZoom: 18,
				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
					'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
					'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
				id: 'mapbox.streets'
			}).addTo(mymap);

		var j = <?php echo readDB();?>;

		var poopEmoji = L.icon({
			iconUrl: 'images/poop_emoji.png', 
			iconSize: [28, 34],
			iconAnchor: [28, 35],
			popupAnchor: [-3, -76]
		});

		var i;
		for(i = 0; i < j.length; i++){
			let mark = L.marker([j[i].latitude,j[i].longitude], {icon: poopEmoji});
			let rl = j[i].reviews.length;
			let html = "Average Rating: "+j[i].average_rating;
			html += "<br> Cleanliness Rating: "+ j[i].cleanliness_level;
			html += "<br> Gender: "+j[i].gender +". Distance: " + 
			Math.floor(distanceInYdBetweenEarthCoordinates(j[i].latitude, j[i].longitude, userLat, userLon))+" Yds";
			html += "<br> "+ j[i].reviews[rl-1].comment.substring(0,50);
			if(j[i].reviews[rl-1].comment.length > 50){
				html += '...'
			}
			mark.bindPopup(html);
			mark.addTo(mymap);
		}
		console.log(j);
		console.log(j[1].latitude, j[1].longitude)
		L.Routing.control({
		  waypoints: [
		    L.latLng(userLat, userLon),
		    L.latLng(j[1].latitude, j[1].longitude)
		  ]
		}).addTo(mymap);
	}

	navigator.geolocation.getCurrentPosition(getRoute);
	

</script>



</body>
</html>
