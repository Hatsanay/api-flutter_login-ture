<?php

require "connect.php";

$action = $_POST['action'];

if ($action == 'POST_REVIEW_GARAGE') {
    $repair_id = $_POST['repair_id'];
    $reviewscore = $_POST['reviewscore'];
    $repairreqgarageid = $_POST['repairreqgarageid'];
    
    $update_query = "INSERT INTO review(reviewscore,repairreqid,garageid) 
    VALUES ('".$reviewscore."','".$repair_id."','".$repairreqgarageid."')";
    $update_result = mysqli_query($con, $update_query);
    
    if ($update_result) {
        $response = array(
            'status' => 'success',
        );
    } else {
        $response = array(
            'status' => 'error',
        );
    }
    
    echo json_encode($response);
}

?>
