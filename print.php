<?php
    function find_review($unique_id){
        $database = file_get_contents('database.json');
        $json = json_decode($database, true);
        //print_r($json);
        $index; 
        for($i = 0; $i < sizeof($json); $i++){
            //echo $index."<br>";
            if($json[$i]['unique_id'] == $unique_id){
                $index = $i; 
                break; 
            }
        }
        //echo $index."<br>";
        echo '<div style="font-size: 30; text-align: justify; text-align-last: center;">';
        for($i = 0; $i < sizeof($json[$index]['reviews']); $i++){
            $review = $json[$index]['reviews'][$i];
            //print_r($review);
            //echo $i;
            
            
            echo "Overall Experience ".$review['overall_rating'].'<br>Cleanliness: '.$review['cleanliness_level'].'<br> Comment: '.$review['comment'].'<br><br>';
        }
        echo "</div>";
    }
    if (isset($_GET['unique_id'])){
        //echo $_GET['unique_id'];
        find_review($_GET['unique_id']);
    }
?>

