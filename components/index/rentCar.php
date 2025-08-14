<?php
session_start();

require '../../common/header.php';
require '../../common/navbar.php';

?>

<div class="content-wrapper ">
    <section class="content ">
        <div class="container-fluid">
            <div class=" b30">
                <div class="row">

                    <?php
                    $carID = '';
                    $loginToken = '';
                    $userLogin = '';
                    $Userlocation =  '';
                    $userStartDate =  '';
                    $userEndDate =  '';
                    $loginPhoneNumber = '';
                    $loginGmail = '';
                    $flag = 0;
                    require_once '../../common/connectToDB.php';
                    $conn->begin_transaction();
                    try {
                        if (isset($_GET['ID'])) {
                            $carID = $_GET['ID'];
                            $loginToken = $_GET['userLoginToken'];
                            $userLogin = $_GET['userLogin'];
                            $userlocation = $_GET['location'];
                            $userStartDate = $_GET['startTime'];
                            $userEndDate = $_GET['endDate'];
                            $loginPhoneNumber = '';
                            $loginGmail = '';


                            if ($userLogin != "guest") {
                                $sql    = "SELECT * from userLoginDetails where loginID =" . $loginToken . ";";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    $flag = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        $loginGmail = $row['emailId'];
                                        $loginPhoneNumber = $row['contactNumber'];
                                    }
                                }
                            }

                            $sql    = "SELECT * from carsdetails where carID ='" . $carID . "';";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $i = 0;
                                while ($row = $result->fetch_assoc()) {
                                    $margin = $i == 0 ? 'mT30' : '';
                                    echo "
                                <div class='col-12'>
                                    <div class='card $margin'>
                                        <div class='card-header'>
                                            <h5 class='card-title'>" . $row['carName'] . "</h5>
                                        </div>
                                        <div class='card-body'>
                                        <div class='row'>
                                            <div class='col-md-3'>
                                                <div class='form-group'>
                                                    <img id='carPhotoImagePreview' class='' src='../../dist/img/carImages/" . $row['carImgDist'] . "'  style='height:150px;width:100%;' />
                                                </div>
                                            </div>
                                            <div class='col-md-1'>
                                            </div>
                                            <div class='col-md-2'>
                                                <div class='form-group'>
                                                    <h5 style='font-size: 15px;' ><i class='fas fa-user'></i> " . $row['carSeat'] . " Seats </h5>
                                                    <h5 style='font-size: 15px;'><i class='fas fa-suitcase'></i> " . $row['carLuggage'] . " Luggage</h5>
                                                </div>
                                            </div>
                                            <div class='col-md-3'>
                                                <div class='form-group'>
                                                    <h5 style='font-size: 15px;'><i class='fas fa-clock'></i> " . $row['carDate'] . " Date</h5>
                                                    <h5 style='font-size: 15px;'><i class='fas fa-location-arrow'></i> " . $row['carLocation'] . " Location</h5>
                                                </div>
                                            </div>
                                            <div class='col-md-3'>
                                                <div class='form-group tAC '>
                                                    <b style='font-size: 35px !important;'>₹<i class='fas fa-rupees'></i>" . $row['carBasePrice'] . "</b><br>
                                                </div>
                                            </div>
                                            <div class='col-md-9'>
                                                <div class='form-group tAC'>
                                                    <b style='font-size: 20px !important;'>Rating <i class='fas fa-rupees'></i>" . $row['carRating'] . " / 10</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12'>
                                    <div class='card mT32'>
                                        <div class='card-body'>
                                            <div class='row'>
                                                <div class='col-md-4'>
                                                    <div class='form-group tAC '>
                                                        <input type='number' class='form-control  '  value='$loginPhoneNumber' id='contactNumber' placeholder='Enter Contact Number'/>
                                                    </div>
                                                </div>
                                                <div class='col-md-5'>
                                                    <div class='form-group tAC'>
                                                        <input type='text' class='form-control' value='$loginGmail'  id='emailID'  placeholder='Enter Gmail Account' />
                                                    </div>
                                                </div>
                                                <div class='col-md-3'>
                                                    <div class='form-group tAC'>
                                                        <input type='button' class='btn btn-success btn-block'  value='Book Car' onclick='saveCarRentDetails(" . $flag . ",this)' />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-md-12'>
                                                    <div class='form-group tAC'>
                                                        <p id='errorMessage' style='color:#ff6666'></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                                    $i += 1;
                                }
                            } else {
                                echo "
                                    <div class='col-12'>
                                        <div class='card mT32'>
                                            <div class='card-header'>
                                                <h5 class='card-title'>Error</h5>
                                            </div>
                                            <div class='card-body'>
                                            <div class='row'>
                                                <div class='col-md-12'>
                                                    <div class='form-group'>
                                                        <h5 class='tAC' style='font-size: 30px;'><i class='fas fa-times mR-2'></i>No Car Found.</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                            }
                        } else {
                            echo "<h3>Contact Jainam Jain because server is down</h3>";
                        }
                        $conn->commit();
                    } catch (mysqli_sql_exception $exception) {
                        $conn->rollback();

                        throw $exception;
                    }
                    $conn = null;
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<?php require  '../../common/footer.php'; ?>


<script>
    function errorMessage(message) {
        document.getElementById("errorMessage").innerHTML = message;
    }

    function validateEmail(email) {
        const re = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;
        return re.test(String(email).toLowerCase());
    }

    let saveCarRentDetails;
    $(document).ready(() => {
        saveCarRentDetails = (flag, element) => {
            element.disabled = true;
            let carId = <?php echo json_encode($carID); ?>;
            let locationName = '<?php echo json_encode($userlocation); ?>';
            let startDate = '<?php echo json_encode($userStartDate); ?>';
            let endDate = '<?php echo json_encode($userEndDate); ?>';
            let userLoginToken = localStorage.getItem("loginToken");
            let userLoginFlag = localStorage.getItem("loginFlag");
            let phoneNumber = document.getElementById("contactNumber");
            let gmailAccount = document.getElementById("emailID");

            phoneNumber.style.background = "";
            gmailAccount.style.background = "";

            if (phoneNumber.value.trim() == '') {
                phoneNumber.style.background = "#ff6666";
                errorMessage("Enter Your Contact No.");
                element.disabled = false;
                return 0;
            }
            if (phoneNumber.value.trim().length < 9) {
                phoneNumber.style.background = "#ff6666";
                errorMessage("InValid Contact No.");
                element.disabled = false;
                return 0;
            }
            if (gmailAccount.value.trim() == '') {
                gmailAccount.style.background = "#ff6666";
                errorMessage("Enter Your Email Account.");
                element.disabled = false;
                return 0;
            }

            if (!validateEmail(gmailAccount.value.trim())) {
                gmailAccount.style.background = "#ff6666";
                errorMessage("Email Account is not in correct format");
                element.disabled = false;
                return 0;
            }
            errorMessage("");

            $.post('saveCarRentDetails.php', {
                "checkValidate": true,
                'carId': carId,
                'userLoginToken': userLoginToken,
                'userLoginFlag': userLoginFlag,
                'phoneNumber': phoneNumber.value.trim(),
                'gmailAccount': gmailAccount.value.trim(),
                'locationName': locationName.trim(),
                'startDate': startDate.trim(),
                'endDate': endDate.trim(),
            }, function(data) {
                //console.log(data);
                alert("Car Booked Successfully!")
                window.location.href = "index.php";
                element.disabled = false;
            });
        }
    });
</script>