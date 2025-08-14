<?php
require_once '../../common/connectToDB.php';
session_start();
$conn->begin_transaction();
try {
    if (isset($_REQUEST['userName'])) {

        $userName      = $_REQUEST['userName'];
        $pass      = $_REQUEST['pass'];




        date_default_timezone_set('Asia/Kolkata');
        $timeStamp = date("d-m-y : h:i:sa");

        $stmt = $conn->prepare("SELECT q1.loginID,q1.userName,q1.userTimeStamp,concat(q2.User_First_Name,' ',q2.User_Middle_Name,' ',q2.User_Last_Name) as User_Full_Name FROM `userloginmaster` q1,user_login_details q2 WHERE q1.loginID = q2.Login_Id and q1.userName=? and q1.userPassword=? ");
        $stmt->bind_param("ss", $userName, $pass);

        // echo $stmt;
        $exe = $stmt->execute();
        $result = $stmt->get_result();
        $_SESSION["Login_Id"] = "";
        if ($result->num_rows > 0) {
            $i = 0;
            $login_id = "";
            while ($row = $result->fetch_assoc()) {
                $login_id = $row['loginID'];
                $_SESSION["Login_Id"] = $login_id;

                // echo $timeStamp;
                // die;

                echo "" . $row['loginID'] . "%%" . $row['userTimeStamp'] . "%%" . $row['userName'] . "%%" . $row['User_Full_Name'] . "";
            }

            $update_sql = "UPDATE userloginmaster SET userTimeStamp=now() WHERE loginID = ? ";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("s", $login_id);
            $update_result = $update_stmt->execute();
        } else {
            echo "User not found";
        }
    } else {
        echo "<h3>Contact developer because server is down</h3>";
    }
    $conn->commit();
} catch (mysqli_sql_exception $exception) {
    $conn->rollback();

    throw $exception;
}
$conn = null;
