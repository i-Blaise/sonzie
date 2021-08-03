<?php
include('../class_libraries/class_lib.php');
$database_con = new DB_con();
$getData = new dbData();

if(!isset($_SESSION['user_name'], $_SESSION['user_email'], $_SESSION['expire']))
{
    echo "<script>location='http://localhost/covid.trusthospital/admin/'</script>";
}else{
    $now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "<script>location='http://localhost/covid.trusthospital/admin/index.php?status=expired'</script>";
    }
}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Covid Admin Portal</title>
        <link rel="canonical" href="#"/>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="images/trust-logo.png">
        <!-- Custom CSS -->
        <link href="css/style.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
              <!-- Notification -->
        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Toastr -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    </head>





    <!-- After Form Submit  -->
    <?php

    if(isset($_POST['search_patient']) && $_POST['search_patient'] == 'Submit')
    {
        $reg_num = $_POST['reg_num'];
        $get_data = $getData->searchPatient($reg_num);
        $check_data_num = $getData->checkDataNum($reg_num);
        $checResults = $getData->fetchPatientResults($reg_num);
        if($check_data_num == 1)
        {
            $row = mysqli_fetch_array($get_data);
        }elseif($check_data_num < 1)
        {
            echo "     <script type='text/javascript'>   
            $(document).ready(function() {
            toastr.options.positionClass = 'toast-top-right';
            toastr.options.closeButton = true;
            toastr.options.closeDuration = 300;
            toastr.warning('Registration Number Not Found', 'Warning');
        });
        </script>";
        }elseif($check_data_num > 1)
        {
            echo "     <script type='text/javascript'>   
            $(document).ready(function() {
            toastr.options.positionClass = 'toast-top-right';
            toastr.options.closeButton = true;
            toastr.options.closeDuration = 300;
            toastr.error('More than one registration number found. Please report to I.T', 'Currupted Data');
        });
        </script>";
        }
    }

    if(isset($_POST['submit']) && $_POST['submit'] == 'submit results')
    {

        $check_data_num = $getData->checkDataNum($_POST['reg_num']);
        if($check_data_num == 1)
        {

            $insertStatus = $getData->insertResults($_POST, $_POST['reg_num']);
            if($insertStatus == 'good')
            {
                echo "     <script type='text/javascript'>   
            $(document).ready(function() {
            toastr.options.positionClass = 'toast-top-right';
            toastr.options.closeButton = true;
            toastr.options.closeDuration = 300;
            toastr.success('The Results has been saved', 'Saved!');
            });
            </script>";
            }elseif($insertStatus == 'duplicate'){
                echo "     <script type='text/javascript'>   
                $(document).ready(function() {
                toastr.options.positionClass = 'toast-top-right';
                toastr.options.closeButton = true;
                toastr.options.closeDuration = 300;
                toastr.warning('Theres already a result for this patient', '');
            });
            </script>";
            }else{
                echo "     <script type='text/javascript'>   
                $(document).ready(function() {
                toastr.options.positionClass = 'toast-top-right';
                toastr.options.closeButton = true;
                toastr.options.closeDuration = 300;
                toastr.warning('Something went wrong with saving the results. Please try again.', '');
            });
            </script>";
            }

            }elseif($check_data_num < 1)
            {
                echo "     <script type='text/javascript'>   
                $(document).ready(function() {
                toastr.options.positionClass = 'toast-top-right';
                toastr.options.closeButton = true;
                toastr.options.closeDuration = 300;
                toastr.warning('Registration Number Not Found', 'Warning');
            });
            </script>";
            }elseif($check_data_num > 1)
            {
                echo "     <script type='text/javascript'>   
                $(document).ready(function() {
                toastr.options.positionClass = 'toast-top-right';
                toastr.options.closeButton = true;
                toastr.options.closeDuration = 300;
                toastr.error('More than one registration number found. Please report to I.T', 'Currupted Data');
            });
            </script>";
            }
    }

    ?>










