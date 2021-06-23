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

<?php

if (isset($_POST['search_patient']) && $_POST['search_patient'] == "Submit")
{
    $reg_num = $_POST['reg_id'];
    $get_data = $getData->searchPatient($reg_num);
    $check_data_num = $getData->checkDataNum($reg_num);
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
        toastr.error('Currupted Data', 'Error');
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
                            <form class="app-search position-absolute" method="post" action="">
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
                        <li class="sidebar-item"> <a class="active sidebar-link waves-effect waves-dark sidebar-link"
                        href="#" aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                        class="hide-menu">Patient Information Table</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
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
                                    <li class="breadcrumb-item active" aria-current="page">Patient Information Table</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="text-right upgrade-btn">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input id="myInput" type="text" placeholder="Enter Registration Number" name="reg_id" required>
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
            <?php if(isset($row))
                                {
                                    ?>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Patient Booking Form</h4>
                                <h6 class="card-subtitle">All information on this table are secure and safe.</h6>

                                <?php if(isset($row))
                                { ?>
                                    <h4 class="card-title">Patient Registration Number: <?php echo $row['registration_number']; ?></h4>
                                <?php
                                }
                                ?>
                                <h6 class="card-title m-t-40"><i
                                        class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Patient
                                    Information</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Fullname</th>
                                                <th scope="col">Email Address</th>
                                                <th scope="col">Phone number</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Home Address</th>
                                                <th scope="col">DOB</th>
                                                <th scope="col">Receipt No.</th>
                                                <th scope="col">Hospital No.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"></th>
                                                <td><?php echo $row['full_name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['phone_number']; ?></td>
                                                <td><?php echo $row['sex']; ?></td>
                                                <td><?php echo $row['home_address']; ?></td>
                                                <td><?php echo $row['date_of_birth']; ?></td>
                                                <td><?php echo $row['receipt_number']; ?></td>
                                                <td><?php echo $row['hospital_number']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h6 class="card-title m-t-40"><i
                                    class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Symptoms
                                Information</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">History of fever / Chills</th>
                                            <th scope="col">General Weakness</th>
                                            <th scope="col">Cough</th>
                                            <th scope="col">Sore Throat</th>
                                            <th scope="col">Runny Nose</th>
                                            <th scope="col">Loss Of Smell</th>
                                            <th scope="col">Shortness Of Breath</th>
                                            <th scope="col">Diarrhoea</th>
                                            <th scope="col">Nausea / Vomiting</th>
                                            <th scope="col">Headache</th>
                                            <th scope="col">Irritability / Confusion</th>
                                            <th scope="col">Loss Of Taste</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"></th>
                                            <td><?php echo ($row['fever_or_chills'] == 1) ?  "Yes" : "No"; ?></td>
                                            <td><?php echo ($row['general_weakness'] == 1) ?  "Yes" : "No"; ?></td>
                                            <td><?php echo ($row['cough'] == 1) ?  "Yes" : "No"; ?></td>
                                            <td><?php echo ($row['sore_throat'] == 1) ?  "Yes" : "No"; ?></td>
                                            <td><?php echo ($row['runny_nose'] == 1) ?  "Yes" : "No"; ?></td>
                                            <td><?php echo ($row['loss_of_smell'] == 1) ?  "Yes" : "No"; ?></td>
                                            <td><?php echo ($row['shortness_of_breath'] == 1) ?  "Yes" : "No"; ?></td>
                                            <td><?php echo ($row['diarrhoea'] == 1) ?  "Yes" : "No"; ?></td>
                                            <td><?php echo ($row['nausea_or_vomiting'] == 1) ?  "Yes" : "No"; ?></td>
                                            <td><?php echo ($row['headache'] == 1) ?  "Yes" : "No"; ?></td>
                                            <td><?php echo ($row['irritability_or_confusion'] == 1) ?  "Yes" : "No"; ?></td>
                                            <td><?php echo ($row['loss_of_taste'] == 1) ?  "Yes" : "No"; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h6 class="card-title m-t-40"><i
                                class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Pains
                            </h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Muscular Pains</th>
                                        <th scope="col">Chest Pains</th>
                                        <th scope="col">Abdominal Pains</th>
                                        <th scope="col">Joint Pains</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"></th>
                                        <th scope="col"><?php echo ($row['muscular_pain'] == 1) ?  "Yes" : "No"; ?></th>
                                        <th scope="col"><?php echo ($row['chest_pain'] == 1) ?  "Yes" : "No"; ?></th>
                                        <th scope="col"><?php echo ($row['abdominal_pain'] == 1) ?  "Yes" : "No"; ?></th>
                                        <th scope="col"><?php echo ($row['joint_pain'] == 1) ?  "Yes" : "No"; ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h6 class="card-title m-t-40"><i
                            class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Vital Signs
                        </h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Seizure</th>
                                    <th scope="col">Conjuctival Injection</th>
                                    <th scope="col">Pharnygeal Exudate</th>
                                    <th scope="col">Dyspnea / Tachpnea</th>
                                    <th scope="col">Abnormal Lung X-ray</th>
                                    <th scope="col">Abnormal Lung Auscultation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"></th>
                                    <th scope="col"><?php echo ($row['seizure'] == 1) ?  "Yes" : "No"; ?></th>
                                    <th scope="col"><?php echo ($row['conjuctival_injection'] == 1) ?  "Yes" : "No"; ?></th>
                                    <th scope="col"><?php echo ($row['pharnygeal_exudate'] == 1) ?  "Yes" : "No"; ?></th>
                                    <th scope="col"><?php echo ($row['dyspnea_or_tachpnea'] == 1) ?  "Yes" : "No"; ?></th>
                                    <th scope="col"><?php echo ($row['abnormal_lung_xray'] == 1) ?  "Yes" : "No"; ?></th>
                                    <th scope="col"><?php echo ($row['abnormal_lung_ausculation'] == 1) ?  "Yes" : "No"; ?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h6 class="card-title m-t-40"><i
                        class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Clinical Course
                    </h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Date of onset of symptoms</th>
                                <th scope="col">Asymptomatic</th>
                                <th scope="col">Date first seen at hospital </th>
                                <th scope="col">Admitted to hospital?</th>
                                <th scope="col">Name of Hospital</th>
                                <th scope="col">Hospital visit number</th>
                                <th scope="col">Date of admission</th>
                                <th scope="col">Date of isolation</th>
                                <th scope="col">Was person ventilated</th>
                                <th scope="col">Date of death (if applicable)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td><?php echo $row['date_of_onset_of_symptoms']; ?></td>
                                <td><?php echo ($row['asymptomatic'] == 1) ?  "Yes" : "No"; ?></td>
                                <td><?php echo $row['date_first_at_hospital']; ?></td>
                                <td><?php if ($row['admitted_to_hospital'] == 1) 
                                {
                                    echo "Yes";
                                }elseif($row['admitted_to_hospital'] == 0)
                                {
                                    echo "No";
                                }else{
                                    echo "Unknown";
                                } ?></td>
                                <td><?php echo $row['name_of_hospital']; ?></td>
                                <td><?php echo $row['hospital_visit_number']; ?></td>
                                <td><?php echo $row['date_of_admission']; ?></td>
                                <td><?php echo $row['date_of_isolation']; ?></td>
                                <td><?php if ($row['was_person_ventilated'] == 1) 
                                {
                                    echo "Yes";
                                }elseif($row['was_person_ventilated'] == 0)
                                {
                                    echo "No";
                                }else{
                                    echo "Unknown";
                                } ?></td>
                                <td><?php echo $row['date_of_death']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Other underlying conditions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td><?php if(empty($row['other_underlying_conditions']))
                                {
                                    echo "n/a";
                                }else{
                                    echo $row['other_underlying_conditions'];
                                }; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                        </div>
                    </div>
                </div>
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
            <?php
                                }else{
            ?>
                        
                        <div class="container-fluid">
                            
                        <h1 class="card-title">Enter Valid Registration Number In The Search Bar Above</h1>
                        
                <?php
                                }
                                ?>
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