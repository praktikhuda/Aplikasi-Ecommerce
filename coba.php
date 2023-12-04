<?php
// Gunakan namespace PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Memanggil autoloader Composer
// require 'vendor/autoload.php';
require 'library/Exception.php';
require 'library/PHPMailer.php';
require 'library/SMTP.php';

// Membuat instance PHPMailer
$mail = new PHPMailer(true); // Gunakan true untuk mengaktifkan penanganan eksepsi

try {
    // Konfigurasi pengaturan email
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'praktikhuda@gmail.com'; // Ganti dengan alamat email Gmail Anda
    $mail->Password = 'Huda12345!?'; // Ganti dengan kata sandi Gmail Anda
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Pengaturan email pengirim dan penerima
    $mail->setFrom('msamsulh89@gmail.com', 'Your Name');
    $mail->addAddress('msamsulh89@gmail.com', 'Recipient Name');

    // Isi email
    $mail->Subject = 'Samsul';
    $mail->Body = 'This is the body of the email.';

    // Kirim email
    $mail->send();
    echo 'Email has been sent!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>