<?php require '../../common/header.php'; ?>

<body class="hold-transition login-page basic_walpaper">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>User Login</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <div>
                    <div class="input-group mb-3 tAC" style="display: block;">
                        <img class="logo-login" src="../../dist/img/avatar.jpg">
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
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <input type="button" class="btn btn-success btn-block" value="Log In" onclick="loginToSystem()" />
                        </div>
                        <div class="col-12 mt-2">
                            <input type="button" class="btn btn-primary btn-block" value="Register New User" onclick="RegisterNewUser()" />
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
    var uName, pass = '';

    function setHeaders() {
        uName,
        pass = '';

        uName = document.getElementById("username").value.trim();
        pass = document.getElementById("password").value.trim();

        return 1;
    }

    function showError(id, color, message) {
        document.getElementById(id).style.backgroundColor = color;
        document.getElementById('errorMessage').innerHTML = message;
    }

    function togalPassword() {
        var element = document.getElementById("password");
        if (element.type === "password") {
            element.type = "text";
        } else {
            element.type = "password";
        }
    }

    function formValidation() {
        if (setHeaders() == 0) return 0;

        if (uName == 0) {
            showError('username', '#ff6666', "Username cannot be blank");
            return 0;
        } else showError('username', 'white', '');

        if (pass == '') {
            showError('password', '#ff6666', "Password cannot be blank");
            return 0;
        } else showError('password', 'white', '');
        return 1;
    }

    function loginToSystem() {
        if (formValidation() == 0) return;
        else {
            // alert("Checking the credentials.");
            document.getElementById('successMessage').innerHTML = "Checking the credentials.. Please wait..";

            $.post('login_process.php', {
                'userName': uName,
                'pass': pass,
            }, function(data) {
                // console.log(data);
                document.getElementById('successMessage').innerHTML = '';
                var d = data.split('%%');
                localStorage.setItem("loginFlag", "user");
                localStorage.setItem("loginUserName", d[2]);
                localStorage.setItem("lastLogin", d[1]);
                localStorage.setItem("LoginUserFullName", d[3]);
                localStorage.setItem("loginToken", d[0]);
                if (d.length <= 1)
                    alert(data);
                // $('#errorMessage').html(data);
                else window.location.href = '../index/index.php';
            });
        }
    }

    function RegisterNewUser() {
        window.location.href = "addUsers.php";
    }
</script>