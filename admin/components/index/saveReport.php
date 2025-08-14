<?php
session_start();
require_once '../../common/connectToDB.php';


error_reporting(E_ALL);
ini_set('display_errors', 1);
try {

    $searchType = $_REQUEST["searchType"];
    $searchNo = $_REQUEST["searchNo"];
    $issue_type = $_REQUEST["issue_type"];
    $remarks = $_REQUEST["remarks"];
    $amount = $_REQUEST["amount"];

    $temp1        = explode(".", $_FILES["Image_Patient"]["name"]);
    $imageName = "../../dist/img/MedicalImages/" . time() . '.' . 'jpg';
    move_uploaded_file($_FILES["Image_Patient"]["tmp_name"], "../" . $imageName);

    $sql = "INSERT INTO `usermedicalhistorymaster`(`Date_Of_Entry`, `Login_Id`, `Hospital_Id`, `HealthIssueId`, `File_Name`, `Remarks`,`Amount`) VALUES(now(),
          '" . $searchNo . "','1',
          '" . $issue_type . "',
          '" . $imageName . "',
          '" . $remarks . "',
          '" . $amount . "'
          );";
    //echo $sql;
    $rr = mysqli_query($conn, $sql);
} catch (\Throwable $th) {
    throw $th;
}
