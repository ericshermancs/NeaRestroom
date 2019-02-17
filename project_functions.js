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

function addBathroom (name, cleanliness, rating, sinks, dry, gender, latitude, longitude, unique_id) {
	var d = new Date();
	var n = d.toString();
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
			'longitude': longitude,
			'unique_id': Date.now(); 
	}
}

function rateBathroom(br, userRating, userCleanliness, userComment, isReport=false){
	var userReview={
		'cleanliness_level': userCleanliness,
		'overall_rating': userRating,
		'comment': userComment
		};
	var aggregateRating=(br.reviews.length()*br.overall_rating)+userReview.overall_rating;
	br.overall_rating=aggregateRating/(br.reviews.length()+1);
	var aggregateCleanliness=(br.reviews.length()*br.cleanliness_level)+userReview.cleanliness_level;
	br.cleanliness_level=aggregateCleanliness/(br.reviews.length()+1);
	br.reviews.push(userReview);
	if(isReport){
		update(br);
	}
	return;
}

function update(br){
	null;
}