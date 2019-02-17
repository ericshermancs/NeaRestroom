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

<script src="project_functions.js" type="text/javascript"></script>

<script>

	var j = <?php echo readDB();?>
	
	console.log(j);
	console.log(j[0].latitude, j[0].longitude)
	L.Routing.control({
	  waypoints: [
	    L.latLng(30.983270399999995, -76.9466368),
	    L.latLng(j[0].latitude, j[0].longitude)
	  ]
	}).addTo(mymap);

</script>



</body>
</html>
