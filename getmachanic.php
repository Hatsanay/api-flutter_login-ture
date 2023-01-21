<?php



include "connect.php";


$sql = "SELECT mechanicid,mechanicfullname,sex.sexname as sex,mechanicbirthday,mechanictel,mechanicprofile,mechaniconoff,memid ,CONCAT(mechanichousenum,'หมู่',mechanicgroup,
' ถนน',mechanicroad,' ซอย',mechanicalley,' ตำบล',districts.name_th,' อำเภอ',amphures.name_th,' จังหวัด',provinces.name_th,mechanicpostcode) AS address FROM mechanic 
INNER JOIN districts ON mechanicdistrict = districts.id
INNER JOIN amphures ON mechanicarea = amphures.id
INNER JOIN sex ON mechanicsex = sex.sexid
INNER JOIN provinces ON mechanicprovince = provinces.id";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $garage = array();
    while($row = mysqli_fetch_assoc($result)) {
        $garage[] = array(
            "mechanicid" => $row["mechanicid"],
            "mechanicfullname" => $row["mechanicfullname"],
            "sex" => $row["sex"],
            "mechanicbirthday" => $row["mechanicbirthday"],
            "mechanictel" => $row["mechanictel"],
            "mechanicprofile" => $row["mechanicprofile"],
            "mechaniconoff" => $row["mechaniconoff"],
            "memid" => $row["memid"],
            "address" => $row["address"],

        );
    }
    echo json_encode($garage);
} else {
    echo "0 results";
}

mysqli_close($con);

?>