<?php
require 'config/dbcon.php'; // Include your database connection file
require './PHPMailer/src/PHPMailer.php'; // Include PHPMailer
require './PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Check if payment_id and pdf_filename are set in POST data
if (isset($_POST['payment_id']) && isset($_POST['pdf_filename'])) {
    $paymentId = $_POST['payment_id'];
    $pdfFilename = $_POST['pdf_filename'];

    // Query the database to get the user's email address and other details based on payment ID
    $sql = "SELECT * FROM confirm_ticket_tbl WHERE payment_id = '$paymentId'";
    $query = mysqli_query($con, $sql);

    if (!$query) {
        echo "Error in SQL query: " . mysqli_error($con);
    } else {
        $user = mysqli_fetch_assoc($query);
        $userEmail = $user['email']; // Replace with the actual database field containing the user's email

        // Create a new PHPMailer instance
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF; 
        $mail->Host = 'smtp.gmail.com';  // Your SMTP server host
        $mail->Port = 587;  // Your SMTP server port (usually 587 for TLS)
        $mail->SMTPAuth = true;
        $mail->Username = 'tejpratap.digitalshakha@gmail.com';  // Your email address
        $mail->Password = 'ckytndyqptfopcns';  // Your email password
        $mail->SMTPSecure = 'tls';

        $mail->setFrom('tejpratap.digitalshakha@gmail.com', 'steel connect');  // Your email address and name
        $mail->addAddress($userEmail);  // User's email address
        $mail->Subject = 'Ticket Details';

        // Compose the email body
        $mail->isHTML(true);
        $mail->Body = '<p>Thank you for your purchase. Here are your ticket details:</p>';

        // Attach the PDF file using the filename received from the client
        $pdfFilePath = './makepdf.php' . $pdfFilename;
        $mail->addAttachment($pdfFilePath, $pdfFilename);

        // Send the email
        if ($mail->send()) {
            echo "success";
        } else {
            echo "Email sending failed. Error: " . $mail->ErrorInfo;
        }
    }
} else {
    echo "Payment ID or PDF filename not provided.";
}



// session_start();
// require('config/dbcon.php');
// // if (isset($_POST['payment_id'])) {
// //     include('./smtp/PHPMailerAutoload.php');
// //     $payment = $_POST['payment_id'];
// //     $sql = "SELECT * FROM confirm_ticket_tbl WHERE payment_id = '$payment'";
// //     $query = mysqli_query($con,$sql);
// //     $row = mysqli_fetch_assoc($query);
// //     $name = $row['name'];
// //     $email = $row['email'];


// if (isset($_POST['payment_id'])) {
//     include('./smtp/PHPMailerAutoload.php');

//     $payment = $_POST['payment_id'];
//     $sql = "SELECT * FROM confirm_ticket_tbl WHERE payment_id = '$payment'";
//     $query = mysqli_query($con, $sql);

//     if (!$query) {
//         echo "Error in SQL query: " . mysqli_error($con);
//     } else {
//         $row = mysqli_fetch_assoc($query);

//         if (!$row) {
//             echo "No data found for payment ID: $payment";
//         } else {
//             $name = $row['name'];
//             $email = $row['email'];
//             $number = $row['mobile'];
//             $amt = $row['tic_price'];
//             // $result = smtp_mailer($email, $name, $payment);

//             // if ($result === 'Sent') {
//             //     echo 'Email sent successfully!';
//             // } else {
//             //     echo 'Email sending failed. Error: ' . $result;
//             // }
//         }
//     }
// }

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;

// require './PHPMailer/src/PHPMailer.php';
// require './PHPMailer/src/SMTP.php';
// // require './PHPMailer/src/PHPMailer.php';
// // require './PHPMailer/PHPMailerAutoload.php';


