<!DOCTYPE html>
<html>

<head>

    <title>NeaRestroom</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <style>
        html,
        body {
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
		include 'print.php';
	?>

</head>

<body>

    <div class="dropdown">
        <button id="myBtn" class="dropbtn">Add New Bathroom</button>
        <button id="collapseItinerary" value="hide" class="dropbtn">Hide Directions</button>
        <div id="myDropdown" class="dropdown-content">
            <!--<a id="myBtn" style="font-family: Arial Black, Gadget, sans-serif; size: 20pt">Add New Bathroom</a>-->

            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p>

                        <form action="updateDB.php" method="POST" id="form">
                            <h1>Bathroom Name</h1> What is the name of the bathroom? Include Location
                            <br>
                            <input type="text" name="name">
                            <br>
                            <style>
                                .slidecontainer {
                                    width: 100%;
                                }
                                
                                .slider {
                                    -webkit-appearance: none;
                                    width: 100%;
                                    height: 25px;
                                    background: #d3d3d3;
                                    outline: none;
                                    opacity: 0.7;
                                    -webkit-transition: .2s;
                                    transition: opacity .2s;
                                }
                                
                                .slider:hover {
                                    opacity: 1;
                                }
                                
                                .slider::-webkit-slider-thumb {
                                    -webkit-appearance: none;
                                    appearance: none;
                                    width: 25px;
                                    height: 25px;
                                    background: #4CAF50;
                                    cursor: pointer;
                                }
                                
                                .slider::-moz-range-thumb {
                                    width: 25px;
                                    height: 25px;
                                    background: #4CAF50;
                                    cursor: pointer;
                                }
                            </style>

                            <h1>Overall Rating</h1>
                            <p>Drag the slider to indicate overall rating of the bathroom</p>

                            <div class="slidecontainer">
                                <input type="range" name="overall_rating" min="1" max="10" value="10" class="slider" id="myRange0">
                                <p>Value: <span id="demo0"></span></p>
                            </div>

                            <script>

                                var slider0 = document.getElementById("myRange0");
                                var output0 = document.getElementById("demo0");
                                output0.innerHTML = "🚽🚽🚽🚽🚽🚽🚽🚽🚽🚽 10";

                                function toilets0(number) {
                                    var string = "";
                                    console.log(number);
                                    for (var i = 1; i <= number; i++) {
                                        string += "🚽";
                                    }
                                    string += (" " + number);
                                    return string;
                                }

                                slider0.oninput = function() {
                                    output0.innerHTML = toilets0(this.value);
                                }
                                console.log(slider0);
                            </script>
                            <br>

                            <style>
                                .slidecontainer {
                                    width: 100%;
                                }
                                
                                .slider {
                                    -webkit-appearance: none;
                                    width: 100%;
                                    height: 25px;
                                    background: #d3d3d3;
                                    outline: none;
                                    opacity: 0.7;
                                    -webkit-transition: .2s;
                                    transition: opacity .2s;
                                }
                                
                                .slider:hover {
                                    opacity: 1;
                                }
                                
                                .slider::-webkit-slider-thumb {
                                    -webkit-appearance: none;
                                    appearance: none;
                                    width: 25px;
                                    height: 25px;
                                    background: #4CAF50;
                                    cursor: pointer;
                                }
                                
                                .slider::-moz-range-thumb {
                                    width: 25px;
                                    height: 25px;
                                    background: #4CAF50;
                                    cursor: pointer;
                                }
                            </style>
                   

                                <h1>Cleanliness Level</h1>
                                <p>Drag the slider to indicate overall cleanlines level</p>

                                <div class="slidecontainer">
                                    <input type="range" name="cleanliness_level" min="1" max="10" value="10" class="slider" id="myRange1">
                                    <p>Value: <span id="demo1"></span></p>
                                </div>

                                <script>
                                    var slider2 = document.getElementById("myRange1");
                                    var output2 = document.getElementById("demo1");
                                    output2.innerHTML = "🚽🚽🚽🚽🚽🚽🚽🚽🚽🚽 10";

                                    function toilets(number) {
                                        var string = "";
                                        for (var i = 1; i <= number; i++) string += "🚽";
                                        string += (" " + number);
                                        return string;
                                    }

                                    slider2.oninput = function() {
                                        output2.innerHTML = toilets(this.value);
                                    }

                                </script>

                                <style>
                                    /* The container */
                                    
                                    .container {
                                        display: block;
                                        position: relative;
                                        padding-left: 35px;
                                        margin-bottom: 12px;
                                        cursor: pointer;
                                        font-size: 22px;
                                        -webkit-user-select: none;
                                        -moz-user-select: none;
                                        -ms-user-select: none;
                                        user-select: none;
                                    }
                                    /* Hide the browser's default checkbox */
                                    
                                    .container input {
                                        position: absolute;
                                        opacity: 0;
                                        cursor: pointer;
                                        height: 0;
                                        width: 0;
                                    }
                                    /* Create a custom checkbox */
                                    
                                    .checkmark {
                                        position: absolute;
                                        top: 0;
                                        left: 0;
                                        height: 25px;
                                        width: 25px;
                                        background-color: #eee;
                                    }
                                    /* On mouse-over, add a grey background color */
                                    
                                    .container:hover input ~ .checkmark {
                                        background-color: #ccc;
                                    }
                                    /* When the checkbox is checked, add a blue background */
                                    
                                    .container input:checked ~ .checkmark {
                                        background-color: #2196F3;
                                    }
                                    /* Create the checkmark/indicator (hidden when not checked) */
                                    
                                    .checkmark:after {
                                        content: "";
                                        position: absolute;
                                        display: none;
                                    }
                                    /* Show the checkmark when checked */
                                    
                                    .container input:checked ~ .checkmark:after {
                                        display: block;
                                    }
                                    /* Style the checkmark/indicator */
                                    
                                    .container .checkmark:after {
                                        left: 9px;
                                        top: 5px;
                                        width: 5px;
                                        height: 10px;
                                        border: solid white;
                                        border-width: 0 3px 3px 0;
                                        -webkit-transform: rotate(45deg);
                                        -ms-transform: rotate(45deg);
                                        transform: rotate(45deg);
                                    }
                                </style>

  

                                    <h1>Gender Access</h1> Which genders have restroom access here?
                                    <br>
                                    <input type="radio" name="gender" value="men">Men
                                    <br>
                                    <input type="radio" name="gender" value="women">Women
                                    <br>
                                    <input type="radio" name="gender" value="gender_neutral">Gender-Neutral
                                    <br>

                                    <br>
                                    <h1>Diaper-Change/Breastfeeding</h1> Is there a diaper-changing/breastfeeding area?
                                    <br>

                                    <input type="checkbox" name="baby" value="diaper_changing">Diaper-Changing
                                    <br>
                                    <input type="checkbox" name="baby" value="breastfeeding">Breastfeeding
                                    <br>
                                    <br>

                                    <h1>Number of Sinks</h1> How many sinks are there?
                                    <br> Number:

                                    <br>
                                    <input type="radio" name="sinks" value="0"> 0
                                    <input type="radio" name="sinks" value="1"> 1
                                    <input type="radio" name="sinks" value="2"> 2
                                    <input type="radio" name="sinks" value="3"> 3
                                    <input type="radio" name="sinks" value="4"> 4
                                    <input type="radio" name="sinks" value="5"> 5+
                                    <br>

                                    <h1>Handicap Services</h1> Are there accomodations for people with disabilities?
                                    <br>

                                    <input type="radio" name="handicap" value="yes"> Yes
                                    <br>
                                    <input type="radio" name="handicap" value="no"> No
                                    <br>

                                    <h1>Stall Door/Floor Gap</h1> Is there a gap between the floor and the bottom of the stall door, or from the top of the stall to the ceiling?
                                    <br>
                                    <input type="checkbox" name="top_stall_gap" value="top stall gap">Top Stall Gap
                                    <br>
                                    <input type="checkbox" name="bottom_stall_gap" value="bottom stall gap">Bottom Stall Gap
                                    <br>

                                    <h1>Hand-Drying Options</h1> What hand drying options are there?
                                    <br>

                                    <input type="checkbox" name="dry" value="blowdryer"> Blowdryer
                                    <br>
                                    <input type="checkbox" name="dry" value="paper_towel">Paper Towel
                                    <br>
                                    <br>

                                    <h1>Comment</h1>
                                    <p>Do you have anything further to say? Any comments that express something about the bathroom that isn't clearly stated in the previous fields?</p>
                                    <input type="text" name='comment'>

                                    <input type="hidden" name="action" value="add">
                                    <input type="hidden" name="latitude" id="latitude">
                                    <input type="hidden" name="longitude" id="longitude">
                                    <br>
                                    <br>
                                    <input type="submit" name="submit">
                        </form>

                    </p>
                </div>

            </div>

        </div>
        <div id="myModal2" class="modal">
            <div class="modal-content">
                <span class="close" onclick="(function(){document.getElementById('myModal2').style.display='none'})();">&times;</span>
                <form action="updateDB.php" method="POST">
                    <h1>Cleanliness Level</h1>
                    <p>Drag the slider to indicate overall cleanlines level</p>
                    <div class="slidecontainer">
                        <input type="range" name="cleanliness_level" min="1" max="10" value="10" class="slider" id="myRange3">
                        <p>Value: <span id="demo3"></span></p>
                    </div>
                    <script>
                        var slider3 = document.getElementById("myRange3");
                        var output3 = document.getElementById("demo3");
                        output3.innerHTML = "🚽🚽🚽🚽🚽🚽🚽🚽🚽🚽 10";

                        function toilets(number) {
                            var string = "";
                            for (var i = 1; i <= number; i++) string += "🚽";
                            string += (" " + number);
                            return string;
                        }

                        slider3.oninput = function() {
                            output3.innerHTML = toilets(this.value);
                        }
                    </script>

                    <h1>Overall Rating</h1>
                    <p>Drag the slider to indicate overall rating of the bathroom</p>

                    <div class="slidecontainer">
                        <input type="range" name="overall_rating" min="1" max="10" value="10" class="slider" id="myRange4">
                        <p>Value: <span id="demo4"></span></p>
                    </div>
                    <script>
                        var slider4 = document.getElementById("myRange4");
                        var output4 = document.getElementById("demo4");
                        output4.innerHTML = "🚽🚽🚽🚽🚽🚽🚽🚽🚽🚽 10";

                        function toilets(number) {
                            var string = "";
                            for (var i = 1; i <= number; i++) string += "🚽";
                            string += (" " + number);
                            return string;
                        }

                        slider4.oninput = function() {
                            output4.innerHTML = toilets(this.value);
                        }
                    </script>
                    <h1>Comment</h1>
                    <p>Do you have anything further to say? Any comments that express something about the bathroom that isn't clearly stated in the previous fields?</p>
                    <input type="textfield" name="comment">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="unique_id" id='unique_id_editform'>
                    <input type="submit" name="submit">
                </form>
            </div>
        </div>
        <style>
            /* Dropdown Button */
            
            .dropbtn {
                background-color: #3498DB;
                color: white;
                padding: 16px;
                font-size: 30px;
                border: none;
                cursor: pointer;
                opacity: .3;
            }
            /* Dropdown button on hover & focus */
            
            .dropbtn:hover,
            .dropbtn:focus {
                background-color: #2980B9;
                opacity: 1
            }
            /* The container <div> - needed to position the dropdown content */
            
            .dropdown {
                overflow: hidden;
                position: fixed;
                display: inline-block;
                top: 0;
                z-index: 10000;
            }
            /* Dropdown Content (Hidden by Default) */
            
            .dropdown-content {
                overflow: hidden;
                display: none;
                position: fixed;
                background-color: #f1f1f1;
                min-width: 160px;
                top: 0;
                z-index: 10000;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            }
            /* Links inside the dropdown */
            
            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }
            /* Change color of dropdown links on hover */
            
            .dropdown-content a:hover {
                background-color: #ddd
            }
            /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
            
            .show {
                display: block;
            }
            /* The Modal (background) */
            
            .modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.4);
                /* Black w/ opacity */
            }
            /* Modal Content/Box */
            
            .modal-content {
                background-color: #fefefe;
                margin: 15% auto;
                /* 15% from the top and centered */
                padding: 20px;
                border: 1px solid #888;
                width: 80%;
                /* Could be more or less, depending on screen size */
            }
            /* The Close Button */
            
            .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }
            
            .close:hover,
            .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }
        </style>
        <script>
            function showRateMenu(unique_id) {
                var modal = document.getElementById("myModal2");
                modal.style.display = 'block';
                modal.style.zIndex=10000;
                document.getElementById('unique_id_editform').value = unique_id;
            }
            /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
            function doStuff() {
                document.getElementById("myDropdown").classList.toggle("show");

                document.getElementById('latitude').value = window.userLat;
                document.getElementById('longitude').value = window.userLon;
            }

            function myFunction() {
                doStuff();
                //navigator.geolocation.getCurrentPosition(doStuff);

            }

            // Close the dropdown menu if the user clicks outside of it
            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }

            // Get the modal
            var modal = document.getElementById('myModal');

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on the button, open the modal 
            btn.onclick = function() {
                modal.style.display = "block";
                modal.style.zIndex=10000;
                myFunction();
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </div>

    <div id='map'></div>

    <!--<script src="project_functions.js" type="text/javascript"></script>-->

    <script>

    	function showReviews(unique_id){
    		window.location.href = 'print.php?unique_id='+unique_id;
    	}

        function degreesToRadians(degrees) {
            return degrees * Math.PI / 180;
        }

        function distanceInYdBetweenEarthCoordinates(lat1, lon1, lat2, lon2) {
            var earthRadiusKm = 6371;

            var dLat = degreesToRadians(lat2 - lat1);
            var dLon = degreesToRadians(lon2 - lon1);

            lat1 = degreesToRadians(lat1);
            lat2 = degreesToRadians(lat2);

            var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.sin(dLon / 2) * Math.sin(dLon / 2) * Math.cos(lat1) * Math.cos(lat2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            var fakeDistance = earthRadiusKm * c;
            var realDistance = 1093.61 * fakeDistance;
            return realDistance;
        }

        function getRoute(position) {

            /*
            var myNode = document.getElementById("map");
            while (myNode.firstChild) {
                myNode.removeChild(myNode.firstChild);
            }
            */
            let preset_location = (document.cookie.match(/^(?:.*;)?\s*location\s*=\s*([^;]+)(?:.*)?$/)||[,null])[1]
            let preset_zoom = (document.cookie.match(/^(?:.*;)?\s*zoom\s*=\s*([^;]+)(?:.*)?$/)||[,null])[1]
            if(preset_zoom==null){
                window.zoom = 13;
                document.cookie = 'zoom=' + "13";
            }
            else{
                window.zoom = preset_zoom;
            }
            console.log('L:'+preset_location);
            if(preset_location!=null){
                window.userLat = parseFloat(preset_location.split(',')[0]);
                //console.log(preset_location.split(',')[0]);
                //console.log(parseFloat(preset_location.split(',')[0]));
                window.userLon = parseFloat(preset_location.split(',')[1]);
                //window.zoom = parseFloat(preset_zoom);
                console.log("PRESET: "+window.userLat+","+window.userLon);

            }
            else{
                window.userLat = position.coords.latitude;
                window.userLon = position.coords.longitude;
            }

            var mymap = L.map('map').setView([window.userLat, window.userLon], window.zoom);

            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox.streets'
            }).addTo(mymap);

            mymap.on('move', function(){

                console.log( mymap.getCenter().lat +"," + mymap.getCenter().lng);
                document.cookie = 'location=' + mymap.getCenter().lat +"," + mymap.getCenter().lng;
                
            });
            mymap.on('zoom',function(){
                document.cookie = 'zoom=' + mymap.getZoom();
            });

            var j = <?php echo readDB();?>;
            console.log(j);
            var poopEmoji = L.icon({
                iconUrl: 'images/poop_emoji.png',
                iconSize: [28, 34],
                iconAnchor: [28, 35],
                popupAnchor: [-3, -76]
            });

            var i;
            var closest_index;
            var shortest_distance = -1;
            for (i = 0; i < j.length; i++) {
                let dist = Math.floor(distanceInYdBetweenEarthCoordinates(j[i].latitude, j[i].longitude, 
                    position.coords.latitude, position.coords.longitude));
                let mark = L.marker([j[i].latitude, j[i].longitude], {
                    icon: poopEmoji
                });
                let rl = j[i].reviews.length;
                let html = "Name: " + j[i].name;
                html += "<br>Average Rating: " + j[i].overall_rating;
                html += "<br>Cleanliness Rating: " + j[i].cleanliness_level;
                html += "<br>Gender: " + j[i].gender + ". Distance: " +
                    dist + " Yds";

                html += "<br> " + j[i].reviews[rl - 1].comment;
                 /*
                html += "<br> " + j[i].reviews[rl - 1].comment.substring(0, 50);
                if (j[i].reviews[rl - 1].comment.length > 50) {
                    html += '...';
                }
                */
                html += "<br> <button onclick=showRateMenu(" + j[i].unique_id + ")>Rate this bathroom</button>"+
                "<button onclick=showReviews("+ j[i].unique_id +")>See all reviews</button>";
                mark.bindPopup(html);
                mark.addTo(mymap);
                if (shortest_distance < 0) {
                    shortest_distance = dist;
                    closest_index = i;
                } else if (dist < shortest_distance) {
                    shortest_distance = dist;
                    closest_index = i;
                }
            }
            console.log(j);
            console.log(j[1].latitude, j[1].longitude)
            L.Routing.control({
                waypoints: [
                    L.latLng(position.coords.latitude, position.coords.longitude),
                    L.latLng(j[closest_index].latitude, j[closest_index].longitude)
                ],
                
                
            }).addTo(mymap);

            document.getElementById('collapseItinerary').onclick = function(){
                let text = document.getElementById('collapseItinerary').value;
                

                let value = 'block';
                document.getElementById('collapseItinerary').value = 'hide';
                document.getElementById('collapseItinerary').textContent = 'Hide Directions'

                if(text=='hide'){ 
                    value = 'none';
                    document.getElementById('collapseItinerary').value = 'show';
                    document.getElementById('collapseItinerary').textContent = 'Show Directions'

                }
                var controls = document.getElementsByClassName("leaflet-routing-container");
                for(var i=0; i < controls.length; i++){
                    controls[i].style.display = value;
                }
            }
            var zoom = document.getElementsByClassName('leaflet-control-zoom');
            for(var i=0; i < zoom.length; i++){
                zoom[i].style.display = 'none';
            }
            var bar = document.getElementsByClassName('leaflet-bar');
            for(var i=0; i < bar.length; i++){
                bar[i].style.top = '60px';
            }
            console.log(window.userLat, window.userLon);
            mymap.flyTo([window.userLat, window.userLon], window.zoom);
        }
        /*
        try{
	        var window.userLon;
	        var window.userLat;
	    }
	    catch(err){

	    }
	    */
        navigator.geolocation.getCurrentPosition(getRoute);
    </script>

    </body>

</html>