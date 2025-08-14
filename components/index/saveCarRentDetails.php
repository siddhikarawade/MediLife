<?php
require_once '../../common/connectToDB.php';
$conn->begin_transaction();
try {
    if (isset($_POST['checkValidate'])) {

        $carId      = $_POST['carId'];
        $userLoginToken      = $_POST['userLoginToken'];
        $userLoginFlag = $_POST['userLoginFlag'];
        $phoneNumber    = $_POST['phoneNumber'];
        $gmailAccount    = $_POST['gmailAccount'];
        $locationName = $_POST['locationName'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        $carHistorySeries = '';

        date_default_timezone_set('Asia/Kolkata');
        $timeStamp = date("d-m-y : h:i:sa");

        $sql = "SELECT *  FROM seriesnumber WHERE seriesName in ('carHistorySeries') order by seriesName; ";
        $result = $conn->query($sql);
        // echo $sql;
        for ($i = 0; $row = $result->fetch_assoc(); $i++) {
            if ($row['seriesName'] == 'carHistorySeries') $carHistorySeries = $row['seriesValue'];
        }

        $sql = "INSERT INTO carBookHistory VALUES( '" . $carHistorySeries . "',
          '" . $userLoginToken . "',
          '" . $phoneNumber . "',
          '" . $gmailAccount . "',
          '" . $carId . "',
          '" . $locationName . "',
          '" . $startDate . "',
          '" . $endDate . "',
          '" . $timeStamp . "','1');";
        //echo $sql;
        $rr = mysqli_query($conn, $sql);

        $sql3 = "UPDATE carsdetails SET  carStatus = 'true' where carID in ('" . $carId . "'); ";
        $rr3 = mysqli_query($conn, $sql3);

        $sql3 = "UPDATE seriesnumber SET  seriesValue = seriesValue + 1 where seriesName in ('carHistorySeries'); ";
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
