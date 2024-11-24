<?php
function sendWeatherEmail($recipient, $subject, $message) {
    $headers = "From: no-reply@weatheremailer.com\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    return mail($recipient, $subject, $message, $headers);
}
?>
