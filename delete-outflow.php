<?php
session_start();

include 'includes/dbconnection.php';
$id=$_GET["id"];

$getData = $con->query("DELETE FROM outflow WHERE Outflow_ID=".$id."");

if($getData->num_rows==0){
    header("location:outflow.php");
    exit();
}
?>