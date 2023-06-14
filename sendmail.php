<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

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

$body = '<h1>Письмо с сайта заявок на курсы</h1>';

if(trim(!empty($_POST['name']))){
    $body .= '<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
}

$mail->Body = $body;

if (!$mail->send()) {
    $message = 'Ошибка';
} else {
    $message = 'OK! Sending!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>