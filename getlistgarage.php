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
            "garagelattitude" => $row["garagelattitude"],
            "garagelonggitude" => $row["garagelonggitude"],
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


// // $sql = "SELECT name, type, shortDesc, desc, image, rate, price FROM garage1";
// $sql = "SELECT garageid,garagename,garagetel,garagelattitude,garagelonggitude,garageprofile,garageimgid,garageonoff,ownerid,memid ,CONCAT(garagehousenum,'หมู่',garagegroup,
// ' ถนน',garageroad,' ซอย',garagealley,' ตำบล',districts.name_th,' อำเภอ',amphures.name_th,' จังหวัด',provinces.name_th,garagepostcode) AS address FROM garage 
// INNER JOIN districts ON garagedistrict = districts.id
// INNER JOIN amphures ON garagearea = amphures.id
// INNER JOIN provinces ON garageprovince = provinces.id
// WHERE garageonoff = 1";
// $result = $con->query($sql);

// $garage = array();
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         $garage[] = new  garage1(
//             garageid= $row["garageid"],
//             garagename= $row["garagename"]
//     }
// }
// $con->close();

// $query = $con->query("SELECT * FROM garage WHERE garageonoff = 1");
// $query = $con->query("SELECT garageid,garagename,garagetel,garagelattitude,garagelonggitude,garageprofile,garageimgid,garageonoff,ownerid,memid ,CONCAT(garagehousenum,'หมู่',garagegroup,
// ' ถนน',garageroad,' ซอย',garagealley,' ตำบล',districts.name_th,' อำเภอ',amphures.name_th,' จังหวัด',provinces.name_th,garagepostcode) AS address FROM garage 
// INNER JOIN districts ON garagedistrict = districts.id
// INNER JOIN amphures ON garagearea = amphures.id
// INNER JOIN provinces ON garageprovince = provinces.id
// WHERE garageonoff = 1");
// $result = array();

// while($rowData = $query->fetch_assoc()){
//     $result[] = $rowData;
// }
// echo json_encode($result);


// $statement = mysqli_query($con, $sql);
// $result = array("dashboard_content" => array());
// if (check) {
//     $rows = mysqli_fetch_assoc($statement);
//     if (!$rows) {
//         echo "No results!";
//     } else {

//       do {
//          $garageid = $rows['garageid'];
//          $garagename = $rows['garagename'];
//          $garagetel = $rows['garagetel'];
//          $garageprofile = $rows['garageprofile'];
//          $garageonoff = $rows['garageonoff'];

//          $result["dashboard_content"][] = array('garageid' => $garageid, 'garagename' => $garagename, 
//          'garagetel' => $garagetel, 'garageprofile' => $garageprofile, 'garageonoff' => $news_article);

//       } while ($rows = mysqli_fetch_assoc($statement));

//     mysqli_free_result($statement);
//     echo json_encode($result);
// }
// }



// require "connect.php";
// if (!$con) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// // Query the database
// $sql = "SELECT * FROM garage WHERE garageonoff = 1";
// $result = mysqli_query($con, $sql);

// // Fetch the data from the result set
// $data = array();
// while ($row = mysqli_fetch_array($result)) {
//     $data['garageid'] = $row['garageid'];
//     $data['garagename'] = $row['garagename'];
//     $data['garagelattitude'] = $row['garagelattitude'];
//     $data['garagelonggitude'] = $row['garagelonggitude'];
//     $data['garageprofile'] = $row['garageprofile'];
//     $data['garageonoff'] = $row['garageonoff'];
//     $data['ownerid'] = $row['ownerid'];
// }

// // Convert the data to JSON and print it
// header("Content-Type: application/json");
// echo json_encode($data);

// // Close the connection
// mysqli_close($con);
?>