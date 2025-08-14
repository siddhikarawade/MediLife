<?php

// $servername = '31.220.110.201';
// $username   = 'u964538868_MedilifeDb';
// $password   = 'JainamJain@123';
// $dbname     = 'u964538868_MedilifeDb';
$servername = 'localhost';
$username   = 'root';
$password   = '';
$dbname     = 'u964538868_MedilifeDb';


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($servername, $username, $password, $dbname);
// print_r($conn);
//echo $conn;
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
