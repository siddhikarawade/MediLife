<?php
session_start();
require_once '../../common/connectToDB.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);



try {
    $returnData = ["UserDetails" => [], "MedicalDetails" => []];
    $action = $_REQUEST["action"];
  
    
    if ($action == "search") {
        $searchType = $_REQUEST["searchType"];
        $searchNo = $_REQUEST["searchNo"];

        if ($searchType == "UniqueId") {
            $stmt = $conn->prepare("SELECT * FROM user_login_details WHERE Login_Id=? ");
        } else {
            $stmt = $conn->prepare("SELECT * FROM user_login_details WHERE Addhar_No=? ");
        }

        $stmt->bind_param("s", $searchNo);
        $exe = $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $returnData["UserDetails"] = $row;

                // Query for medical details
                $q2 = $conn->prepare("SELECT q1.File_Name,q1.UMH_Id,q1.Login_Id,q1.Remarks,q1.Amount,q1.Date_Of_Entry,q2.Hospital_Name,q3.Name as IssueName,q3.Remarks as IssueRemarks FROM usermedicalhistorymaster q1,hospital_details_master q2,medical_illness_master q3 WHERE q1.Hospital_Id = q2.Hospital_Id and q1.HealthIssueId = q3.HealthIssueId and q1.Login_Id = ? ");
                $q2->bind_param("s", $row["Login_Id"]);
                $exe2 = $q2->execute();
                $result2 = $q2->get_result();

                if ($result2->num_rows > 0) {
                    while ($PMHD = $result2->fetch_assoc()) {
                        $returnData["MedicalDetails"][] = $PMHD;
                    }
                }
            }
        }
    }
    // If saving user details
    else if ($action == "save") {
        $loginId = $_REQUEST["Login_Id"];
        $aadharNo = $_REQUEST["Aadhar_No"];
        $name = $_REQUEST["Name"];
        $dob = $_REQUEST["DOB"];
        $gender = $_REQUEST["Gender"];
        $address = $_REQUEST["Address"];

        // Insert query to save user details
        $stmt = $conn->prepare("INSERT INTO user_login_details (Login_Id, Addhar_No, Name, DOB, Gender, Address) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $loginId, $aadharNo, $name, $dob, $gender, $address);
        $exe = $stmt->execute();

        if ($exe) {
            $returnData["message"] = "New patient added successfully.";
        } else {
            $returnData["message"] = "Failed to add new patient.";
        }
    }

    echo json_encode($returnData);

} catch (Exception $e) {
    // Handle exceptions
    echo json_encode(["error" => $e->getMessage()]);
} finally {
    $conn->close(); // Ensure the connection is closed
}
