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
require '../../common/navbar.php';



?>
<div class="modal fade" id="modalnewuser">
    <form id="saveNewPatient">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Patient</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeEditModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-xl-3">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" id="editfirstName" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-xl-3">
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" class="form-control" placeholder="Middle Name" id="editmiddleName" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-xl-3">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name" id="editlastName" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-xl-3">
                            <div class="form-group">
                                <label>AdharCard No</label>
                                <input type="text" class="form-control" placeholder="Aadhar Card" id="editadharcardno" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-xl-3">
                            <div class="form-group">
                                <label>Mobile No</label>
                                <input type="text" class="form-control" placeholder="Mobile No" id="editmobileNo" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-xl-9">
                            <div class="form-group">
                                <label>Patient Address</label>
                                <input type="text" class="form-control" placeholder="Address" id="editAddress" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <p id='modalErrorMessage' class="text-center" style="color: red; font-size: 1.2em;   text-align: center;">
                    </p>
                    <p id='modalSuccessMessage' class="text-center" style="color: #25C032; font-size: 1.2em;   text-align: center;">
                    </p>
                    <span id="savedData">
                    </span>
                </div>
                <div class="row ">
                    <div class="modal-footer w100">
                        <button type="button" class="btn btn-primary" id="save" onclick="saveNewPatient()">Save</button>
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
</div>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-4 col-md-3">
                                    <div class="form-group">
                                        <label>Search Type</label>
                                        <select class="form-control select2bs4" id="searchType">
                                            <option value="UniqueId">UniqueId</option>
                                            <option value="AdharcardNo">AdharCard No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-md-3">
                                    <div class="form-group">
                                        <label>Enter No</label>
                                        <input type="text" class="form-control" placeholder="Enter No" id="searchNo">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-md-1" style="margin-top: 38px;">
                                    <div class="form-group">
                                        <input type="button" class="btn btn-primary" value="Fetch" name="search" id="fetchDetails" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-md-3" style="margin-top: 38px;">
                                    <div class="form-group">
                                        <a class='btn btn-success btn-xl btn-fill' href='#' title='Add New Patient' data-toggle='modal' data-target='#modalnewuser'>
                                            <i class='fas fa-user fs-2x'>
                                                New Patient
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.info-box-content -->
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-4 col-xl-3">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="First Name" id="firstName">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-xl-3">
                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input type="text" class="form-control" placeholder="Middle Name" id="middleName">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-xl-3">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name" id="lastName">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-xl-3">
                                    <div class="form-group">
                                        <label>AdharCard No</label>
                                        <input type="text" class="form-control" placeholder="Aadhar Card" id="adharcardno">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-xl-3">
                                    <div class="form-group">
                                        <label>Mobile No</label>
                                        <input type="text" class="form-control" placeholder="Mobile No" id="mobileNo">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-xl-9">
                                    <div class="form-group">
                                        <label>Patient Address</label>
                                        <input type="text" class="form-control" placeholder="Address" id="Address">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.row -->

                <div class="col-12 col-sm-12 col-md-12">
                    <div class="info-box mb-3 ">
                        <!-- <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book"></i></span> -->

                        <div class="info-box-content wM28">
                            <span class="info-box-text"><b>Previous Medical History</b></span>
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
                                    <tbody id="tableData">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="info-box mb-3 ">
                        <!-- <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book"></i></span> -->

                        <div class="info-box-content wM28">
                            <span class="info-box-text"><b>Add Patient Report</b></span>
                        </div>
                        <div class="card card-body">
                            <div class="row">    
                            <div class="col-12 col-sm-4 col-md-3">
                                    <div class="form-group">
                                        <label>Issue Found</label>
                                        <select class="form-control select2bs4" id="issue_type">
                                            <option value="1">Common Cold</option>
                                            <option value="2">Jaundice</option>
                                            <option value="3">Pneumonia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 tAC">
                                    <div class="custom-file">
                                        <label>Select Image of Prescription</label><br>
                                        <label class=" btn btn-success">Choose Image
                                            <input type="file" accept="image/*" id="Image_Patient" onchange="loadImageFile(event)" hidden />
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 tAC">
                                    <div class="form-group">
                                        <label>Preview</label><br>
                                        <img id="PreviewImage" height="200" width="200" src="" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-xl-1" style="margin-left:30px">
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input type="text" class="form-control" placeholder="Amount" id="amount">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-xl-2" style="margin-left:30px">
                                    <div class="form-group">
                                        <label>Patient Diagnose Remarks</label>
                                        <textarea class="form-control" placeholder="Remarks" id="remarks"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-md-1" style="margin-top: 38px; margin-left:30px;">
                                    <div class="form-group">
                                        <input type="button" class="btn btn-success" value="Save" id="save_report" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!--/. container-fluid -->

