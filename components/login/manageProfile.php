<?php require '../../common/header.php'; ?>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Profile</b></a>
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
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
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
    var uName, pass = '';

    function setHeaders() {
        uName,
        pass = '',
        number = '';

        uName = document.getElementById("username").value.trim();
        pass = document.getElementById("password").value.trim();
        number = document.getElementById("number").value.trim();

        return 1;
    }

    function showError(id, color, message) {
        document.getElementById(id).style.backgroundColor = color;
        document.getElementById('errorMessage').innerHTML = message;
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

        if (number == '') {
            showError('number', '#ff6666', "Phone Number cannot be blank");
            return 0;
        } else showError('number', 'white', '');

        if (number.length < 9) {
            showError('number', '#ff6666', "Phone Number is not in correct format.");
            return 0;
        } else showError('number', 'white', '');
        return 1;
    }

    function save() {
        if (formValidation() == 0) return;
        else {
            document.getElementById('successMessage').innerHTML = "Registering the credentials.. Please wait..";

            $.post('saveUser.php', {
                'userName': uName,
                'pass': pass,
                'phoneNumber': number,
            }, function(data) {
                document.getElementById('successMessage').innerHTML = '';
                var d = data.split('%%');
                // console.log(d);
                localStorage.setItem("loginFlag", "user");
                localStorage.setItem("loginUserName", d[2]);
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