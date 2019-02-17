<?php
    function updateRestroom(){
        $str = file_get_contents('database.json');
        $json = json_decode($str, true);
        $unique_id = $_POST['unique_id'];
        $restroom_index; 
        for ($i = 0; $i < sizeof($json); $i++){
            if($json[$i]['unique_id'] == $unique_id){
                $restroom_index = $i;
                break; 
            }
        }

        $cleanliness_level = $_POST['cleanliness_level'];
        $overall_rating = $_POST['overall_rating'];
        $comment = $_POST['comment'];

        $review = array('cleanliness_level' => $cleanliness_level,
                        'overall_rating' => $overall_rating,
                        'comment' => $comment);
        array_push($json[$restroom_index]['reviews'], $review);
        print_r($json[$restroom_index]);
        echo "<br>";
        print_r($review);
        echo "<br>";
        print_r($json);
        
        $db_str = json_encode($json);
        file_put_contents('database.json', $db_str);
        //header('Location: index.php');
    }

    function addRestroom (){
        //$name, $cleanliness_level, $rating, $sinks, $dry, $gender, $latitude, $longitude, $unique_id, $categories;
        $time = microtime();
        if(!isset($_POST['baby'])){
            $_POST['baby'] = array();
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
        
        $categories = array($_POST['gender']);
        if($_POST['handicap']=='yes'){
            array_push($categories,'handicap');
        }

        $categories = array_merge($categories, $_POST['dry'], $_POST['baby']);
        if(!isset($_POST['comment'])){
            $_POST['comment'] = '';
        }
        $br = array(
            'name' => $_POST['name'],
            'cleanliness_level' => $_POST['cleanliness_level'],
            'overall_rating' => $_POST['overall_rating'],
            'sinks' => $_POST['sinks'],
            'gender' => $_POST['gender'],
            'latitude' => $_POST['latitude'],
            'longitude' => $_POST['longitude'],
            'unique_id' => $time,
            'categories' => $categories,
            'reviews' => array(array('overall_rating' => $_POST['overall_rating'],
                               'cleanliness_level' => $_POST['cleanliness_level'],
                                'comment' => $_POST['comment']))
        );
        //print_r($br);
        $str = file_get_contents('database.json');
        $json = json_decode($str, true);
        array_push($json, $br);
        //print_r($json);
        $db_str = json_encode($json);
        file_put_contents('database.json', $db_str);
        header('Location: index.php');
        
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