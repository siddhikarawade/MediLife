<?php
session_start();
include 'common/connectToDB.php';
include "../AESEnc.php";

if (isset($_POST['userName'])) {

    $userName    = $_POST['userName'];
    $pass        = encrypt($_POST['pass'], $AESKEY);

    $sql = "SELECT * FROM adminlogincreditional where loginName='" . $userName . "' AND loginPassword='" . $pass . "';";
    // echo $sql;
    $result = $conn->query($sql);

    date_default_timezone_set('Asia/Kolkata');
    $loginTimeStamp = date("d-m-y : h:i:sa");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['loginsuccess'] = 1;
            $_SESSION['loginUserID'] = $row['loginID'];
            $_SESSION['userName'] = $row['loginName'];
            $_SESSION['lastLoginTime'] = $loginTimeStamp;

            $sql = "UPDATE adminlogincreditional set loginTimeStamp = '" . $loginTimeStamp . "' where loginName='" . $userName . "' AND loginPassword='" . $pass . "';";
            // echo $sql;
            $result = $conn->query($sql);

            echo "0";

            $conn->close();
            exit;
        }
    } else {
        $conn->close();
        echo "Invalid Login Credentials. Please try again.";
    }
}
