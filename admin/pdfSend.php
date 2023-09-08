<?php
require_once './PHPMailer/src/PHPMailer.php';
require_once './PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// ... (SMTP configuration and other setup code)

if (isset($_POST['email']) && isset($_POST['pdfFilePath'])) {
    $email = $_POST['email'];
    $pdfFilePath = $_POST['pdfFilePath'];

    $mail = new PHPMailer();
    $mail->isSMTP();
    // ... (SMTP configuration and other setup code)

    $mail->setFrom('tejpratap.digitalshakha@gmail.com', 'Steel Connect Ticket');
    $mail->addAddress($email);
    $mail->Subject = 'Thank you - Your Ticket Details Are Here';

    $mail->Body = '<html>
                  <!-- ... (your HTML content here) ... -->
                </html>';

    // Attach the PDF file

    $mail->addAttachment($pdfFilePath);
    $pdfFilePath = __DIR__ . './pdfSend.php/file.pdf'; // Adjust the path as needed
$mpdf->Output($pdfFilePath, 'F');



    if ($mail->send()) {
        // Email sent successfully
        echo "success";
    } else {
        // Email sending failed
        echo "Email sending failed. Error: " . $mail->ErrorInfo;
    }
} else {
    echo "Invalid request.";
}
?>
