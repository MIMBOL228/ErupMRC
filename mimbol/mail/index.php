<?php
include 'craft_mail.php';
include 'class.smtp.php';
include 'class.phpmailer.php';
function Send_Mail($to,$subject,$body){
    $emaill = $GLOBALS['emaill'];
    $from       = $emaill['login'];
    $mail       = new PHPMailer();
    $mail->IsSMTP(true);            // используем протокол SMTP
    $mail->IsHTML(true);
    $mail->SMTPAuth   = true;                  // разрешить SMTP аутентификацию 
    $mail->Host       = "ssl://".$emaill['host']; // SMTP хост
    $mail->Port       =  465;                    // устанавливаем SMTP порт
    $mail->Username   = $emaill['login'];  //имя пользователя SMTP  
    $mail->Password   = $emaill['password'];  // SMTP пароль
    $mail->SetFrom($from, $emaill['title']);
    $mail->AddReplyTo($from,$emaill['title']);
    $mail->CharSet = $emaill['charset'];
    $mail->Subject    = $subject;
    $mail->MsgHTML($body);
    $address = $to;
    $mail->AddAddress($address, $to);
    $mail->Send(); 
}
include 'vost.php';
include 'podt.php';