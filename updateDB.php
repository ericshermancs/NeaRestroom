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
        if(!isset($_POST['baby'])){
            $_POST['baby'] = array();
        }
        }
        elseif(!is_array($_POST['baby'])){
            $_POST['baby'] = array($_POST['baby']);
        }

        if(!isset($_POST['dry'])){
            $_POST['dry'] = array();
        }
        elseif(!is_array($_POST['dry'])){
            $_POST['dry'] = array($_POST['dry']);
        }
        return;
        $categories = array($_POST['gender']);
        $categories = array_merge($categories, $_POST['dry'], $_POST['baby']);
        return;
        $br = array(
            'name' => $_POST['name'],
            'cleanliness_level' => $_POST['cleanliness_level'],
            'overall_rating' => $_POST['overall_rating'],
            'sinks' => $_POST['sinks'],
            'gender' => $_POST['gender'],
            'latitude' => $_POST['latitude'],
            'longitude' => $_POST['longitude'],
            'unique_id' => $time,
            'categories' => $categories;
        );
        $str = file_get_contents('database.json');
        $json = json_decode($str, true);
        array_push($json, $br);
        $db_str = json_encode($json);
        file_put_contents('database.json', $db_str);
    }

    function readDB(){
        return file_get_contents('database.json');
    }
    if(isset($_POST['action'])){
        if($_POST['action']=='update'){
            updateRestroom();
        }
        elseif($_POST['action']=='add'){
            addRestroom();
        } 
    }

    
?>