<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$adminuser=$_SESSION['adminuser'];
$cpassword=$_POST['currentpassword'];
$newpassword=$_POST['newpassword'];
$newpass=password_hash($newpassword, PASSWORD_DEFAULT);
$query=mysqli_query($con,"select Staff_Email,staff_passhash from staff where Staff_Email='$adminuser'");
list($staff_email, $staff_pass)=mysqli_fetch_array($query);
if($row>0 && password_verify($cpassword, $staff_pass)){
$ret=mysqli_query($con,"update staff set staff_passhash='$newpass' where Staff_Email='$adminuser'");
$msg= "Your password successully changed"; 
} else {

$msg="Your current password is wrong";
}



}

  
  ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <title>CCMS Change Password</title>
    

    <link rel="apple-touch-icon" href="apple-icon.png">
 

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}   

</script>

</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Change Password</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="change-password.php">Change Password</a></li>
                            <li class="active">Change</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                       <!-- .card -->

                    </div>
                    <!--/.col-->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Change</strong><small> Password</small></div>
                            <form name="changepassword" method="post" onsubmit="return checkpass();" action="">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 <?php
$adminuser=$_SESSION['adminuser'];
$ret=mysqli_query($con,"select * from staff where Staff_Email='$adminuser'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <div class="form-group"><label for="company" class=" form-control-label">Current Password</label><input type="password" name="currentpassword" id="currentpassword" class="form-control" required=""></div>
                                    <div class="form-group"><label for="vat" class=" form-control-label">New Password</label><input type="password" name="newpassword"  class="form-control" required=""></div>
                                        <div class="form-group"><label for="street" class=" form-control-label">Confirm Password</label><input type="password" name="confirmpassword" id="confirmpassword" value=""  class="form-control"></div>
                                                                                                
                                                    </div>
                                                    <?php } ?>
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i> Change
                                                        </button></p>
                                                        
                                                    </div>
                                                </div>
                                                </form>
                                            </div>



                                           
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>
<?php }  ?>