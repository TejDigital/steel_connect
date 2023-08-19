<?php
session_start();
require('config/dbcon.php');

if(isset($_POST['booked'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $tol_price = $_POST['tol_price'];

$_SESSION['all'] = [
    $_SESSION['name'] = $name,
    $_SESSION['number'] = $number,
    $_SESSION['email'] = $email,
    $_SESSION['price'] = $tol_price];

    echo "<pre>";
    print_r($_SESSION['all']);
    echo "<pre>";
}

?>