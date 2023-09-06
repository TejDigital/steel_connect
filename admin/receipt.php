<?php
session_start();
require('config/dbcon.php');

// if (isset($_POST['payment_id'])) {
//     include('./smtp/PHPMailerAutoload.php');
//     $payment = $_POST['payment_id'];
//     $sql = "SELECT * FROM confirm_ticket_tbl WHERE payment_id = '$payment'";
//     $query = mysqli_query($con,$sql);
//     $row = mysqli_fetch_assoc($query);
//     $name = $row['name'];
//     $email = $row['email'];


if (isset($_POST['payment_id'])) {
    include('./smtp/PHPMailerAutoload.php');

    $payment = $_POST['payment_id'];
    $sql = "SELECT * FROM confirm_ticket_tbl WHERE payment_id = '$payment'";
    $query = mysqli_query($con, $sql);

    if (!$query) {
        echo "Error in SQL query: " . mysqli_error($con);
    } else {
        $row = mysqli_fetch_assoc($query);

        if (!$row) {
            echo "No data found for payment ID: $payment";
        } else {
            $name = $row['name'];
            $email = $row['email'];
            $number = $row['mobile'];
            $amt = $row['tic_price'];
            // $result = smtp_mailer($email, $name, $payment);

            // if ($result === 'Sent') {
            //     echo 'Email sent successfully!';
            // } else {
            //     echo 'Email sending failed. Error: ' . $result;
            // }
        }
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
// require './PHPMailer/src/PHPMailer.php';
// require './PHPMailer/PHPMailerAutoload.php';


$mail = new PHPMailer();
$mail->isSMTP();
$mail->isHTML(true);
$mail->SMTPDebug = SMTP::DEBUG_OFF; 
$mail->Host = 'smtp.gmail.com';  
$mail->Port = 587; 
$mail->SMTPAuth = true;
$mail->Username = 'tejpratap.digitalshakha@gmail.com';  
$mail->Password = 'ckytndyqptfopcns'; 
$mail->SMTPSecure = 'tls';  

$mail->setFrom('tejpratap.digitalshakha@gmail.com', 'Steel Connect Ticket'); 
$mail->addAddress($email);  
$mail->Subject = 'Thankyou your Ticket Details Is Here';
// $mail->Body = "Name: $name\nPhone: $number\nEmail: $email\nMessage:\n$message";
$mail->Body = '<html>
                  <head>
                    <style>
                      body {
                        font-family: Arial, sans-serif;
                        background-color: #f1f1f1;
                      }
                      h1 {
                        color: #333;
                      }
                      h1 span{
                        color:#000000;
                      }
                      p {
                        color: #555;
                      }
                    </style>
                  </head>
                  <body>
                  <h1>Thankyou<h1>
                   <p><strong>Name:</strong> ' . $name . '</p>
                    <p><strong>Phone:</strong> ' . $number . '</p>
                    <p><strong>Payment Id:</strong> ' . $payment . '</p>
                    <p><strong>Payment Amount:</strong> ' . $amt . '</p>
               </body>
                </html>';

if ($mail->send()) {
    // $_SESSION['thee_msg'] = "Thank you for your message! We will get back to you soon.";
    // echo "Thank you for your message! We will get back to you soon.";
    echo "success";
    header('location:../ticket.php');
} else {
    echo "Oops! Something went wrong. Please try again later.";
    echo "Mailer Error: " . $mail->ErrorInfo;
}

