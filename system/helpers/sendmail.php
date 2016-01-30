<?php namespace system\helpers;


class SendMail {

    public static function send ($to, $subject, $message)
    {

        // Для отправки HTML-письма должен быть установлен заголовок Content-type
        $headers = 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Дополнительные заголовки
        $headers .= 'From: Winner System<admin@winner-system.ru>' . "\r\n";

        if (mail($to, $subject, $message, $headers))
        {

            return true;

        }

        return false;

    }

}