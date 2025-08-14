<!-- <footer class="main-footer">
    <strong>All rights reserved with <a href="#" target="_blank">Sample Text</a> </strong>
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer> -->

</div>
<script id="jqueryUiMinJS"></script>
<script id="jqueryKnobMinJS"></script>

<!-- Bootstrap 4 -->
<script id="bootstrapMinJs"></script>

<!-- ChartJS -->
<script id="chartMinJs"></script>

<!-- Sparkline -->
<script id="sparklinesMinJs"></script>

<!-- daterangepicker -->
<!-- <script id="momentMinJs"></script> -->
<!-- <script id="daterangepickerJs"></script> -->

<!-- Tempusdominus Bootstrap 4 -->
<!-- <script id="tempusdominusMinJs"></script> -->

<!-- Summernote -->
<script id="summernoteMinJs"></script>

<!-- overlayScrollbars -->
<script id="overlayScrollbarsMinJs"></script>

<!-- AdminLTE App -->
<script id="adminlteJs"></script>
<script id="demoJs"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

</body>

</html>

<script>
    // console.log(dots);

    $('input[type=number]').on('wheel', function(e) {
        return false;
    });

    var bootstrapMinJs = dots + "plugins/bootstrap/js/bootstrap.bundle.min.js";
    var chartMinJs = dots + "plugins/chart.js/Chart.min.js";
    var sparklinesMinJs = dots + "plugins/sparklines/sparkline.js";
    var momentMinJs = dots + "plugins/moment/moment.min.js";
    var daterangepickerJs = dots + "plugins/daterangepicker/daterangepicker.js";
    var tempusdominusMinJs = dots + "plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js";
    var summernoteMinJs = dots + "plugins/summernote/summernote-bs4.min.js";
    var overlayScrollbarsMinJs = dots + "plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js";
    var adminlteJs = dots + "dist/js/adminlte.js";
    var dashboardJs = dots + "dist/js/pages/dashboard.js";
    var demoJs = dots + "dist/js/demo.js";
    // var adminlteJs = dots + "dist/js/adminlte.js";

    // console.log(animateMin);
    if (document.getElementById("bootstrapMinJs")) document.getElementById("bootstrapMinJs").src = bootstrapMinJs;
    if (document.getElementById("chartMinJs")) document.getElementById("chartMinJs").src = chartMinJs;
    if (document.getElementById("sparklinesMinJs")) document.getElementById("sparklinesMinJs").src = sparklinesMinJs;
    if (document.getElementById("momentMinJs")) document.getElementById("momentMinJs").src = momentMinJs;
    if (document.getElementById("daterangepickerJs")) document.getElementById("daterangepickerJs").src = daterangepickerJs;
    if (document.getElementById("tempusdominusMinJs")) document.getElementById("tempusdominusMinJs").src =
        tempusdominusMinJs;
    if (document.getElementById("summernoteMinJs")) document.getElementById("summernoteMinJs").src = summernoteMinJs;
    if (document.getElementById("overlayScrollbarsMinJs")) document.getElementById("overlayScrollbarsMinJs").src =
        overlayScrollbarsMinJs;
    if (document.getElementById("adminlteJs")) document.getElementById("adminlteJs").src = adminlteJs;
    if (document.getElementById("dashboardJs")) document.getElementById("dashboardJs").src = dashboardJs;
    if (document.getElementById("demoJs")) document.getElementById("demoJs").src = demoJs;
</script>

<script>
    $(window).on('load', function() {
        $(".loader").fadeOut("slow");
    });
</script>