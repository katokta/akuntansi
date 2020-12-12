<?php

function staffname($con, $adminuser){
    $query=mysqli_query($con, "SELECT Staff_Name FROM staff WHERE Staff_Email='".$adminuser."'");
    $result=mysqli_fetch_array($query, MYSQLI_ASSOC);
    return $query['Staff_Name'];
}

?>