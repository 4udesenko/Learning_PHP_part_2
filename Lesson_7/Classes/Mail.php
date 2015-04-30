<?php

namespace App\Classes;

class Mail {
    public function send()
    {
        $mail = new \PHPMailer;
        $mail->isSMTP();
        $mail->setFrom('from@example.com', 'First Last');
        $mail->addAddress('nikita@joylia.com');
        $mail->Subject = 'Добаление новости';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

        return $mail->send();
    }
}