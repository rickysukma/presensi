<?php
session_start();
if (!$_SESSION['token']) {
    session_destroy();
    header('location:login.php');
} else {
    require 'session.php';
    require 'config.php';
    require 'lib/function.php';
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title></title>
        <link href="assets/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="assets/bootstrap.min.js"></script>
        <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
        <script src="assets/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css" />
    </head>

    <body>

        <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="fa fa-user-circle"></i> <?= $_SESSION['nama'] ?> <span class="caret"></span></a>
                            <ul id="g-account-menu" class="dropdown-menu" role="menu">
                                <li><a href="#"><i class="fa fa-user-secret"></i> My Profile</a></li>
                            </ul>
                        </li>
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
            <!-- /container -->
        </div>

        <!-- /Header -->

        <!-- Main -->

        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">

            <ul class="nav nav-pills nav-stacked" style="border-right:1px solid black">
                <!--<li class="nav-header"></li>-->
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <?php require 'nav.php' ?>
            </ul>
        </div><!-- /span-3 -->
        <div class="col-lg-9 col-md-10 col-sm-9 col-xs-12">
            <!-- Right -->

            <a href="#"><strong><span class="fa fa-dashboard"></span> My Dashboard</strong></a>
            <br>
            <br>
            <?php if (isset($_GET['ip'])) {
                    $status = cekMesin($_GET['ip']);
                    echo "<h2>" . $_GET['ip'] . "</h2>";
                    if ($status) {
                        echo "<span class='btn btn-xs btn-success'>ONLINE</span>";
                    } else {
                        echo "<span class='btn btn-xs btn-danger'>OFFLINE</span>";
                    }
                }
                ?>
            <hr>
            <!-- Konten -->
            <div class="row">
                <?php
                    if (isset($_GET['page'])) {
                        if ($_GET['page'] == 'mesin') {
                            require_once 'mesin.php';
                        }
                        if ($_GET['page'] == 'tambah') {
                            require_once 'pages/form-mesin.php';
                        }
                        if ($_GET['page'] == 'detail') {
                            require_once 'detail.php';
                        }
                        if ($_GET['page'] == 'mesinedit') {
                            require_once 'pages/form-edit.php';
                        }
                        if ($_GET['page'] == 'tambah-makul') {
                            require_once 'makul/form-makul.php';
                        }

                        if ($_GET['page'] == 'edit-makul') {
                            require_once 'makul/edit-makul.php';
                        }
                        if ($_GET['page'] == 'rekap') {
                            require_once 'rekap.php';
                        }
                        if ($_GET['page'] == 'presensi') {
                            require_once 'presensi.php';
                        }
                        if ($_GET['page'] == 'rekap_presensi') {
                            require_once 'controller/rekap_presensi.php';
                        }
                        if($_GET['page'] == 'store'){
                            require_once 'controller/siswa_tidakHadir.php';
                        }
                    } else {
                        require_once 'home.php';
                    }
                    ?>
            </div>
            <!--  -->

        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                // DataTable
                $('#DataTable').DataTable();
            });
        </script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    </body>

    </html>
<?php } ?>