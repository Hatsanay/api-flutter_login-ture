<?php
    require "connect.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $data = array();

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($con, "SELECT * FROM members INNER JOIN custumer ON custumer.memid = members.memid
        WHERE memusername='$username' AND mempassword='$password'");
        $cek = mysqli_fetch_array($query);

        if(isset($cek) && $cek != null){
            $data['msg'] = "DATA ADA";
            $data['level'] = $cek['memlavel'];
            $data['username'] = $cek['memusername'];
            $data['fullname'] = $cek['memfullname'];
            $data['id'] = $cek['memid'];
            $data['proflie'] = $cek['memproflie'];
            // $data['fullname'] = $cek['custumer.cusfullname'];
            echo json_encode($data);
        }else{
            $data['msg'] = "DATA TIDAK ADA";
            echo json_encode($data);
        }
    }
?>