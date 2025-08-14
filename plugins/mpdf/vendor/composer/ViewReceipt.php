<?php
// session_start();
require_once '../../../common/connectToDB.php';


if (isset($_REQUEST["getpdf"])) {

    $user_id = $_REQUEST["user_id"];
    $receipt_id = $_REQUEST["receipt_id"];

    $data = "";

    $stmt = $conn->prepare("SELECT * FROM user_login_details WHERE Login_Id=? ");
    $stmt->bind_param("s", $user_id);
    $exe = $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnData["UserDetails"] = $row;

            $q2 = $conn->prepare("SELECT *,q1.Remarks as Patient_remarks FROM user_login_details as q0, `usermedicalhistorymaster` q1,hospital_details_master q2,medical_illness_master q3 WHERE q0.Login_Id = q1.Login_Id and  q1.`Hospital_Id` = q2.Hospital_Id and q1.`HealthIssueId` = q3.HealthIssueId and q0.`Login_Id` = ? and q1.UMH_Id = ?");
            $q2->bind_param("si", $row["Login_Id"], $receipt_id);
            $exe2 = $q2->execute();
            $result2 = $q2->get_result();
            if ($result2->num_rows > 0) {
                $i = 1;
                while ($PMHD = $result2->fetch_assoc()) {

                    $patientName = $PMHD["User_First_Name"] . " " . $PMHD["User_Middle_Name"] . " " . $PMHD["User_Last_Name"];
                    $patientAddress = $PMHD["Address"];
                    $visitDate = $PMHD["Date_Of_Entry"];
                    $doctorName = "Dr. Arora";
                    $totalAmount = $PMHD["Amount"];
                    $Name = $PMHD["Name"];
                    $Remarks = $PMHD["Patient_remarks"];


                    $data = '

    <div class="receipt">
        <h1>Medical Receipt</h1>
        <p class="patient-info">Patient Name: ' . $patientName . '</p>
        <p class="patient-info">Hospital Address: ' . $patientAddress . '</p>
        <p class="patient-info">Visit Date: ' . $visitDate . '</p>
        <p class="patient-info">Doctor: ' . $doctorName . '</p>
        <table class="table">
            <tr>
                <th>Illness</th>
                <th>Remarks</th>
                <th>Amount</th>
            </tr>
            <tr>
                <td>' . $Name . '</td>
                <td>' . $Remarks . '</td>
                <td>' . $totalAmount . '</td>
            </tr>
        </table>
        <p><strong>Total Amount:</strong> ' . $totalAmount . '</p>
    </div>
</body>
';
                }
            }
        }
    }

    require_once  '../';
    $html = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<style>
.receipt {
    text-align: center;
}
.patient-info {
    font-weight: bold;
}
.table {
    width: 100%;
    border-collapse: collapse;
}
.table th, .table td {
    border: 1px solid #000;
    padding: 5px;
}
body { font-size: 13px; font-family: freeserif;}
table {
	page-break-inside: avoid;
}
table {
    border-collapse: collapse;
  }
  .table_center {
    margin: auto;
    width: 70%;
    padding: 10px;
  }
</style>
</head>';
    $html1 = '<body>';
    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'c',
        'margin_left' => 8,
        'margin_right' => 8,
        'margin_top' => 6,
        'margin_bottom' => 8,
        'margin_header' => 0,
        'margin_footer' => 10,
    ]);

    // $mpdf->setFooter('{PAGENO}');
    $mpdf->SetHTMLFooter('<div style="text-align: center">{PAGENO} of {nbpg}</div>');
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->shrink_tables_to_fit = 1;
    $mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list

    // Load a stylesheet
    $stylesheet3 = file_get_contents('../../../dist/css/mpdf_styles.css');
    $mpdf->WriteHTML($stylesheet3, 1); // The parameter 1 tells that this is css/style only and no body/html/text

    $mpdf->WriteHTML($html);

    $mpdf->WriteHTML($html1);

    $mpdf->WriteHTML($data);

    // $mpdf->SetColumns(2, 'J');
    // $mpdf->WriteHTML($html3);

    $mpdf->Output();
}
