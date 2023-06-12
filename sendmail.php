<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->IsHTML(true);
$mail->setLanguage('ru', 'phpnailre/language');

$mail->addAddress('neokarpenter@gmail.com');

$mail->setFrom('info@fls.guru', 'Site test');
$mail->Subject = 'Заявка с сайта!';

if (!$mail->send()) {
    $message = 'Ошибка';
} else {
    $message = 'OK! Sending!';
}

header('Content-type: application/json');
echo json_encode($response);
?>