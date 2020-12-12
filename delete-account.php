<?php
session_start();

include 'includes/dbconnection.php';
$id=$_GET["id"];

$getData = $con->query("DELETE FROM akun_perkiraan WHERE AccountID=".$id."");

if($getData->num_rows==0){
    header("location:accountlist.php");
    exit();
}
?>