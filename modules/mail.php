<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';


/**
 * @throws Exception
 */
function sendMail($name, $email, $order, $phone)
{
    $mail = new PHPMailer();

    $myEmail = 'yandex.ru';
    $pass = 'pass';

    $mail->Mailer = 'smtp';
    $mail->Host = 'ssl://smtp.yandex.ru';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = $myEmail;
    $mail->Password = $pass;

    $mail->setFrom($myEmail, 'Lider Poiska');
    $mail->addAddress($email, $name);

    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Тестовое задание, заказ №' . $order;
    $mail->Body = $name . ', заказ ' . $order . ' сформирован. В ближайшее время наш специалист свяжется с вами по телефону ' . '+' . $phone . ' .';

    if (!$mail->send()) {
        echo 'Ошибка: ' . $mail->ErrorInfo;
    }
}
