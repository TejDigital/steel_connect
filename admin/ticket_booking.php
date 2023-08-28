<?php
session_start();
require('config/dbcon.php');

if(isset($_POST['booked'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $tol_price = $_POST['tol_price'];
    $tic_number = $_POST['tic_number'];

// $_SESSION['all'] = [
//     $_SESSION['name'] = $name,
//     $_SESSION['number'] = $number,
//     $_SESSION['email'] = $email,
//     $_SESSION['price'] = $tol_price,
//     $_SESSION['tic_number'] = $tic_number];


    $sql = "INSERT INTO confirm_ticket_tbl (name,mobile,email,tic_price,tic_number)VALUES('$name','$number','$email','$tol_price','$tic_number')";
    $query = mysqli_query($con ,$sql);

    if ($query) {
        $_SESSION['steel_msg'] = "way to Payment";
        header('location:../ticket.php');
    } else {
        $_SESSION['steel_msg'] = "failed Try Again";
        header('location:../ticket.php');
    }

    // echo "<pre>";
    // print_r($_SESSION['all']);
    // echo "<pre>";
}


// --------------------------------------------delete----------------------------------

if (isset($_POST['delete_book'])) {

    $id = $_POST['delete_book_id'];

    $query_delete = " DELETE FROM confirm_ticket_tbl WHERE  id ='$id'";

    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {

        $_SESSION['steel_msg'] = "Booking details deleted";
        header('location:booking_tbl.php');
    } else {
        $_SESSION['steel_msg'] = "Booking details deletion failed";
        header('location:booking_tbl.php');
    }
}

?>