// $mail = new PHPMailer();
// $mail->isSMTP();
// $mail->isHTML(true);
// $mail->SMTPDebug = SMTP::DEBUG_OFF; 
// $mail->Host = 'smtp.gmail.com';  
// $mail->Port = 587; 
// $mail->SMTPAuth = true;
// $mail->Username = 'tejpratap.digitalshakha@gmail.com';  
// $mail->Password = 'ckytndyqptfopcns'; 
// $mail->SMTPSecure = 'tls';  

// $mail->setFrom('tejpratap.digitalshakha@gmail.com', 'Steel Connect Ticket'); 
// $mail->addAddress($email);  
// $mail->Subject = 'Thankyou your Ticket Details Is Here';
// // $mail->Body = "Name: $name\nPhone: $number\nEmail: $email\nMessage:\n$message";
// $mail->Body = '<html>
//                   <head>
//                     <style>
//                       body {
//                         font-family: Arial, sans-serif;
//                         background-color: #f1f1f1;
//                       }
//                       h1 {
//                         color: #333;
//                       }
//                       h1 span{
//                         color:#000000;
//                       }
//                       p {
//                         color: #555;
//                       }
//                     </style>
//                   </head>
//                   <body>
//                   <h1>Thankyou<h1>
//                    <p><strong>Name:</strong> ' . $name . '</p>
//                     <p><strong>Phone:</strong> ' . $number . '</p>
//                     <p><strong>Payment Id:</strong> ' . $payment . '</p>
//                     <p><strong>Payment Amount:</strong> ' . $amt . '</p>
//                     <a href="./makepdf.php">Click to PDF</a>
//                </body>
//                 </html>';

// if ($mail->send()) {
//     // $_SESSION['thee_msg'] = "Thank you for your message! We will get back to you soon.";
//     // echo "Thank you for your message! We will get back to you soon.";
//     echo "success";
//     header('location:../ticket.php');
// } else {
//     echo "Oops! Something went wrong. Please try again later.";
//     echo "Mailer Error: " . $mail->ErrorInfo;
// }












// session_start();
// require('config/dbcon.php');

// require_once __DIR__ . '/vendor/autoload.php';

//   $id = $_GET['id'];
//   $sql = "SELECT * from confirm_ticket_tbl where id ='$id'";
//   $result = mysqli_query($con, $sql);
//   $user = mysqli_fetch_assoc($result);
//   $name = $user['name'];
//   $email = $user['email'];
//   $phone = $user['mobile'];
//   $pay = $user['payment_id'];
//   if ($user) {
//     // User found, send "success" status and user data
//     echo json_encode(array("status" => "success", "user" => $user));
// } else {
//     // User not found, send "failure" status
//     echo json_encode(array("status" => "failure"));
// }

// //creating a pdf instance
// $mpdf = new \Mpdf\Mpdf();
// $data = '';
// $data .= '<h1>Your details</h1>';

// // adding data
// // $data .= '<strong>First Name</strong>'. $name . '<br />';
// // $data .= '<strong>Surname</strong>'. $phone . '<br />';
// // $data .= '<strong>Email</strong>'. $email . '<br />';
// // $data .= '<strong>Phone</strong>'. $pay . '<br />';

// if($message){
//     $data .= '<br /><strong>Message</strong>'. $message ;
// }
// //Write Pdf
// $mpdf->WriteHTML($data);

// //output to browser
// $mpdf->Output('file.pdf', 'D');












// if (isset($_POST['payment_id'])) {
//     include('./smtp/PHPMailerAutoload.php');
//     $payment = $_POST['payment_id'];
//     $sql = "SELECT * FROM confirm_ticket_tbl WHERE payment_id = '$payment'";
//     $query = mysqli_query($con,$sql);
//     $row = mysqli_fetch_assoc($query);
//     $name = $row['name'];
//     $email = $row['email'];


// if (isset($_POST['payment_id'])) {
//     include('./smtp/PHPMailerAutoload.php');

//     $payment = $_POST['payment_id'];
//     $sql = "SELECT * FROM confirm_ticket_tbl WHERE payment_id = '$payment'";
//     $query = mysqli_query($con, $sql);