<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="images/trust-light-logo.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="../../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="images/trust-text-logo.png" class="light-logo" alt="homepage" width="160" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="images/users/1.jpg" alt="user" class="rounded-circle"
                                    width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <!-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i>
                                    My Settings</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i>
                                    Inbox</a> -->
                                    <a class="dropdown-item" href="logout.php"><i
                                                class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic"><img src="images/users/1.jpg" alt="users"
                                        class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu m-l-10">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium"><?php echo $_SESSION['user_name']; ?> <i
                                                class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email"><?php echo $_SESSION['user_email']; ?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                        <!-- <a class="dropdown-item" href="javascript:void(0)"><i
                                                class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i
                                                class="ti-wallet m-r-5 m-l-5"></i> Patient Number</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i
                                                class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)"><i
                                                class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                        <div class="dropdown-divider"></div> -->
                                        <a class="dropdown-item" href="logout.php"><i
                                                class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <!-- <li class="p-15 m-t-10"><a href="javascript:void(0)"
                                class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i
                                    class="fa fa-plus-square"></i> <span class="hide-menu m-l-5">Create New</span> </a>
                        </li> -->
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="dashboard.php" aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                        class="hide-menu">Patient Information Table</span></a></li>

                        <li class="sidebar-item"> <a class="active sidebar-link waves-effect waves-dark sidebar-link"
                        href="result-input.php" aria-expanded="false"><i class="mdi mdi-account-network"></i><span
                         class="hide-menu">Input Patient Result</span></a></li>

                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">TRUST HOSPITAL - COVID TEST PORTAL</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Input Patient Test Results</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="text-right upgrade-btn">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input id="myInput" type="text" placeholder="Enter Registration Number" name="reg_num" required>
                                <button id="searchbtn" name="search_patient" value="Submit" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    
            <?php if(isset($row) && isset($_POST['search_patient']))
                                {
                                    ?>
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="../assets/img/male-avatar.jpg"
                                        class="rounded-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?php echo $row['full_name']; ?></h4>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                                    class="icon-people"></i>
                                                <font class="font-medium">Age: <?php echo $row['age']; ?></font>
                                            </a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                                    class="icon-picture"></i>
                                                <font class="font-medium">Gender: <?php echo $row['sex']; ?></font>
                                            </a></div>
                                    </div>
                                </center>
                            </div>
                            <div>
                                <hr>
                            </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6><?php echo $row['email']; ?></h6> 
                                <small class="text-muted p-t-30 db">Phone</small>
                                <h6><?php echo $row['phone_number']; ?></h6>
                                <br />
                            </div>
                        </div>
                    </div>
                    <?php
                                }else{
                                ?>
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="../assets/img/male-avatar.jpg"
                                        class="rounded-circle" width="150" />
                                    <h4 class="card-title m-t-10">Patients Full Name</h4>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                                    class="icon-people"></i>
                                                <font class="font-medium">Age: </font>
                                            </a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                                    class="icon-picture"></i>
                                                <font class="font-medium">Gender: </font>
                                            </a></div>
                                    </div>
                                </center>
                            </div>
                            <div>
                                <hr>
                            </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6></h6> 
                                <small class="text-muted p-t-30 db">Phone</small>
                                <h6></h6>
                                <br />
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group">
                                        <label class="col-md-12">Patients Registration Number</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="reg_num" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">LAB Number</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="lab_number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-12">Receipt type</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="receipt_type"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-12">Episode Number</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="episode_number"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-12">Manual Path Number</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="manual_path_number"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-12">Organisation</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="organisation"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-12">Requested By</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="requested_by"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-12">Requested From</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="requested_from"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-12">Diagnosis</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="diagnosis"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-12">Sample Collection Date</label>
                                        <div class="col-md-12">
                                            <input type="date" placeholder=""
                                                class="form-control form-control-line" name="sample_collection_date"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-12">Received Date</label>
                                        <div class="col-md-12">
                                            <input type="date" placeholder=""
                                                class="form-control form-control-line" name="received_date"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-12">Report Date</label>
                                        <div class="col-md-12">
                                            <input type="date" placeholder=""
                                                class="form-control form-control-line" name="report_date"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-12">Requested</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="requested"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-12">Name of Doctor</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="name_of_doctor"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-12">Paramenter</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="parameter"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-12">Flag</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="flag"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-12">Results</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="results"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-12">Units</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="unit"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-12">Normal Range</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="normal_range"
                                                id="">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-md-12">Message</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line"></textarea>
                                        </div>
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <label class="col-sm-12">Select Country</label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line">
                                                <option>London</option>
                                                <option>India</option>
                                                <option>Usa</option>
                                                <option>Canada</option>
                                                <option>Thailand</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" name="submit" value="submit results">Submit Results</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by The Trust Hospital. Designed and Developed by <a
                    href="#">Interactive Digital</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <script>
        $(document).ready(function(){
          $("#").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("tbody tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
</body>

</html>