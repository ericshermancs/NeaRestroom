
/*
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
*/