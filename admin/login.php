<html lang="en">

<head>
    <title>Login Page</title>
    <meta name="keywords" content="Sanyam Jain India" />
    <meta name="description" content="Sanyam Jain India ">
    <meta name="author" content="Sanyam Jain">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Favicon -->
    <link href="" id="faviconImg" rel="shortcut icon" />

    <div class="loader"></div>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="" id="fontawesomeFree">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="" id="tempusdominusBootstrap">

    <!-- Select2 -->
    <link rel="stylesheet" href="" id="select2MinCss">
    <link rel="stylesheet" href="" id="select2Bootstrap">

    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="" id="iCheckBootstrap">
    <!-- JQVMap -->
    <link rel="stylesheet" href="" id="jqvmapMicCss">
    <!-- Theme style -->
    <link rel="stylesheet" href="" id="adminlteMinCss">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="" id="overlayScrollbarsMinCss">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="" id="daterangepickerMinCss">
    <!-- summernote -->
    <link rel="stylesheet" href="" id="summernoteMinCss">
    <!-- custom css -->
    <link rel="stylesheet" href="" id="customCss">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition login-page basic_walpaper">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Admin Panel</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <div>
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
                                <span class="fas fa-eye pointer" onclick="togalPassword(document.getElementById('password'))"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <input type="button" class="btn btn-primary btn-block" value="Sign In" onclick="loginToSystem()" />
                        </div>
                        <!-- /.col -->
                    </div>
                    <p class="mb-0" id="successMessage" style="color: green; font-size: 1em; text-align: center;">
                    </p>
                    <p class="mb-0" id="errorMessage" style="color: red; font-size: 1em; text-align: center;">
                    </p>
                    <span id="bDetails">
                    </span>
                </div>

            </div>
        </div>
    </div>

    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/adminlte.min.js"></script>

</body>

</html>
<script>
    $(window).on('load', function() {
        $(".loader").fadeOut("slow");
    });
</script>
<script type="text/javascript">
    function togalPassword(element) {
        if (element.type === "password") {
            element.type = "text";
        } else {
            element.type = "password";
        }
    }
    var uName = '',
        pass = '';

    function setHeaders() {
        uName = '',
            pass = '';

        uName = document.getElementById("username").value.trim();
        pass = document.getElementById("password").value.trim();

        return 1;
    }

    function validateEmail(email) {
        const re = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;
        return re.test(String(email).toLowerCase());
    }

    function showError(id, color, message) {
        document.getElementById(id).style.backgroundColor = color;
        document.getElementById('errorMessage').innerHTML = message;
    }

    function formValidation() {
        if (setHeaders() == 0) return 0;

        if (uName == '') {
            showError('username', '#ff6666', "Username cannot be blank");
            return 0;
        } else showError('username', 'white', '');

        if (!validateEmail(uName)) {
            showError('username', '#ff6666', "UserName is not in correct format. Please correct it.");
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
                document.getElementById('successMessage').innerHTML = '';
                console.log(data);
                if (data.length > 1)
                    alert(data);
                else window.location.href = 'components/index/index.php';
            });
        }
    }
    
    



</script>

<script>
    var dots = "";

    var faviconImg = dots + "../dist/img/basicWallpaper.jpg";
    var fontawesomeFree = dots + "../plugins/fontawesome-free/css/all.min.css";
    var iCheckBootstrap = dots + "../plugins/icheck-bootstrap/icheck-bootstrap.min.css";
    var adminlteMinCss = dots + "../dist/css/adminlte.min.css";
    var tempusdominusBootstrap = dots + "../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css";
    var jqvmapMicCss = dots + "../plugins/jqvmap/jqvmap.min.css";
    var overlayScrollbarsMinCss = dots + "../plugins/overlayScrollbars/css/OverlayScrollbars.min.css";
    var daterangepickerMinCss = dots + "../plugins/daterangepicker/daterangepicker.css";
    var summernoteMinCss = dots + "../plugins/summernote/summernote-bs4.css";
    var customCss = dots + "../dist/css/custom.css";
    var select2MinCss = dots + "../plugins/select2/css/select2.min.css";
    var select2Bootstrap = dots + "../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css";

    var dataTableCss = dots + "../assets/css/datatables.css";
    var jqueryMinJs = dots + "../plugins/jquery/jquery.min.js";
    var jqueryUiMinJS = dots + "../plugins/jquery-ui/jquery-ui.js";
    var jqueryVmapMinJS = dots + "../plugins/jqvmap/jquery.vmap.min.js";
    var jqueryMapsMinJS = dots + "../plugins/jqvmap/maps/jquery.vmap.usa.js";
    var jqueryKnobMinJS = dots + "../plugins/jquery-knob/jquery.knob.min.js";
    // var jqueryKnobMinJS = dots + "";

    // console.log(animateMin);
    if (document.getElementById("faviconImg")) document.getElementById("faviconImg").href = faviconImg;
    if (document.getElementById("fontawesomeFree")) document.getElementById("fontawesomeFree").href = fontawesomeFree;
    if (document.getElementById("iCheckBootstrap")) document.getElementById("iCheckBootstrap").href = iCheckBootstrap;
    if (document.getElementById("adminlteMinCss")) document.getElementById("adminlteMinCss").href = adminlteMinCss;
    if (document.getElementById("tempusdominusBootstrap")) document.getElementById("tempusdominusBootstrap").href =
        tempusdominusBootstrap;
    if (document.getElementById("jqvmapMicCss")) document.getElementById("jqvmapMicCss").href = jqvmapMicCss;
    if (document.getElementById("overlayScrollbarsMinCss")) document.getElementById("overlayScrollbarsMinCss").href =
        overlayScrollbarsMinCss;
    if (document.getElementById("daterangepickerMinCss")) document.getElementById("daterangepickerMinCss").href =
        daterangepickerMinCss;
    if (document.getElementById("summernoteMinCss")) document.getElementById("summernoteMinCss").href = summernoteMinCss;
    if (document.getElementById("customCss")) document.getElementById("customCss").href = customCss;
    if (document.getElementById("select2MinCss")) document.getElementById("select2MinCss").href = select2MinCss;
    if (document.getElementById("select2Bootstrap")) document.getElementById("select2Bootstrap").href = select2Bootstrap;
    if (document.getElementById("dataTableCss")) document.getElementById("dataTableCss").href = dataTableCss;


    if (document.getElementById("jqueryMinJs")) document.getElementById("jqueryMinJs").src = jqueryMinJs;
    if (document.getElementById("jqueryUiMinJS")) document.getElementById("jqueryUiMinJS").src = jqueryUiMinJS;
    if (document.getElementById("jqueryVmapMinJS")) document.getElementById("jqueryVmapMinJS").src = jqueryVmapMinJS;
    if (document.getElementById("jqueryMapsMinJS")) document.getElementById("jqueryMapsMinJS").src = jqueryMapsMinJS;
    if (document.getElementById("jqueryKnobMinJS")) document.getElementById("jqueryKnobMinJS").src = jqueryKnobMinJS;
</script>