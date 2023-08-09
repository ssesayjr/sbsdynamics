<?php

require "vendor/autoload.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './assets/vendor/phpmailer/src/Exception.php';
require './assets/vendor/phpmailer/src/PHPMailer.php';
require './assets/vendor/phpmailer/src/SMTP.php';

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp-relay.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "comm@sbsdyn.com";
$mail->Password = "DynamicCommunication88!";

$mail->setFrom($email, $name);
$mail->addAddress("samuel.sesay@sbsdyn.com", "Samuel");

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

echo "email sent";
?>