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
    } else  if (isset($_REQUEST['saveNewPatient'])) {

        $firstName = isset($_POST['firstName']) ? trim($_POST['firstName']) : '';
        $middleName = isset($_POST['middleName']) ? trim($_POST['middleName']) : '';
        $lastName = isset($_POST['lastName']) ? trim($_POST['lastName']) : '';
        $aadharNo = isset($_POST['adharCardNo']) ? trim($_POST['adharCardNo']) : '';
        $mobileNo = isset($_POST['mobileNo']) ? trim($_POST['mobileNo']) : '';
        $address = isset($_POST['address']) ? trim($_POST['address']) : '';

        // Array to hold error messages
        $errors = [];

        // Basic validation
        if (empty($firstName)) {
            $errors[] = "First Name is required.";
        }
        if (empty($aadharNo)) {
            $errors[] = "Aadhar No is required.";
        }
        if (empty($mobileNo)) {
            $errors[] = "Mobile No is required.";
        }
        if (empty($address)) {
            $errors[] = "Address is required.";
        }

        // Check for valid mobile number
        if (!preg_match('/^[0-9]{10}$/', $mobileNo)) {
            $errors[] = "Mobile number must be 10 digits.";
        }

        // Check for valid Aadhar number (12 digits)
        if (!preg_match('/^[0-9]{12}$/', $aadharNo)) {
            $errors[] = "Aadhar number must be 12 digits.";
        }

        // If no errors, proceed with database insertion
        if (empty($errors)) {
            try {
                // Fetch the maximum value of `Login_Id` and increment it
                $query = "SELECT MAX(Login_Id) as maxLoginId FROM `user_login_details`";
                $result = $conn->query($query);

                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $newLoginId = $row['maxLoginId'] + 1; // Increment the max login id by 1
                } else {
                    // If no records found, start Login_Id from 1
                    $newLoginId = 1;
                }

                // Prepare the SQL INSERT statement using prepared statement to avoid SQL injection
                $stmt = $conn->prepare("INSERT INTO `user_login_details` (`Login_Id`, `User_First_Name`, `User_Middle_Name`, `User_Last_Name`, `Addhar_No`, `Mobile_No`, `Address`)
                                        VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("issssss", $newLoginId, $firstName, $middleName, $lastName, $aadharNo, $mobileNo, $address);

                // Execute the statement
                if ($stmt->execute()) {
                    echo "New user has been successfully added with Login ID: $newLoginId";
                } else {
                    echo "Error: " . $stmt->error;
                }

                // Close the statement
                $stmt->close();
            } catch (mysqli_sql_exception $exception) {
                // Handle exception
                echo "Error: " . $exception->getMessage();
            }
        } else {
            // If validation errors exist, display them
            foreach ($errors as $error) {
                echo "<p style='color:red;'>$error</p>";
            }
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
