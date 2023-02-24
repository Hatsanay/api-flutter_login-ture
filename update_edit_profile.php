<?php

require "connect.php";

$action = $_POST['action'];

if ($action == 'update_edit_name') {
    $memid = $_POST['memid'];
    $name = $_POST['name'];
    
    $update_query = "UPDATE members SET memfullname = '$name' WHERE memid = '$memid'";
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
else if ($action == 'update_edit_tel') {
    $memid = $_POST['memid'];
    $name = $_POST['name'];
    
    $update_query = "UPDATE members SET memtel = '$name' WHERE memid = '$memid'";
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
