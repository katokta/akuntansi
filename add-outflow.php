<?php
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    if (isset($_POST['submit'])){
    
        $transname = $_POST['Outflow_Name'];
        $transtime = $_POST['Outflow_Time'];
        $transdate = $_POST['Outflow_Date'];
        $accountcredit = $_POST['Outflow_Account_Credit'];
        $amountcredit = $_POST['Amount_Credit'];
        $accountdebit = $_POST['Outflow_Account_Debit'];
        $amountdebit = $_POST['Amount_Debit'];
        $transdesc = $_POST['Outflow_Description'];
        $namastaff = $_POST['Staf_PIC'];
    
        $msg = "";
    
        if ($transname==""){
            $msg = "Nama transaksi harus diisi!";
        } else if ($transtime==""){
            $msg ="Waktu transaksi harus dipilih";
        } else if ($transdate==""){
            $msg ="Tanggal transaksi harus dipilih";
        } else if ($accountcredit==""){
            $msg ="Akun kredit harus dipilih";
        } else if ($accountdebit==""){
            $msg ="Akun debit harus dipilih";
        } else if ($amountcredit==""){
            $msg ="Nominal kredit harus diisi";
        } else if ($amountdebit==""){
            $msg ="Nominal debit harus diisi";
        } else if ($transdesc==""){
            $msg ="Deskripsi transaksi harus diisi";
        } else{
            $result=mysqli_query($con, "INSERT INTO outflow (Outflow_Name, Outflow_Account_Debit, Outflow_Account_Credit,
            Amount_Debit, Amount_Credit, Outflow_Description, Outflow_Date, Outflow_Time, Staf_PIC) VALUES ('$transname', '$accountdebit', 
            '$accountcredit', '$amountdebit', '$amountcredit', '$transdesc', '$transdate', '$transtime',
            '$namastaff')");
            $msg = "Berhasil menjurnal transaksi baru!";
            $_SESSION["msg"]=$msg;
        header("location:outflow.php");
        }
    
        $_SESSION["msg"]=$msg;
        header("location:outflow.php");
    exit();
    }

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <title>Food-Taker Journal</title>
    

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
    $adminuser=$_SESSION["adminuser"];?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Outflow Detail</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="add-users.php">Outflow Detail</a></li>
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
                            <div class="card-header"><strong>Outflow</strong><small> Details</small></div>
                            <form name="computer" method="post" action="">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;}  ?> </p>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Transaction Name</label><input type="text" name="Outflow_Name" value="" class="form-control" id="username" required="true"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Transaction Time</label><input type="time" name="Outflow_Time" value="" class="form-control" id="username" required="true"></div>                          
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Transaction Date</label><input type="date" name="Outflow_Date" id="mobilenumber" value="" class="form-control" required="true"></div>
                                                    <div class="form-group"><label for="company" class=" form-control-label">Transaction Description</label><input type="text" name="Outflow_Description" value="" class="form-control" id="username" required="true"></div>      
</div>
                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Transaction Credit Account</label>
                                                    <select name="Outflow_Account_Credit" id="Outflow_Account_Credit">
                                                        <?php 
                                                        $queryaccounts=$con->query("SELECT AccountSubHeading FROM akun_perkiraan");
                                                        $accounts=mysqli_fetch_all($queryaccounts, MYSQLI_ASSOC);
                                                        foreach($accounts as $account){?>
                                                            <option value=<?php echo htmlspecialchars($account['AccountSubHeading'])?>><?php echo htmlspecialchars($account["AccountSubHeading"])?></option>
                                                        <?php } ?>
                                                        </select>
                                                        </div>
                                                        </div>
                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Transaction Credit Amount</label><input type="text" name="Amount_Credit" id="Amount_Credit" value="" class="form-control" required="true"></div>
                                                    </div>
                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Transaction Debit Account</label>
                                                    <select name="Outflow_Account_Debit" id="Outflow_Account_Debit">
                                                        <?php
                                                        foreach($accounts as $account){?>
                                                            <option value=<?php echo htmlspecialchars($account['AccountSubHeading'])?>><?php echo htmlspecialchars($account['AccountSubHeading'])?></option>
                                                        <?php } ?>
                                                        </select>
                                                        </div>
                                                        </div>
                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Transaction Debit Amount</label><input type="text" name="Amount_Debit" id="email" value="" class="form-control" required="true"></div>
                                                    </div>
                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Staff Name</label><input class="form-control" type="text" name="Staf_PIC" readonly value=<?php echo htmlspecialchars($name);?>></div>
                                                    </div>
                                                
                                                    </div>
                                                    
                                                    </div>
                                                    
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i>Add
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
