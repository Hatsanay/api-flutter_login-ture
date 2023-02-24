<?php
include "connect.php";


if(!$con)
{
	echo "Database connection failed";
}


    


$repairreqfullname = $_POST['repairreqfullname'];
$repairreqtel = $_POST['repairreqtel'];
$repairreqcardetial = $_POST['repairreqcardetial'];
$repairreqspecial = $_POST['repairreqspecial'];
$repairreqproblem = $_POST['repairreqproblem'];

$repairname = $_POST['repairname'];


$repairreqlattitude = $_POST['repairreqlattitude'];
$repairreqlonggitude = $_POST['repairreqlonggitude'];
// $repairreqstatus = $_POST['repairreqstatus'];
$repairreqstatus = "1";


$repairreqmacid = $_POST['repairreqmacid'];
$repairreqmemid = $_POST['repairreqmemid'];



$repairreqdatetime = date('Y-m-d H:i:s');
$repairreqgarageid = "0";


$sql = "SELECT memusername FROM members WHERE memusername = '".$username."'";
$result = mysqli_query($con,$sql);
$count = mysqli_num_rows($result);
if($count == 1){
	echo json_encode("Error");
}else{
	$insert = "INSERT INTO repairreq(repairname,repairreqfullname,repairreqtel,repairreqcardetial,repairreqspecial,repairreqproblem,repairreqlattitude
    ,repairreqlonggitude,repairreqstatus,repairreqmacid,repairreqmemid,repairreqdatetime,repairreqgarageid) 
    VALUES ('".$repairname."','".$repairreqfullname."','".$repairreqtel."','".$repairreqcardetial."','".$repairreqspecial."','".$repairreqproblem."','".$repairreqlattitude."'
    ,'".$repairreqlonggitude."','".$repairreqstatus."','".$repairreqmacid."','".$repairreqmemid."','".$repairreqdatetime."','".$repairreqgarageid."')";
	// $insert1 = "INSERT INTO custumer(cusfullname,custel,memid) VALUES ('".$fullname."','".$tel."','".$memcusid."')";
		$query = mysqli_query($con,$insert);
		if($query){
			echo json_encode("Success");
		}
}
?>
