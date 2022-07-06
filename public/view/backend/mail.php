<?php

$to = "er.gouez@wanadoo.fr";
$subject = "Utilisation de mail() avec PHP depuis windows";
$message = "Test de transmition de mail par wamp";

$headers = "Content-Type: text/plain; charset=utf-8\r\n";
$headers .="From: er.gouez@gmail.com\r\n";

if (mail($to, $subject, $message, $headers))
    echo 'envoye !';
    else
    echo 'erreur envoi';