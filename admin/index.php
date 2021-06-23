<?php
include('../class_libraries/class_lib.php');
$database_con = new DB_con();
$getData = new dbData();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../assets/img/icons/Trust-hspital-logo.png">
    <link rel="stylesheet" href="style.css">
    <title>Covid Portal Admin || The Trust Hospital</title>

          <!-- Notification -->
	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <?php
    if(isset($_GET['status']) && $_GET['status'] == "saved")
    { 
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-right';
        toastr.options.closeButton = true;
        toastr.options.closeDuration = 300;
        toastr.success('Your Covid Test has been booked!', 'Success');
    });
    </script>";
    }elseif(isset($_GET['status']) && $_GET['status'] == "expired")
    {
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-right';
        toastr.options.closeButton = true;
        toastr.options.closeDuration = 300;
        toastr.info('Please enter your credentials to log in', 'Session Expired');
    });
    </script>";
    }
       ?>
</head>
<?php
if(isset($_POST['submit']) && $_POST['submit'] == "Submit")
{
    $email = $_POST['admin_email'];
    $password = $_POST['admin_password'];

    $get_admin = $getData->adminLogin($email, $password);
    $check_for_user = $getData->checkLogin($email, $password);
    if($check_for_user == 1)
    {
        $row=mysqli_fetch_array($get_admin);
        $_SESSION['user_name'] = $row['admin_username'];
        $_SESSION['user_email'] = $row['admin_email'];
        $_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
        $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
		echo "<script>location='https://covidtest.thetrusthospital.com/dev/admin/dashboard.php'</script>";
        die();
    }else
    {
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-right';
        toastr.options.closeButton = true;
        toastr.options.closeDuration = 300;
        toastr.warning('Wrong Credentials', 'Warning');
    });
    </script>";
    }
}
?>
<body>
    <div class="hero-wrapper">
        <div class="left-inner">
            <div class="left-inner__wrapper">
                <img src="images/trust-logo.png" alt="trust-logo" width="100">
                <h2 class="left-header">THE TRUST HOSPITAL</h2>
                <P class="left-text">Covid Test Portal Admin</P>
            </div>
            <div class="bottom-inner__wrapper">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="input-group">
                        <input class="input--style-1" type="email" placeholder="Admin Email" name="admin_email" required>
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="password" placeholder="Password" name="admin_password" required>
                    </div>
                    <div class="p-t-20">
                        <button class="btn btn--radius btn--logo-color" type="submit" name="submit" value="Submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>