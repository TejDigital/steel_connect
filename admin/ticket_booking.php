<?php
session_start();
require('config/dbcon.php');

if(isset($_POST['booked'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $tol_price = $_POST['tol_price'];
    $tic_number = $_POST['tic_number'];

$_SESSION['all'] = [
    $_SESSION['name'] = $name,
    $_SESSION['number'] = $number,
    $_SESSION['email'] = $email,
    $_SESSION['price'] = $tol_price,
    $_SESSION['tic_number'] = $tic_number];

    echo "<pre>";
    print_r($_SESSION['all']);
    echo "<pre>";
}

?>