<script src="../../../plugins/jquery/jquery.min.js"></script>
<script src="../../../plugins/moment/moment.min.js"></script>
<script src="../../../plugins/select2/js/select2.full.min.js"> </script>
<script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>


<script>
    // Function to load image preview when a file is selected

    var loadImageFile = function(event) {
        var file, img;
        if ((file = event.target.files[0])) {
            img = new Image();
            var objectUrl = URL.createObjectURL(file);
            img.onload = function() {
                var PreviewImage = document.getElementById('PreviewImage');
                PreviewImage.src = objectUrl;
                URL.revokeObjectURL(objectUrl); // Correct object URL revocation
            };
            img.src = objectUrl;
        }
    };

    function openReceipt(user_id, receipt_id) {
        window.open("ViewReceipt.php?getpdf=1&user_id=" + user_id + "&receipt_id=" + receipt_id);
    }


    // Document Ready: Wait until DOM is fully loaded
    $(document).ready(function() {

        // Function to retrieve user details based on search
        function getDetails() {
            var searchType = $('#searchType').val();
            var searchNo = $('#searchNo').val();

            if (!searchNo) {
                alert("Please enter Search No.");
                return;
            }

            $.ajax({
                url: "./getUserDetails.php", // Ensure this points to the correct back-end file
                type: 'POST',
                dataType: 'json',
                data: {
                    'action': 'search', // Send the action parameter to indicate searching
                    'searchType': searchType,
                    'searchNo': searchNo,
                },
                success: function(data) {
                    if (data && data.UserDetails) {
                        var UserDetails = data.UserDetails;
                        $('#firstName').val(UserDetails.User_First_Name);
                        $('#middleName').val(UserDetails.User_Middle_Name);
                        $('#lastName').val(UserDetails.User_Last_Name);
                        $('#adharcardno').val(UserDetails.Addhar_No);
                        $('#mobileNo').val(UserDetails.Mobile_No);
                        $('#Address').val(UserDetails.Address);
                    } else {
                        alert("User details not found.");
                    }

                    if (data && data.MedicalDetails) {
                        var MedicalDetails = data.MedicalDetails;
                        var html_string = "";
                        var i = 1;
                        $.each(MedicalDetails, function(key, value) {
                            html_string += `
                                <tr>
                                    <td style="width: 10px" class="p510 tAC">${i}</td>
                                    <td class="p510 tAC">${value.Date_Of_Entry}</td>
                                    <td class="p510 tAC">${value.Hospital_Name}</td>
                                    <td class="p510 tAC">${value.IssueName}</td>
                                    <td class="p510 tAC">
                                    <a href="../${value.File_Name}" target="_blank">
                                        <img src="../${value.File_Name}" alt="Not found" width="100" height="100" style="object-fit: cover;">
                                    </a>
                                </td>

                                    <td class="p510 tAC">${value.Remarks}</td>
                                    <td class="p510 tAC">${value.Amount}</td>
                                    <td class="p510 tAC">
                                        <div class="form-group">
                                            <input type="button" class="btn btn-success" value="view" 
                                                   onclick="openReceipt(${value.Login_Id}, ${value.UMH_Id})" />
                                        </div>
                                    </td>
                                </tr>`;
                            i++;
                        });
                        $('#tableData').html(html_string);
                    } else {
                        $('#tableData').html("<tr><td colspan='8'>No medical records found.</td></tr>");
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error: " + error);
                    alert("An error occurred while fetching details.");
                }
            });
        }

        // Ensure the search button triggers the getDetails function
        $('#fetchDetails').on('click', getDetails);

        // Save report when 'save_report' button is clicked
        $(document).on('click', '#save_report', function(ev) {
            ev.preventDefault();

            var searchType = $('#searchType').val();
            var searchNo = $('#searchNo').val();
            var issue_type = $('#issue_type').val();
            var remarks = $('#remarks').val();
            var amount = $('#amount').val();

            if (!searchNo) {
                alert("Please enter Search No.");
                return;
            }

            var input = document.getElementById("Image_Patient");
            var Image_Patient = input.files[0];

            if (input.files.length === 0) {
                alert("Please select an Image.");
                return;
            }

            var formData = new FormData();
            formData.append("save_report", "1");
            formData.append("searchType", searchType);
            formData.append('searchNo', searchNo);
            formData.append('issue_type', issue_type);
            formData.append('Image_Patient', Image_Patient);
            formData.append('remarks', remarks);
            formData.append('amount', amount);

            if (confirm("Are you sure you want to save the Report?")) {
                $.ajax({
                    url: "saveReport.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        getDetails();
                    },
                    error: function(xhr, status, error) {
                        alert("Error: Could not save report.");
                    }
                });
            }
        });



    });

    // Function to save new patient details
    function saveNewPatient() {
        // Retrieve form values
        const firstName = $('#editfirstName').val().trim();
        const middleName = $('#editmiddleName').val().trim();
        const lastName = $('#editlastName').val().trim();
        const adharCardNo = $('#editadharcardno').val().trim();
        const mobileNo = $('#editmobileNo').val().trim();
        const address = $('#editAddress').val().trim();

        // Clear any previous error/success messages
        $('#modalErrorMessage').text('');
        $('#modalSuccessMessage').text('');

        const nameRegex = /^[a-zA-Z ]+$/;
    const aadharRegex = /^\d{12}$/;
    const mobileRegex = /^\d{10}$/;

    // First Name
    if (!firstName || !nameRegex.test(firstName)) {
        $('#modalErrorMessage').text('First Name is required and should contain only letters.');
        return;
    }

    // Middle Name (optional, but if provided, must be valid)
    if (middleName && !nameRegex.test(middleName)) {
        $('#modalErrorMessage').text('Middle Name should contain only letters.');
        return;
    }

    // Last Name
    if (!lastName || !nameRegex.test(lastName)) {
        $('#modalErrorMessage').text('Last Name is required and should contain only letters.');
        return;
    }

    // Aadhar Number
    if (!adharCardNo || !aadharRegex.test(adharCardNo)) {
        $('#modalErrorMessage').text('Aadhar Number must be exactly 12 digits.');
        return;
    }

    // Mobile Number
    if (!mobileNo || !mobileRegex.test(mobileNo)) {
        $('#modalErrorMessage').text('Mobile Number must be exactly 10 digits.');
        return;
    }

    // Address
    if (!address) {
        $('#modalErrorMessage').text('Address cannot be blank.');
        return;
    }


        // // Basic validation (can be expanded as needed)
        // if (!firstName || !lastName || !mobileNo || !adharCardNo || !address) {
        //     $('#modalErrorMessage').text('Please fill out all required fields.');
        //     return;
        // }

        // Prepare data to send via POST
        const formData = {
            firstName: firstName,
            middleName: middleName,
            lastName: lastName,
            adharCardNo: adharCardNo,
            mobileNo: mobileNo,
            address: address,
            saveNewPatient: 1,
        };

        // Use jQuery POST method to send data to the server
        $.post('saveUser.php', formData, function(response) {
                if (response.success) {
                    $('#modalErrorMessage').text(response.message || 'Failed to add patient.');
                    // Success message
                   
                    // Optionally, reset form fields
                    $('#saveNewPatient')[0].reset();
                } else {
                    // Error message from the server
                    $('#modalSuccessMessage').text('Patient added successfully!');
                }
            })
            .fail(function() {
                // Handle any network errors
                $('#modalErrorMessage').text('An error occurred while saving the patient. Please try again.');
            });
    }
</script>

<?php require  '../../common/footer.php'; ?>