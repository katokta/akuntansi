<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['headingakun'])){

    $headingakun = $_POST['headingakun'];
    $subheadingakun = $_POST['subheadingakun'];
    $deskripsiakun = $_POST['descakun'];
    $namastaff = $_POST['staffname'];

    $message = "";

    if ($headingakun==""){
        $message = "Heading Akun harus diisi!";
    } else if ($subheadingakun==""){
        $message ="Subheading Akun harus dipilih";
    } else if ($deskripsiakun==""){
        $message ="Deskripsi Akun harus diisi";
    } else{
        $result=mysqli_query($con, "UPDATE akun_perkiraan SET VALUES (null, '".$headingakun."', '".$subheadingakun."', '".$deskripsiakun."', '".$namastaff."')");
        $msg = "Berhasil menambahkan akun baru!";
    }

    $_SESSION["msg"]=$msg;
    header("location:accountlist.php");
exit();
}


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
                            <div class="card-header"><strong>Add</strong><small> Account</small></div>
                            <form name="computer" method="post" action="">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php 
  $id=$_GET["id"];
  $account=$con->query("SELECT * FROM akun_perkiraan WHERE AccountID=$id");
  $account=$account->fetch_assoc();?>
                            <div class="card-body card-block">
 
                                <div class="form-group"><label for="company" class=" form-control-label">Account Heading</label><br>
                                <select name="headingakun" id="headingakun">
                                  <option value="Aset">Aset</option>
                                  <option value="Kewajiban">Kewajiban</option>
                                  <option value="Modal">Modal</option>
                                  <option value="Pendapatan">Pendapatan</option>
                                  <option value="Beban">Beban</option>
                                </select>
                                </div>                              
                                        <div class="form-group"><label for="street" class=" form-control-label">Sub Heading Account</label><input type="text" name="subheadingakun" id="comploc" class="form-control" required="true" value="<?php echo htmlspecialchars($acccount['AccountSubHeading'])?>"></div>
                                        <div class="form-group"><label for="street" class=" form-control-label">Account Description</label><input type="text" name="descakun" id="comploc" class="form-control" required="true" value="<?php echo htmlspecialchars($acccount['AccountDesc'])?>"></div>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Staff Name</label><input class="form-control" type="text" name="staffname" readonly value=<?php echo htmlspecialchars($name);?>></div>
                                                    </div>
                                                    
                                                    </div>
                                                    
                                                    </div>
                                                    
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i>  Add
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