<?php
include '../service/DB-Config.php';
include '../service/DB-ConfigPDO.php';
include '../service/startSession.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <?php include "title.php"; ?>
    <link rel="stylesheet" href="../assets/css/styles.css" />
    <link rel="stylesheet" href="../assets/plugin/gridforms/gridforms.css" />
    <link rel="stylesheet" href="../assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" />

    <link rel="stylesheet" type="text/css" href="../assets/css/datatables.min.css" />
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/b-2.2.2/b-html5-2.2.2/datatables.min.css"/> -->

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-red">

        <a class="navbar-brand ps-3" href="../view/home.php">MTS</a>
        <button style="background-color: #00000000;" class="btn btn-link order-1 order-lg-0 me-4 me-lg-0"
            id="sidebarToggle" href="#!"><i class="ti-menu"></i></button>

        <div class="input-group justify-content-md-end">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti-settings"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!-- <li>
                            <a class="dropdown-item" href="#!"><i class="iconDP ti-user"></i> Profile</a>
                        </li> -->
                        <li>
                            <!-- <hr class="dropdown-divider" /> -->
                        </li>
                        <li>
                            <a class="dropdown-item" href="../logout.php">
                                <i class="iconDP ti-shift-right"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <div class="userinfo">
                            <div class="avatar">
                                <!-- <img src="../assets/img/user.png" class="img-responsive img-circle"> -->

                                <?php $imgProfile = "http://10.73.148.5/DBMC/IMG/emp120/".$objResult['Emp_ID'].".jpg"; ?>
                                <img src="<?php echo ((@GetImageSize($imgProfile)) ? $imgProfile : '../assets/img/user.png'); ?>"
                                    alt="<?php echo $objResult['Empname_eng']; ?>" class="img-responsive img-circle">

                            </div>
                            <div class="info">
                                <?php
                                    $sql_name = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '" . $objResult['Emp_ID'] . "' ");
                                    $r_name = $sql_name->fetch_array();
                                    $name = $r_name['Empname_engTitle'] . ' ' . $r_name['Empname_eng'] . ' ' . $r_name['Empsurname_eng'];
                                ?>
                                <span class="username"><?php echo $name; ?></span><br>
                                <span class="empcode">ID: <?php echo $objResult["Emp_ID"]; ?></span>
                            </div>
                        </div>

                        <span class="sb-sidenav-menu-heading"> MENU </span>

                        <a class="nav-link" href="../view/home.php">
                            <div class="sb-nav-link-icon">
                                <i class="ti-home"></i>
                            </div>
                            Home
                        </a>

                        <a class="nav-link" href="../ApproveFlow/Inbox.php">
                            <div class="sb-nav-link-icon">
                                <i class="ti-email"></i>
                            </div>
                            Approve
                            <sup id="noti_inbox" class="badgeX badge-teal"></sup>
                        </a>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseform"
                            aria-expanded="true" aria-controls="collapseform">
                            <div class="sb-nav-link-icon">
                                <i class="ti-pencil"></i>
                            </div>
                            Create Forms
                            <div class="sb-sidenav-collapse-arrow"><i class="ti-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseform" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../view/forms_1.php">ฟอร์มย้ายคนภายในแผนก</a>
                                <a class="nav-link" href="../view/forms_2.php">ฟอร์มย้ายคนข้ามแผนก</a>
                                <a class="nav-link" href="../view/forms_3.php">ฟอร์มย้ายคนข้ามบริษัท</a>
                            </nav>
                        </div>

                        <a class="nav-link" href="../view/report_excl.php">
                            <div class="sb-nav-link-icon">
                                <i class="ti-receipt"></i>
                            </div>
                            Report Excel
                            <sup id="noti_inbox" class="badgeX badge-teal"></sup>
                        </a>

                        <?php include 'menu.php';?>

                        <span class="sb-sidenav-menu-heading"> คู่มือ </span>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#WorkFlow"
                            aria-expanded="true" aria-controls="WorkFlow">
                            <div class="sb-nav-link-icon">
                                <i class="ti-star"></i>
                            </div>
                            WorkFlow
                            <div class="sb-sidenav-collapse-arrow"><i class="ti-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="WorkFlow" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../sql/flow/workflow_.pdf" target="_blank" rel="noopener noreferrer">โอนย้ายกำลังคนภายในแผนก</a>
                                <a class="nav-link" href="../sql/flow/workflow_ (2).pdf" target="_blank" rel="noopener noreferrer">โอนย้ายกำลังคนข้ามแผนก</a>
                                <a class="nav-link" href="../sql/flow/workflow_ (1).pdf" target="_blank" rel="noopener noreferrer">โอนย้ายกำลังคนข้ามบริษัท</a>
                            </nav>
                        </div>

                        <a class="nav-link" href="../assets/img/Manpower transfer system.pdf" target="_blank" rel="noopener noreferrer">
                            <div class="sb-nav-link-icon">
                                <i class="ti-agenda"></i>
                            </div>
                            Manual
                        </a>

                    </div>
                </div>
                <div class="panel-footer">
                    <!-- <div class="gif-container"></div> -->
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>