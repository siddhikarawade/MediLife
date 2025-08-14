<?php $currentPage = htmlspecialchars(basename($_SERVER['PHP_SELF'])) ?>

<?php
// print_r($currentPage);
$clientName = "Sanyam Jain";
$desc = "This website is designed by Sanyam Jain.";
switch ($currentPage) {
    case 'login.php':
        $keywords    = 'Sanyam Jain';
        $title       = 'Login Page - ' . $clientName;
        $description = $desc;
        break;

    case 'index.php':
        $keywords    = 'Sanyam Jain';
        $title       = 'Home Page - ' . $clientName;
        $description = $desc;
        break;

    case 'manageRides.php':
        $keywords    = 'Sanyam Jain';
        $title       = 'Manage Rides - ' . $clientName;
        $description = $desc;
        break;

    case 'addUser.php':
        $keywords    = 'Sanyam Jain';
        $title       = 'Add User - ' . $clientName;
        $description = $desc;
        break;


    default:
        if (strpos(htmlspecialchars($_SERVER['PHP_SELF']), 'about.php')) {
            $keywords    = 'Sanyam Jain';
            $title       = 'IWH';
            $description = $desc;
            break;
        }
        break;
}

//version for files
$fileVersion = rand();
?>
<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q8WBJP0FTL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Q8WBJP0FTL');
    </script>
    <title><?php echo $title ?></title>
    <meta name="keywords" content="<?php echo $keywords ?>" />
    <meta name="description" content="<?php echo $description ?>">
    <meta name="author" content="Finplan India">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Favicon -->
    <link href="" id="faviconImg" rel="shortcut icon" />

    <div class="loader"></div>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="" id="fontawesomeFree">

    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="" id="tempusdominusBootstrap">

    <!-- Select2 -->
    <link rel="stylesheet" href="" id="select2MinCss">
    <link rel="stylesheet" href="" id="select2Bootstrap">

    <!-- Theme style -->
    <link rel="stylesheet" href="" id="adminlteMinCss">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="" id="overlayScrollbarsMinCss">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="" id="daterangepickerMinCss">
    <!-- summernote -->
    <!-- <link rel="stylesheet" href="" id="summernoteMinCss"> -->
    <!-- custom css -->
    <link rel="stylesheet" href="" id="customCss" type="text/css">

    <!-- Google Font: Source Sans Pro -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->

</head>

<script>
    var dots = "";
    var loc = window.location.pathname;
    var temp = loc.split("components/");
    var extensionNo = Math.random();

    var temp2 = temp[1].split("/");
    dots = dots + "../";

    for (var i = 0; i < temp2.length - 1; i++) {
        dots = dots + "../";
    }
    var fontawesomeFree = dots + "plugins/fontawesome-free/css/all.min.css";
    var iCheckBootstrap = dots + "plugins/icheck-bootstrap/icheck-bootstrap.min.css";
    var adminlteMinCss = dots + "dist/css/adminlte.min.css";
    var tempusdominusBootstrap = dots + "plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css";
    var jqvmapMicCss = dots + "plugins/jqvmap/jqvmap.min.css";
    var overlayScrollbarsMinCss = dots + "plugins/overlayScrollbars/css/OverlayScrollbars.min.css";
    var daterangepickerMinCss = dots + "plugins/daterangepicker/daterangepicker.css";
    var datePicker = dots + "plugins/datepicker/css/bootstrap-datepicker.css";
    var summernoteMinCss = dots + "plugins/summernote/summernote-bs4.css";
    var customCss = dots + "dist/css/custom.css?v=" + extensionNo;
    var select2MinCss = dots + "plugins/select2/css/select2.min.css";
    var select2Bootstrap = dots + "plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css";

    var dataTableCss = dots + "assets/css/datatables.css";
    var jqueryMinJs = dots + "plugins/jquery/jquery.min.js";
    var jqueryUiMinJS = dots + "plugins/jquery-ui/jquery-ui.js";
    var jqueryVmapMinJS = dots + "plugins/jqvmap/jquery.vmap.min.js";
    var jqueryMapsMinJS = dots + "plugins/jqvmap/maps/jquery.vmap.usa.js";
    var jqueryKnobMinJS = dots + "plugins/jquery-knob/jquery.knob.min.js";

    // var jqueryKnobMinJS = dots + "";

    // console.log(animateMin);
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
    if (document.getElementById("datePicker")) document.getElementById("datePicker").href =
        datePicker;
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

    function formatDate(date) {
        var tempD = date.split("/");
        return tempD[2].trim() + "/" + tempD[1].trim() + "/" + tempD[0].trim();
    }
</script>