<?php
session_start();
require_once '../../common/connectToDB.php';


error_reporting(E_ALL);
//ini_set — Sets the value of a configuration option.Sets the value of the given configuration option. The configuration option will keep this new value during the script's execution, and will be restored at the script's ending.
ini_set('display_errors', 1);
try {

    if (isset($_REQUEST["searchType"]) && $_REQUEST["searchType"] == "Hospital") {
        $returnData = [];


        $stmt = $conn->prepare("SELECT * FROM hospital_details_master ");
        $exe = $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $returnData[] = $row;
            }
        }
        echo json_encode($returnData);
    }
} catch (\Throwable $th) {
    // throw $th;
}
