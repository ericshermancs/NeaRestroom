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

		var j = <?php echo readDB();?>
		
		console.log(j);
		console.log(j[1].latitude, j[1].longitude)
		var poopEmoji = L.icon({
			iconUrl: 'poop_emoji.png', 
			iconSize: [28, 34],
			iconAnchor: [64, 122],
			popupAnchor: [-3, -76]
		});

		L.Routing.control({
		  plan: L.Routing.Plan([
		    L.latLng(userLat, userLon),
		    L.latLng(j[1].latitude, j[1].longitude)
		  ],
		  createMarker: function (i, wp, np = 2) {
			if (i == 1) {
				return L.marker(wp.latLng, {icon: poopEmoji });
			}
		})
		}).addTo(mymap);
	}

	navigator.geolocation.getCurrentPosition(getRoute);
	

</script>



</body>
</html>
