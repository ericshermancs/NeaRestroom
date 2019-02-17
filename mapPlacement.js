function mapPlacement() {
	var mymap = L.map('map').setView([38.983270399999995, -76.9466368], 13);
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			maxZoom: 18,
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
				'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox.streets'
		}).addTo(mymap);
}
mapPlacement();

function addBathroom (name, cleanliness, rating, sinks, dry, gender, latitude, longitude) {
	br = {
		'categories': ['handicap', 'top_stall_gap', 'bottom_stall_gap', 'breastfeeding', 'diaper_change']
			'name': name,
			'cleanliness_level': cleanliness
			'overall_rating': rating,
			'sinks': sinks,
			'method_of_drying': dry,
			'gender': gender,
			'reviews': [],
			'latitude': latitude,
			'longitude': longitude;
	}
}