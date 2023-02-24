<?php



include "connect.php";


$sql = "SELECT garageid,garagename,garagetel,garagelattitude,garagelonggitude,garageprofile,garagedeegree,garageimgid,garageonoff,ownerid,memid ,CONCAT(garagehousenum,'หมู่',garagegroup,
' ถนน',garageroad,' ซอย',garagealley,' ตำบล',districts.name_th,' อำเภอ',amphures.name_th,' จังหวัด',provinces.name_th,garagepostcode) AS address FROM garage 
INNER JOIN districts ON garagedistrict = districts.id
INNER JOIN amphures ON garagearea = amphures.id
INNER JOIN provinces ON garageprovince = provinces.id";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $garage = array();
    while($row = mysqli_fetch_assoc($result)) {
        $garage[] = array(
            "garageid" => $row["garageid"],
            "garagename" => $row["garagename"],
            "garagetel" => $row["garagetel"],
            "latitude" => $row["garagelattitude"],
            "longitude" => $row["garagelonggitude"],
            "garageprofile" => $row["garageprofile"],
            "garageonoff" => $row["garageonoff"],
            "ownerid" => $row["ownerid"],
            "memid" => $row["memid"],
            "address" => $row["address"],
            "garagedeegree" => $row["garagedeegree"],

        );
    }
    echo json_encode($garage);
} else {
    echo "0 results";
}

mysqli_close($con);



?>