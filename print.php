<?php
    function find_review($unique_id){
        $database = file_get_contents('database.json');
        $json = json_decode($database, true);
        $index; 
        for($i = 0; $i < sizeof(json); $i++){
            if($json[$i]['unique_id'] == $unique_id){
                $index = $i; 
                break; 
            }
        }
        echo $index."<br>";
        for($i = 0; $i < sizeof($json[$index]['reviews']); $i++){
            $review = $json[$index][$i];
            echo $review['overall_rating'].'<br>'.$reveiw['cleanliness_level'].'<br>'.$review['comments'].'<br><br>';
        }
    }
    if (isset($_GET['unique_id'])){
        echo $_GET['unique_id'];
        find_review($_GET['unique_id']);
    }
?>

