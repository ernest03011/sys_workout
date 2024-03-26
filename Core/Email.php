<?php

namespace Core;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
  
  public static function send(array $params) : bool
  {

    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->SMTPDebug = $_ENV['SMTP_DEBUG'] ;
    $mail->Host = $_ENV['SMTP_HOST'] ;
    $mail->Port = $_ENV['SMTP_PORT'] ;
    $mail->SMTPSecure =  $_ENV['SMTP_SECURE'];
    $mail->SMTPAuth =  $_ENV['SMTP_AUTH'];
    $mail->Username =  $_ENV['SMTP_USERNAME'];
    $mail->Password =  $_ENV['SMTP_PASSWORD'];
    $mail->setFrom("{$_ENV['SMTP_SET_FROM']}", 'Your Name');
    $mail->addReplyTo("{$_ENV['SMTP_ADD_REPLY_TO']}", 'Your Name');
    $mail->addAddress("{$_ENV['SMTP_RECEIVER_ADDRESS']}", $params['receiver_name']);
    $mail->Subject = 'Sys Workout';
    $mail->Body = $params['body'];
    
    if (!$mail->send()){
        return false;

      }else {
        return true;
    }
  }
}