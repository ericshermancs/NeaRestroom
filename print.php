<?php
    $database = file_get_contents('database.json');
    $json = json_decode($database, true);
    $index; 
    for($i = 0; $i < sizeof(json); $i++){
        if($json[$i]['unique_id'] == $_POST['unique_id']){
            $index = $i; 
            break; 
        }
    }

    for($i = 0; $i < sizeof($json[$index]['reviews']); $i++)
        $review = $json[$index][$i];
        echo $review['overall_rating'].'<br>'.$reveiw['cleanliness_level'].'<br>'.$review['comments'].'<br><br>';
    }
?>

