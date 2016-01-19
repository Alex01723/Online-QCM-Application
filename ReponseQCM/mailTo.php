<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 15/01/2016
 * Time: 15:59
 */

// = "xxx@xxx.fr"; //Destinataire
$from_mail = "xxx@yyy.com"; //Expediteur
$from_name = "Nom"; //Votre nom, ou nom du site
$reply_to = "xxx@yyy.com"; //Adresse de réponse
$subject = "Relevé de notes QCM";
//$file_name = "piece_jointe.pdf";
$path = $_SERVER['DOCUMENT_ROOT'] . "/fichiers";
$typepiecejointe = filetype($path . $file_name);
$data = chunk_split(base64_encode(file_get_contents($path . $file_name)));
//Génération du séparateur
$boundary = md5(uniqid(time()));
$entete = "From: $from_mail \n";
$entete .= "Reply-to: $from_mail \n";
$entete .= "X-Priority: 1 \n";
$entete .= "MIME-Version: 1.0 \n";
$entete .= "Content-Type: multipart/mixed; boundary=\"$boundary\" \n";
$entete .= " \n";
$message = "--$boundary \n";
$message .= "Content-Type: text/html; charset=\"iso-8859-1\" \n";
$message .= "Content-Transfer-Encoding:8bit \n";
$message .= "\n";
$message .= "Bonjour,
Veuillez trouver ci-joint et ci dessous votre correction
Cordialement\n";
$message .= $correction . "\n";
$message .= "\n";
$message .= "--$boundary \n";
$message .= "Content-Type: $typepiecejointe; name=\"$file_name\" \n";
$message .= "Content-Transfer-Encoding: base64 \n";
$message .= "Content-Disposition: attachment; filename=\"$file_name\" \n";
$message .= "\n";
$message .= $data . "\n";
$message .= "\n";
$message .= "--" . $boundary . "--";