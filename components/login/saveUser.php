<?php
require_once '../../common/connectToDB.php';
session_start();
$conn->begin_transaction();
try {
    if (isset($_POST['userName'])) {
        $_SESSION["Login_Id"] = "";
        $userName      = $_POST['userName'];
        $pass      = $_POST['pass'];
        $first_name      = $_POST['first_name'];
        $middle_name      = $_POST['middle_name'];
        $last_name      = $_POST['last_name'];
        $addhercard_no      = $_POST['addhercard_no'];
        $address      = $_POST['address'];
        $phoneNumber    = $_POST['phoneNumber'];
        $userIDSeries = '';

        date_default_timezone_set('Asia/Kolkata');
        $timeStamp = date("d-m-y : h:i:sa");

        $sql = "SELECT *  FROM seriesnumber WHERE seriesName in ('userID') order by seriesName; ";
        $result = $conn->query($sql);
        // echo $sql;
        for ($i = 0; $row = $result->fetch_assoc(); $i++) {
            if ($row['seriesName'] == 'userID') $userIDSeries = $row['seriesValue'];
        }

        $sql = "INSERT INTO userloginmaster VALUES( '" . $userIDSeries . "',
          '" . $userName . "',
          '" . $pass . "',
          '" . $timeStamp . "',
          '" . $phoneNumber . "',
          '" . $userName . "');";
        //echo $sql;
        $rr = mysqli_query($conn, $sql);

        $sql = "INSERT INTO user_login_details (`Login_Id`, `User_First_Name`, `User_Middle_Name`, `User_Last_Name`, `Addhar_No`, `Mobile_No`, `Address`) VALUES( '" . $userIDSeries . "',
          '" . $first_name . "',
          '" . $middle_name . "',
          '" . $last_name . "',
          '" . $addhercard_no . "',
          '" . $phoneNumber . "',
          '" . $address . "'
          );";
        //echo $sql;
        $rr = mysqli_query($conn, $sql);

        $_SESSION["Login_Id"] = $userIDSeries;
        echo "" . $userIDSeries . "%%" . $timeStamp . "%%" . $userName . "%%" . $first_name . " " . $middle_name . " " . $last_name . "";

        $sql3 = "Update seriesnumber SET  seriesValue = seriesValue + 1 where seriesName in ('userID'); ";
        $rr3 = mysqli_query($conn, $sql3);
    } else {
        echo "<h3>Contact developer because server is down</h3>";
    }
    $conn->commit();
} catch (mysqli_sql_exception $exception) {
    $conn->rollback();

    throw $exception;
}
$conn = null;
