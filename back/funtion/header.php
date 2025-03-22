<?php
include "conn.php";
session_start();
if (!isset($_SESSION['User_id'])) {
    header("location:../index.php");
    die();
}

$id = $_SESSION['role_id'];

$query = "SELECT * FROM `access modules` orderby  ORDER BY id desc  ";
$run_result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($run_result)) {
    $rid = $row['id'];
    $names = $row['name'];
    $link = $row['link'];
    $icon = $row['icon'];
    $sql = "SELECT * FROM access where role_id ='$id'  ";
    $result = mysqli_query($conn, $sql);
    if ($fat != '') {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $datas = $row['crud'];
                $ans = json_decode($datas);
                $read = $ans[$fat][2];

                if ($read == 0) {
                    header("location:../index.php");
                    die();
                }
            }
        }
    }
}

?>



<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eko hotel</title>

    <!-- Google Font: Source Sans Pro -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>

<body class="sidebar-mini layout-fixed sidebar-mini-md accent-warning text-capitalize  layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light bg-warning">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars font-weight-bold"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link font-weight-bold">Home</a>
                </li>
                <li class="nav-item d-none font-weight-bold d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class=" main-sidebar elevation-4   sidebar-light-warning">
            <!-- Brand Logo -->
            <a href="#" style="color:white ;" class="brand-link bg-warning">
                <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-bold mx-1">eko hotel </span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar os-theme-dark">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" style="color:black;font-size: 18px;font-weight:400;" class="d-block">
                            <?php echo $_SESSION['Username'] ?>
                        </a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php
                        $id = $_SESSION['role_id'];
                        $li = '';
                        $query = "SELECT * FROM `access modules`";
                        $run_result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($run_result)) {
                            $rid = $row['id'];
                            $names = $row['name'];
                            $link = $row['link'];
                            $icon = $row['icon'];
                            $parent = $row['parent_id'];
                            if ($id != '') {
                                if ($parent == 0) {
                                    $sql = "SELECT * FROM access where role_id ='$id' ";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            $datas = $row['crud'];
                                            $ans = json_decode($datas);
                                            //print_r($ans);
                                            $rs = count($ans);
                                            $ch = '';
                                            for ($row = 0; $row < $rs; $row++) {
                                                $name = $ans[$row][0];
                                                if ($name == $rid) {
                                                    $read = $ans[$row][2];
                                                    if ($read == 1) {
                                                        $ch = '
                                                        <li class="nav-item  nav">
                                                            <a href="' . $link . '" class="nav-link  ">
                                                                <i class="' . $icon . '  text-black"></i>
                                                                <p>
                                                                ' . $names . '                                                                    
                                                                </p>
                                                            </a>';
                                                    }
                                                }
                                            }
                                            echo $ch;
                                        }
                                    }
                                    $sql =  "SELECT * FROM `access modules` where parent_id ='$rid'";
                                    $run = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($run) > 0) {
                                        echo ' <ul class="nav nav-treeview">';
                                        while ($row = mysqli_fetch_array($run)) {
                                            $ridd = $row['id'];
                                            $named = $row['name'];
                                            $link = $row['link'];
                                            $icon = $row['icon'];
                                            $parents = $row['parent_id'];
                                            if ($rid  == $parents) {
                                                $sql = "SELECT * FROM access where role_id ='$id' ";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $datas = $row['crud'];
                                                        $ans = json_decode($datas);
                                                        $rs = count($ans);
                                                        $sa = '';
                                                        for ($row = 0; $row < $rs; $row++) {
                                                            $name = $ans[$row][0];
                                                            if ($name == $rid) {
                                                                $read = $ans[$row][2];
                                                                if ($read == 1) {
                                                                    $sa = '
                                                                        <li class="nav-item  ">
                                                                            <a href="' . $link . '" class="nav-link ">
                                                                                <i class="' . $icon . '"></i>
                                                                                <p>
                                                                                    ' . $named . '                                                                                    
                                                                                </p>
                                                                            </a>
                                                                      </li>';
                                                                }
                                                            }
                                                        }
                                                        echo $sa;
                                                    }
                                                }
                                            }
                                        }
                                        echo '</ul>';
                                    }
                                    echo ' </li>';
                                }
                            }
                        }
                        ?>
                    </ul>
                </nav>
            </div>
            <!-- /.sidebar -->
        </aside>