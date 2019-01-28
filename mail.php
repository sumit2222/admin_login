<?php

require_once "phpmailer/PHPMailerAutoload.php";

//PHPMailer Object
$mail = new PHPMailer;

//From email address and name
$mail->From = "2731998sk@gmail.com";
$mail->FromName = "Sumit Kumar";

//To address and name
$mail->addAddress("sk35463@gmail.com", "Sumit KK");
$mail->addAddress("sk35463@gmail.com"); //Recipient name is optional

//Address to which recipient will reply
$mail->addReplyTo("2731998sk@gmail.com", "Reply");

//CC and BCC
$mail->addCC("sk35463@gmail.com");
$mail->addBCC("sk35463@gmail.com");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}