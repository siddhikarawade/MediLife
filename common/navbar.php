<body class="hold-transition sidebar-mini  sidebar-collapse layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item fS22 mR10">
                    <i class="far fa-user-circle"></i>
                </li>
                <li class="nav-item fS18 line20 ">
                    <div id="navUserName" class="fSB">User</div>
                    <div class="fS13" id="navLoginTime">Last Login: 01-01-2021 10:00 AM </div>
                </li>
                <li class="nav-item fS22">
                    <a class="nav-link" href="#" id="logoutNavLink" onclick="logOut();">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link tAC" id="dashboardLink">
                <span class="brand-text font-weight-light">Dashboard </span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="" class="nav-link" id="indexLink">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="loginLink">
                                <i class="nav-icon fas fa-sign-in-alt"></i>
                                <p>Login</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="logoutLink" onclick="logOut()">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <script>
            var currentLink = window.location.href;
            currentLink = currentLink.replace(/&/g, "::");
            var navDots = "";
            var loc = window.location.pathname;
            var temp = loc.split("components/");
            var temp2 = temp[1].split("/");
            var lastElement = temp2[temp2.length - 1];
            var conversationTotal = 0;
            var notificationTotal = 0;

            //Homepage
            var dashboardLink = "";
            var indexLink = "";

            //Homepage
            var addCarsDetails = "";
            var manageCarsDetails = "";

            //cars
            manageRides = '';

            //login
            loginLink = '';

            if (localStorage.getItem("loginFlag") == "guest") {
                document.getElementById("logoutLink").style.display = "none";
                // document.getElementById("manageProfile").style.display = "none";
            } else {
                document.getElementById("logoutLink").style.display = "";
                // document.getElementById("manageProfile").style.display = "";
            }

            // Username 
            var userName = localStorage.getItem("LoginUserFullName");
            var loginToken = localStorage.getItem("loginToken");
            var userLastLoginTime = localStorage.getItem("lastLogin");

            document.getElementById("navUserName").innerHTML = userName + "(" + loginToken + ")";
            document.getElementById("navLoginTime").innerHTML = "Last Login: " + userLastLoginTime;
            //navDots = navDots + "../";
            for (var i = 0; i < temp2.length - 1; i++) navDots = navDots + "../";

            //Homepage
            dashboardLink = navDots + "index/index.php";
            indexLink = navDots + "index/index.php";

            //Login
            loginLink = navDots + "login/login.php";

            //Homepage
            var d1 = document.getElementById("dashboardLink")
            d1.setAttribute('href', dashboardLink);

            var d1 = document.getElementById("indexLink")
            d1.setAttribute('href', indexLink);

            //Login
            var d1 = document.getElementById("loginLink")
            d1.setAttribute('href', loginLink);

            if (localStorage.getItem("loginFlag") == "guest") {
                document.getElementById("loginLink").style.display = "";
                document.getElementById("logoutLink").style.display = "none";
                document.getElementById("logoutNavLink").style.display = "none";
            } else {
                document.getElementById("logoutNavLink").style.display = "";
                document.getElementById("loginLink").style.display = "none";
                document.getElementById("logoutLink").style.display = "";
            }

            function logOut() {
                window.location.href = navDots + "logout/logout.php";
            }
        </script>