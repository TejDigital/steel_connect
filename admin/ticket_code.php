<?php
session_start();
require('config/dbcon.php');


if (isset($_POST['tic_add'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $gst = $_POST['gst'];
    $status = $_POST['status'];
    $color = $_POST['color'];
    $des = $_POST['des'];

    $sql = "INSERT INTO ticket_tbl(tic_name,tic_price,tic_gst,tic_status,tic_color,tic_text)VALUES('$name','$price','$gst','$status','$color','$des')";

    $connect_db = mysqli_query($con, $sql);

    if ($connect_db) {
        $_SESSION['steel_msg'] = "Ticket Added";
        header('location:ticket.php');
    } else {
        $_SESSION['steel_msg'] = "Something went wrong";
        header('location:ticket.php');
    }
}







// ----------------------------------------------UPDATE---------------------------------------

if (isset($_POST['update_tic'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $gst = $_POST['gst'];
    $status = $_POST['status'];

    $query = "UPDATE ticket_tbl SET tic_name='$name',tic_price='$price',tic_gst='$gst',tic_status='$status' WHERE tic_id ='$id'";
    $query_run = mysqli_query($con, $query);


    if ($query_run) {
        $_SESSION['steel_msg'] = "ticket details Updated";
        header('location:ticket.php');
    } else {
        $_SESSION['steel_msg'] = "ticket details updation failed";
        header('location:ticket_edit.php');
    }
}




// --------------------------------------------delete----------------------------------

if (isset($_POST['delete_tic'])) {

    $ticket_id = $_POST['delete_tic_id'];

    $query_delete = " DELETE FROM ticket_tbl WHERE  tic_id ='$ticket_id'";

    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {

        $_SESSION['steel_msg'] = "ticket details deleted";
        header('location:ticket.php');
    } else {
        $_SESSION['steel_msg'] = "ticket details deletion failed";
        header('location:ticket.php');
    }
}
