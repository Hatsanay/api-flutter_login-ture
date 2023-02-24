<?php
include "connect.php";


if(!$con)
{
	echo "Database connection failed";
}


    


$repairreqfullname = $_POST['repairreqfullname'];


$sql = "SELECT memusername FROM members WHERE memusername = '".$username."'";
$result = mysqli_query($con,$sql);
$count = mysqli_num_rows($result);
if($count == 1){
	echo json_encode("Error");
}else{
	$insert = "INSERT INTO repairreq(repairreqfullname) 
    VALUES ('".$repairreqfullname."')";
	// $insert1 = "INSERT INTO custumer(cusfullname,custel,memid) VALUES ('".$fullname."','".$tel."','".$memcusid."')";
		$query = mysqli_query($con,$insert);
		if($query){
			echo json_encode("เสร็จสิ้น");
		}
}
?>
