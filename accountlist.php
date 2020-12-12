<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>Food-Taker Add Accounting</title>
  

    <link rel="apple-touch-icon" href="apple-icon.png">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');
    include('functions.php');
    $adminuser=$_SESSION["adminuser"];?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Account</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="add-account.php">Add Account</a></li>
                            <li class="active">Add</li>
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
                            <div>
                                <a class="btn btn-info" href="add-account.php" role="button" style="float: right;">Add New Account</a>
                            </div>
                            <div class="card-header"><strong>Accounts</strong><small> List</small></div>
                            <form name="computer" method="post" action="">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
                            <table style="width:100%">
              <th>Akun ID</th>
              <th>Heading Akun</th>
              <th>Subheading Akun</th>
              <th>Deskripsi Akun</th>
              <th>Nominal</th>
              <th>Staff PIC</th>
              <th>Aksi</th>
              <?php 
              $queryakun=mysqli_query($con, "SELECT * FROM akun_perkiraan");
              $akuns=mysqli_fetch_all($queryakun, MYSQLI_ASSOC);
              foreach($akuns as $akun){?>
              <tr>
                  <td><?php echo htmlspecialchars($akun["AccountID"]);?></td>
                  <td><?php echo htmlspecialchars($akun["AccountHeading"]);?></td>
                  <td><?php echo htmlspecialchars($akun["AccountSubHeading"]);?></td>
                  <td><?php echo htmlspecialchars($akun["AccountDesc"]);?></td>
                  <td><?php echo htmlspecialchars($akun["Staff_PIC"]);?></td>
                  <td><a class="btn btn-primary" href="edit-account.php?id=<?=$akun["AccountID"]?>" role="button">Edit</a><a class="btn btn-danger" href="delete-account.php?id=<?=$akun["AccountID"]?>" role="button">Delete</a></td>
              </tr>
              <?php }?>
            </table>
                            </div>

                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>