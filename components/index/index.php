<?php
session_start();

require '../../common/header.php';
require '../../common/navbar.php';
require_once '../../common/connectToDB.php';

$conn->begin_transaction();
try {

    $stmt = $conn->prepare("SELECT * FROM user_login_details WHERE Login_Id=? ");
    $stmt->bind_param("s", $_SESSION["Login_Id"]);
    $exe = $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Dashboard</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <!-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    </ol> -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-12 col-sm-4 col-md-2">
                                                <div class="input-group mb-3">
                                                    <input type="text" readonly class="form-control" placeholder="First Name" value="<?php echo $row["User_First_Name"]; ?>" id="firstName">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-2">
                                                <div class="input-group mb-3">
                                                    <input type="text" readonly class="form-control" placeholder="Middle Name" value="<?php echo $row["User_Middle_Name"]; ?>" id="middleName">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-2">
                                                <div class="input-group mb-3">
                                                    <input type="text" readonly class="form-control" placeholder="Last Name" value="<?php echo $row["User_Last_Name"]; ?>" id="lastName">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-2">
                                                <div class="input-group mb-3">
                                                    <input type="text" readonly class="form-control" placeholder="Aadhar Card" value="<?php echo $row["Addhar_No"]; ?>" id="aadhar">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-2">
                                                <div class="input-group mb-3">
                                                    <input type="text" readonly class="form-control" placeholder="Mobile No" value="<?php echo $row["Mobile_No"]; ?>" id="mobile">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" readonly class="form-control" placeholder="Address" value="<?php echo $row["Address"]; ?>" id="address">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.row -->

                            <!-- ACCA Active Batches -->
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="info-box mb-3 ">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book"></i></span>

                                    <div class="info-box-content wM28">
                                        <span class="info-box-text">Previous Medical History</span>
                                    </div>
                                    <div class="card card-body p0">
                                        <div class="direct-chat-messages pTB0">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px" class="p510 tAC">#</th>
                                                        <th class="p510 tAC">Date Of Entry</th>
                                                        <th class="p510 tAC">Hospital Name</th>
                                                        <th class="p510 tAC">Medical Issue Name</th>
                                                        <th class="p510 tAC">Prescription</th>
                                                        <th class="p510 tAC">Remarks</th>
                                                        <th class="p510 tAC">Amount</th>
                                                        <th class="p510 tAC">Receipt</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $q2 = $conn->prepare("SELECT q1.File_Name,q1.Remarks,q1.Date_Of_Entry,q2.Hospital_Name,q3.Name as IssueName,q3.Remarks as IssueRemarks,q1.Amount,q1.Login_Id as userId,q1.UMH_Id FROM `usermedicalhistorymaster` q1,hospital_details_master q2,medical_illness_master q3 WHERE q1.`Hospital_Id` = q2.Hospital_Id and q1.`HealthIssueId` = q3.HealthIssueId and q1.Login_Id = ? ");
                                                    $q2->bind_param("s", $_SESSION["Login_Id"]);
                                                    $exe2 = $q2->execute();
                                                    $result2 = $q2->get_result();
                                                    if ($result2->num_rows > 0) {
                                                        $i = 1;
                                                        while ($PMHD = $result2->fetch_assoc()) {
                                                            echo '
                                                    <tr>
                                                        <td style="width: 10px" class="p510 tAC">' . $i . '</td>
                                                        <td class="p510 tAC">' . $PMHD["Date_Of_Entry"] . '</td>
                                                        <td class="p510 tAC">' . $PMHD["Hospital_Name"] . '</td>
                                                        <td class="p510 tAC">' . $PMHD["IssueName"] . '</td>
                                                        <td class="p510 tAC">
                                                        <a href="' . $PMHD["File_Name"] . '" >
                                                            <img src="' . $PMHD["File_Name"] . '" alt="Not found" width="100" height="100" style="object-fit: cover;">
                                                        </a>
                                                        </td>
                                                        <td class="p510 tAC">' . $PMHD["Remarks"] . '</td>
                                                        <td class="p510 tAC">' . $PMHD["Amount"] . '</td>
                                                        <td class="p510 tAC">
                                                            <div class="form-group">
                                                                <input type="button" class="btn btn-success" value="view" onclick="openReceipt(' . $PMHD["userId"] . ',' . $PMHD["UMH_Id"] . ')" />
                                                            </div>
                                                        </td>
                                                    </tr>';
                                                            $i++;
                                                        }
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>

                        <!-- Students Pending Enrollment -->


                        <!-- Upcoming lectures -->

                        <!-- Fee -->

                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!--/. container-fluid -->

<?php
        }
    }
    $conn->commit();
} catch (mysqli_sql_exception $exception) {
    $conn->rollback();

    throw $exception;
}
$conn = null;
?>


<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/select2/js/select2.full.min.js"> </script>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script>
    function openReceipt(user_id, receipt_id) {
        window.open("ViewReceipt.php?getpdf=1&user_id=" + user_id + "&receipt_id=" + receipt_id);
    }
    
</script>

<?php require  '../../common/footer.php'; ?>