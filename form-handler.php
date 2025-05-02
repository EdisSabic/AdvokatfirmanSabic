<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'edsa1407@gmail.com';
        $mail->Password = 'vciu xvkc ixos admz'; // Replace with Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom($_POST['email'], $_POST['name']);
        $mail->addAddress('edsa1407@gmail.com'); // or another email you want to receive on

        $mail->isHTML(true);
        $mail->Subject = $_POST['subject'];
        $mail->Body    = nl2br(htmlspecialchars($_POST['message']));
        $mail->AltBody = strip_tags($_POST['message']);

        $mail->send();
        echo 'Ditt meddelande har skickats!';
    } catch (Exception $e) {
        echo "Ett fel uppstod: {$mail->ErrorInfo}";
    }
}
?>
