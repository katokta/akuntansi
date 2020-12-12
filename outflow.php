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
                            <li><a href="add-account.php">Outflow Transaction</a></li>
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
                                <a class="btn btn-info" href="add-outflow.php" role="button" style="float: right;">Add New Transaction</a>
                            </div>
                            <div class="card-header"><strong>Outflow Transaction</strong><small> List</small></div>
                            <form name="computer" method="post" action="">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
                            <table style="width:100%">
              <th>Transaction ID</th>
              <th>Transaction Name</th>
              <th>Transaction Description</th>
              <th>Tanggal Transaksi</th>
              <th>Credit</th>
              <th>Debit</th>
              <th>Staff PIC</th>
              <th>Aksi</th>
              <?php 
              $queryoutflow=mysqli_query($con, "SELECT * FROM outflow");
              $outflows=mysqli_fetch_all($queryakun, MYSQLI_ASSOC);
              foreach($outflows as $outflow){?>
              <tr>
                  <td><?php echo htmlspecialchars($outflow["Outflow_ID"]);?></td>
                  <td><?php echo htmlspecialchars($outflow["Outflow_Name"]);?></td>
                  <td><?php echo htmlspecialchars($outflow["Description"]);?></td>
                  <td><?php echo htmlspecialchars($outflow["Outflow_Date"]);?><br><?php echo htmlspecialchars($outflow["Outflow_Time"]);?></td>
                  <td><?php echo htmlspecialchars($outflow["Outflow_Account_Credit"]);?><br><?php echo htmlspecialchars($outflow["Amount_Credit"]);?></td>
                  <td><?php echo htmlspecialchars($outflow["Outflow_Account_Debit"]);?><br><?php echo htmlspecialchars($outflow["Amount_Debit"]);?></td>
                  <td><?php echo htmlspecialchars($outflow["Staff_PIC"]);?></td>
                  <td><a class="btn btn-primary" href="edit-outflow.php?id=<?=$outflow["Outflow_ID"]?>" role="button">Edit</a><a class="btn btn-danger" href="delete-outflow.php?id=<?=$outflow["Outflow_ID"]?>" role="button">Delete</a></td>
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