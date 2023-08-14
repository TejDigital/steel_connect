<?php

$localhost = "localhost";
$username ="root";
$password ="";
$db_name="steel_connect_db";

$con = mysqli_connect($localhost,$username,$password,$db_name);

if(!$con){
    // die(mysqli_connect_errno($con));
    header("location:../errors/dberror.php");
}
// else{
//     echo"Connection Successful";
// }
?>