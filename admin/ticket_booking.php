<?php
session_start();
require('config/dbcon.php');

// if(isset($_POST['booked'])){
//     $name = $_POST['name'];
//     $number = $_POST['number'];
//     $email = $_POST['email'];
//     $tol_price = $_POST['tol_price'];
//     $tic_number = $_POST['tic_number'];

// // $_SESSION['all'] = [
// //     $_SESSION['name'] = $name,
// //     $_SESSION['number'] = $number,
// //     $_SESSION['email'] = $email,
// //     $_SESSION['price'] = $tol_price,
// //     $_SESSION['tic_number'] = $tic_number];


//     $sql = "INSERT INTO confirm_ticket_tbl (name,mobile,email,tic_price,tic_number)VALUES('$name','$number','$email','$tol_price','$tic_number')";
//     $query = mysqli_query($con ,$sql);

//     if ($query) {
//         $_SESSION['steel_msg'] = "way to Payment";
//         header('location:../ticket.php');
//     } else {
//         $_SESSION['steel_msg'] = "failed Try Again";
//         header('location:../ticket.php');
//     }

//     // echo "<pre>";
//     // print_r($_SESSION['all']);
//     // echo "<pre>";
// }

if (isset($_POST['name']) && isset($_POST['number']) && isset($_POST['email']) && isset($_POST['tol_price']) && isset($_POST['tic_number']) && isset($_POST['tic_name'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $tol_price = $_POST['tol_price'];
    $tic_number = $_POST['tic_number'];
    $tic_name = $_POST['tic_name'];
    $payment_status = "Pending";

    // print_r($_POST);
    // die();

    $sql = "INSERT INTO confirm_ticket_tbl (name, mobile,tic_name, email, tic_price, tic_number,payment_status) VALUES ('$name', '$number', '$tic_name', '$email', '$tol_price', '$tic_number','$payment_status')";
    $query = mysqli_query($con, $sql);
    $_SESSION['PID'] = mysqli_insert_id($con);

    if ($query) {
        echo "success";
    } else {
        echo "failure";
    }
}
if (isset($_POST['payment_id']) && $_SESSION['PID']) {
    $payment = $_POST['payment_id'];
    $payment_status = "complete";
    $sql = "UPDATE confirm_ticket_tbl SET payment_id ='$payment' ,payment_status='$payment_status' where id= '" . $_SESSION['PID'] . "'";
    $query = mysqli_query($con, $sql);
    if ($query) {
        echo "success";
    } else {
        echo "failure";
    }
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
