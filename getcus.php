<?php
require "connect.php";
$response = array();


$id = $_POST['id'];
// Get the data from the database
$query = "SELECT * FROM custumer WHERE memid = $id";
$result = mysqli_query($con, $query);



if (mysqli_num_rows($result) > 0) {
  // Loop through the results and store them in the response array
  while ($row = mysqli_fetch_assoc($result)) {
    $response['cusid'] = $row['cusid'];
    $response['cusfullname'] = $row['cusfullname'];
    $response['cusimg'] = $row['cus_img'];
    $response['cusbirtday'] = $row['cusbirtday'];
    $response['custel'] = $row['custel'];
    $response['cusmemid'] = $row['memid'];
  }
} else {
  // If no data is found, set the response to an error message
  $response['error'] = "No data found";
}

// Close the connection
mysqli_close($con);

// Return the response in JSON format
echo json_encode($response);
?>