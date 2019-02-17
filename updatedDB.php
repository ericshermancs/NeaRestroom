<?php
    function updateRestroom(){
        $str = file_get_contents('database.json');
        $json = json_decode($str, true);
        $unique_id = $_POST['unique_id'];
        $restroom; 
        for ($i = 0; $i < sizeof($json); $i++){
            if($json[$i]['unique_id'] == $unique_id){
                $restroom = $json[$i]['unique_id'];
                break; 
            }
        }

        $cleanliness_level = $_POST['cleanliness_level'];
        $overall_rating = $_POST['overall_rating'];
        $comment = $_POST['comment'];
    }
    function addRestroom (){
        //$name, $cleanliness_level, $rating, $sinks, $dry, $gender, $latitude, $longitude, $unique_id, $categories;
        $time = microtime();
        if(!isset($_POST['categories'])){
            $_POST['categories'] = array();
        }
        $br = array(
            'name' => $_POST['name'],
            'cleanliness_level' => $_POST['cleanliness_level'],
            'rating' => $_POST['rating'],
            'sinks' => $_POST['sinks'],
            'dry' => $_POST['dry'],
            'gender' => $_POST['gender'],
            'latitude' => $_POST['latitude'],
            'longitude' => $_POST['longitude'],
            'unique_id' => $time,
            'categories' => $categories
        );
        $str = file_get_contents('database.json');
        $json = json_decode($str, true);
        array_push($json, $br);
        $db_str = json_encode($json);
        file_put_contents('database.json', $db_str);
    }
    
    if($_POST['action']=='update'){
        updateRestroom();
    }
    elseif($_POST['action']=='add'){
        addRestroom();
    }
?>