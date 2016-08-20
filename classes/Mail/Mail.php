<?php

namespace Mail;

class Mail {
    public static function sendMail($subject, $message) {
        /* получатели */
        $to= "<bigzhuk@ya.ru>";

        /* Для отправки HTML-почты вы можете установить шапку Content-type. */
        $headers= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        /* дополнительные шапки */
        $headers .= "From: avtomotors-50.ru <robot@avtomotors-50.ru>\r\n";

        /* и теперь отправим из */
        return mail($to, $subject, $message, $headers);
    }
}