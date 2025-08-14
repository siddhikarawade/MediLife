<?php
session_start();
if (isset($_SESSION['loginsuccess'])) {
    if ($_SESSION['loginsuccess'] > 0) {
    } else {
        header('Location: ../../login.php');
        exit;
    }
} else {
    header('Location: ../../login.php');
    exit;
}
require '../../common/header.php';
// require_once '../../common/connectToDB.php';

require '../../common/navbar.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <form id="hospitalAddForm" action="./getDetails.php" method="post">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="tAC" id="pageTitle">Master Hospitals</h3>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Hospital Name*</label>
                                            <input type="text" class="form-control" id="hospitalName" placeholder="Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Email*</label>
                                        <div class="input-group my-colorpicker2">
                                            <input type="text" class="form-control" id="hospitalEmail" placeholder="Email" value="">
                                            <div class="input-group-append">
                                                <span class="input-group-text"> <i class="fas fa-envelope"> </i> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Contact No*</label>
                                        <div class="input-group my-colorpicker2">
                                            <input type="number" class="form-control" id="contactNo" placeholder="Enter ContactNo" value='C' />
                                            <div class="input-group-append">
                                                <span class="input-group-text"> <i class="fas fa-phone"> </i> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Address*</label>
                                        <div class="form-group">
                                            <textarea rows="4" class="form-control" id="Address" style="width: 100%;" placeholder="Enter Address" value=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer tAC">
                                <p id='errorMessage' class="text-center" style="color: red; font-size: 1.2em;   text-align: center;">
                                </p>
                                <p id='successMessage' class="text-center" style="color: #25C032; font-size: 1.2em;   text-align: center;">
                                </p>
                                <input type="button" class="btn btn-success" id="submit" value="Save Hospital" />
                                <span id="utilSuccessDetails">
                                </span>
                            </div>
                            <div class=" util1">All Hospital List
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped projects tAC" id="utilityTable">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Hospital Name</th>
                                            <th>Email</th>
                                            <th>Contact No</th>
                                            <th>Address</th>
                                            
                                            <!-- <th style="width: 5%">
                                            <input type="button" onclick="addTableRow()" id="addButton1" title="Add New Row" class="imageButton addButton form-control " />
                                        </th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="utilityTableBody">
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<script src="../../../plugins/jquery/jquery.min.js"></script>
<script src="../../../plugins/moment/moment.min.js"></script>
<script src="../../../plugins/select2/js/select2.full.min.js"> </script>
<script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script>
    var loadFile = function(event) {
        var file, img;
        if ((file = event.target.files[0])) {
            img = new Image();
            var objectUrl = URL.createObjectURL(file);
            img.onload = function() {
                if (this.height > 200 && this.width > 200) {
                    alert("Selected Image is Larger than recommended Size");
                    $("#companyLogo").replaceWith($("#companyLogo").val('').clone(true));
                } else {
                    var companyLogoPreview = document.getElementById('companyLogoPreview');
                    companyLogoPreview.src = URL.createObjectURL(file);
                }
                URL.revokeObjectURL(file);
            };
            img.src = objectUrl;
        }
    };

    function getDetails() {
        $.ajax({
            url: "./getDetails.php",
            type: 'POST',
            data: {
                'searchType': "Hospital",
            },
            success: function(data) {

                $('#utilityTableBody').val("");

                if ($.fn.dataTable.isDataTable("#utilityTable")) {
                    table = $('#utilityTable').DataTable().clear().destroy();
                }

                globalTableDeclare = $('#utilityTable').DataTable({
                    "responsive": true,
                    "autoWidth": false,
                    "aLengthMenu": [
                        [-1],
                        ["All"]
                    ],
                    "pageLength": -1,
                    "aaSorting": [],
                    "search": {
                        regex: true
                    }
                });

                var JSONData = JSON.parse(data);

                var html_string = "";
                var i = 1;
                $.each(JSONData, function(key, value) {

                    html_string += `
                            <tr>
                                <td style="width: 10px" class="p510 tAC">${i}</td>
                                <td class="p510 tAC">${value.Hospital_Name}</td>
                                <td class="p510 tAC">${value.EmailId}</td>
                                <td class="p510 tAC">${value.ContactNo}</td>
                                <td class="p510 tAC">${value.Address}</td>
                                <td class="p510 tAC"></td>
                            </tr>
`;
                    i++;
                });
                $('#utilityTableBody').html(html_string);

            }
        });
    }
    getDetails();
</script>

<?php require  '../../common/footer.php'; ?>