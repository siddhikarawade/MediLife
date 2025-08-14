<?php
require_once '../../common/connectToDB.php';
$conn->begin_transaction();
try {
    if (isset($_POST['checkValidate'])) {
        $locationName = $_POST['locationName'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $carType = $_POST['carType'];

        $sql    = "SELECT *  from carsdetails where carLocation like '%" . $locationName . "%' and str_to_Date(carDate,'%Y-%m-%d') between str_to_date('" . $startDate . "','%d/%m/%Y') and str_to_date('" . $endDate . "','%d/%m/%Y') and carStatus='false' ";
        if ($carType != "all") $sql = $sql . " and carSize='" . $carType . "'";
        // echo $sql;
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
                            <div class='col-md-3'>
                                <div class='form-group tAC'>
                                    <input type='button' class='btn btn-success btn-sm '  value='Rent Now' onclick='rentNow(" . $row['carID'] . ",this)' />
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