//     if (!$query) {
//         echo "Error in SQL query: " . mysqli_error($con);
//     } else {
//         $row = mysqli_fetch_assoc($query);

//         if (!$row) {
//             echo "No data found for payment ID: $payment";
//         } else {
//             $name = $row['name'];
//             $email = $row['email'];
//             $number = $row['mobile'];
//             $amt = $row['tic_price'];
//             // $result = smtp_mailer($email, $name, $payment);

//             // if ($result === 'Sent') {
//             //     echo 'Email sent successfully!';
//             // } else {
//             //     echo 'Email sending failed. Error: ' . $result;
//             // }
//         }
//     }
// }



// require('dompdf/autoload.inc.php');

// use Dompdf\Dompdf;
// use Dompdf\Options;

//   $id = $_GET['id'];
//   $sql = "SELECT * from confirm_ticket_tbl where id ='$id'";
//   $result = mysqli_query($con, $sql);
//   $user = mysqli_fetch_assoc($result);
//   if ($user) {
//     // User found, send "success" status and user data
//     echo json_encode(array("status" => "success", "user" => $user));
// } else {
//     // User not found, send "failure" status
//     echo json_encode(array("status" => "failure"));
// }

// $dompdf = new Dompdf();
// $options = new Options();
// $options->set('isRemoteEnabled', true);
// $dompdf->setOptions($options);

// ob_start();
// require('details_pdf.php');
// $html = ob_get_clean();


// $dompdf->loadHtml($html);

// $dompdf->setPaper('A4', 'portrait');

// $dompdf->render();

// $dompdf->stream('Ticket',['Attachment'=>false]);







// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;

// require './PHPMailer/src/PHPMailer.php';
// require './PHPMailer/src/SMTP.php';
// // require './PHPMailer/src/PHPMailer.php';
// // require './PHPMailer/PHPMailerAutoload.php';


// $mail = new PHPMailer();
// $mail->isSMTP();
// $mail->isHTML(true);
// $mail->SMTPDebug = SMTP::DEBUG_OFF; 
// $mail->Host = 'smtp.gmail.com';  
// $mail->Port = 587; 
// $mail->SMTPAuth = true;
// $mail->Username = 'tejpratap.digitalshakha@gmail.com';  
// $mail->Password = 'ckytndyqptfopcns'; 
// $mail->SMTPSecure = 'tls';  

// $mail->setFrom('tejpratap.digitalshakha@gmail.com', 'Steel Connect Ticket'); 
// $mail->addAddress($email);  
// $mail->Subject = 'Thankyou your Ticket Details Is Here';
// // $mail->Body = "Name: $name\nPhone: $number\nEmail: $email\nMessage:\n$message";
// $mail->Body = '<html>
//                   <head>
//                     <style>
//                       body {
//                         font-family: Arial, sans-serif;
//                         background-color: #f1f1f1;
//                       }
//                       h1 {
//                         color: #333;
//                       }
//                       h1 span{
//                         color:#000000;
//                       }
//                       p {
//                         color: #555;
//                       }
//                     </style>
//                   </head>
//                   <body>
//                   <h1>Thankyou<h1>
//                    <p><strong>Name:</strong> ' . $name . '</p>
//                     <p><strong>Phone:</strong> ' . $number . '</p>
//                     <p><strong>Payment Id:</strong> ' . $payment . '</p>
//                     <p><strong>Payment Amount:</strong> ' . $amt . '</p>
//                </body>
//                 </html>';

// if ($mail->send()) {
//     // $_SESSION['thee_msg'] = "Thank you for your message! We will get back to you soon.";
//     // echo "Thank you for your message! We will get back to you soon.";
//     echo "success";
//     header('location:../ticket.php');
// } else {
//     echo "Oops! Something went wrong. Please try again later.";
//     echo "Mailer Error: " . $mail->ErrorInfo;
// }
