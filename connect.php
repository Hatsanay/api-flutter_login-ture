<?php
    $host = "localhost";
    $username = "adminroot";
    $password = "1234";
    $dbname = "db_crna";
    
    // Create connection
    $con = mysqli_connect($host, $username, $password, $dbname)or die('tidak terkoneksi');
    // $con = mysqli_connect('localhost', 'adminroot', '1234', 'db_crna') or die('tidak terkoneksi');
?>