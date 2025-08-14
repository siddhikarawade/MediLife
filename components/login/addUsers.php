<?php require '../../common/header.php'; ?>

<body class="hold-transition login-page basic_walpaper">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Register</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <div>
                    <div class="input-group mb-3 tAC" style="display: block;">
                        <img class="logo-login" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="User Name" id="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" id="password">
                        <div class="input-group-append">
                            <div class="input-group-text" style="cursor: pointer;" onclick="togalPassword()">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="First Name" id="first_name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Middle Name" id="middle_name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Last Name" id="last_name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Addhar Card No" id="addhercard_no">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <textarea class="form-control" placeholder="Address" id="address"></textarea>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="Phone Number" id="number">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mT10">
                        <!-- /.col -->
                        <div class="col-12">
                            <input type="button" class="btn btn-primary btn-block" value="Save" onclick="save()" />
                        </div>
                        <!-- /.col -->
                    </div>
                    <p class="mb-0" id="successMessage" style="color: green; font-size: 1em; text-align: center;">
                    </p>
                    <p class="mb-0" id="errorMessage" style="color: red; font-size: 1em; text-align: center;">
                    </p>
                </div>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.content-wrapper -->
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

</body>

</html>

<script>
    $(window).on('load', function() {
        $(".loader").fadeOut("slow");
    });
</script>


<script type="text/javascript">
    var uName = "",
        pass = '',
        first_name = "",
        middle_name = "",
        last_name = "",
        addhercard_no = "",
        address = "",
        number = "";

    function setHeaders() {
        uName = "",
            pass = '',
            first_name = "",
            middle_name = "",
            last_name = "",
            addhercard_no = "",
            address = "",
            number = "";

        uName = document.getElementById("username").value.trim();
        pass = document.getElementById("password").value.trim();
        first_name = document.getElementById("first_name").value.trim();
        middle_name = document.getElementById("middle_name").value.trim();
        last_name = document.getElementById("last_name").value.trim();
        addhercard_no = document.getElementById("addhercard_no").value.trim();
        address = document.getElementById("address").value.trim();
        number = document.getElementById("number").value.trim();

        return 1;
    }

    function togalPassword() {
        var element = document.getElementById("password");
        if (element.type === "password") {
            element.type = "text";
        } else {
            element.type = "password";
        }
    }

    function showError(id, color, message) {
        document.getElementById(id).style.backgroundColor = color;
        document.getElementById('errorMessage').innerHTML = message;
    }

function formValidation() {
    if (setHeaders() === 0) return 0;

    // Username: non-empty (you can enforce alphanumeric if needed)
    if (uName.trim() === '') {
        showError('username', '#ff6666', "Username cannot be blank");
        return 0;
    } else {
        showError('username', 'white', '');
    }

    // Password: non-empty (you can enforce min length or special characters if needed)
    if (pass.trim() === '') {
        showError('password', '#ff6666', "Password cannot be blank");
        return 0;
    } else {
        showError('password', 'white', '');
    }

    // First Name: letters only
    if (first_name.trim() === '') {
        showError('first_name', '#ff6666', "First Name cannot be blank");
        return 0;
    } else if (!/^[A-Za-z]+$/.test(first_name)) {
        showError('first_name', '#ff6666', "First Name must contain only letters");
        return 0;
    } else {
        showError('first_name', 'white', '');
    }

    // Middle Name: letters only
    if (middle_name.trim() === '') {
        showError('middle_name', '#ff6666', "Middle Name cannot be blank");
        return 0;
    } else if (!/^[A-Za-z]+$/.test(middle_name)) {
        showError('middle_name', '#ff6666', "Middle Name must contain only letters");
        return 0;
    } else {
        showError('middle_name', 'white', '');
    }

    // Last Name: letters only
    if (last_name.trim() === '') {
        showError('last_name', '#ff6666', "Last Name cannot be blank");
        return 0;
    } else if (!/^[A-Za-z]+$/.test(last_name)) {
        showError('last_name', '#ff6666', "Last Name must contain only letters");
        return 0;
    } else {
        showError('last_name', 'white', '');
    }

    // Aadhar Number: exactly 12 digits
    if (addhercard_no.trim() === '') {
        showError('addhercard_no', '#ff6666', "Aadhar Number cannot be blank");
        return 0;
    } else if (!/^\d{12}$/.test(addhercard_no)) {
        showError('addhercard_no', '#ff6666', "Aadhar Number must be exactly 12 digits");
        return 0;
    } else {
        showError('addhercard_no', 'white', '');
    }

    // Address: non-empty (no specific format restriction)
    if (address.trim() === '') {
        showError('address', '#ff6666', "Address cannot be blank");
        return 0;
    } else {
        showError('address', 'white', '');
    }

    // Phone Number: exactly 10 digits
    if (number.trim() === '') {
        showError('number', '#ff6666', "Phone Number cannot be blank");
        return 0;
    } else if (!/^\d{10}$/.test(number)) {
        showError('number', '#ff6666', "Phone Number must be exactly 10 digits");
        return 0;
    } else {
        showError('number', 'white', '');
    }

    return 1;
}


    function save() {
        if (formValidation() == 0) return;
        else {
            document.getElementById('successMessage').innerHTML = "Registering the credentials.. Please wait..";

            $.post('saveUser.php', {
                'userName': uName,
                'pass': pass,
                'first_name': first_name,
                'middle_name': middle_name,
                'last_name': last_name,
                'addhercard_no': addhercard_no,
                'address': address,
                'phoneNumber': number,
            }, function(data) {
                document.getElementById('successMessage').innerHTML = '';
                var d = data.split('%%');
                // console.log(d);
                localStorage.setItem("loginFlag", "user");
                localStorage.setItem("loginUserName", d[2]);
                localStorage.setItem("LoginUserFullName", d[3]);
                localStorage.setItem("lastLogin", d[1]);
                localStorage.setItem("loginToken", d[0])
                if (d.length <= 1)
                    $('#errorMessage').html(data);
                else window.location.href = '../index/index.php';
            });
        }
    }

    function register() {
        window.location.href = "addUsers.php";
    }
</script>