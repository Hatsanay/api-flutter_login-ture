<?php
include "connect.php";
// $db = mysqli_connect('localhost','adminroot','1234','db_crna');

if(!$con)
{
	echo "Database connection failed";
}


    // $sqlcusid = "SELECT * FROM `members` ORDER BY memid DESC LIMIT 0,1";
	// $all_sqlcusid = mysqli_query($con,$sqlcusid);

	// while ($sqlcusid = mysqli_fetch_array(
    //     $all_sqlcusid,MYSQLI_ASSOC)):;
    //     $memcusid = $sqlcusid["memid"];
    //     $memcusid = $memcusid+1;
    // endwhile;


$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$tel = $_POST['tel'];
$password = $_POST['password'];
$email = $_POST['email'];

$date = date('Y-m-d H:i:s');
$level = "1";
$profile = "http://dik-it.com/crna-img/custommer/dedult.png";

$sql = "SELECT memusername FROM members WHERE memusername = '".$username."'";
$result = mysqli_query($con,$sql);
$count = mysqli_num_rows($result);
if($count == 1){
	echo json_encode("Error");
}else{
	$insert = "INSERT INTO members(memusername,mempassword,memlavel,memfullname,memproflie,memtel,memdate,membersemail	) 
	VALUES ('".$username."','".$password."','".$level."','".$fullname."','".$profile."','".$tel."','".$date."','".$email."')";
	// $insert1 = "INSERT INTO custumer(cusfullname,custel,memid) VALUES ('".$fullname."','".$tel."','".$memcusid."')";
		$query = mysqli_query($con,$insert);
		if($query){
			echo json_encode("Success");
		}
}
?>
