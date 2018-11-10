<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/PHPMailer/src/Exception.php';
require '../vendor/phpmailer/PHPMailer/src/PHPMailer.php';
require '../vendor/phpmailer/PHPMailer/src/SMTP.php';





$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mailgun.org';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'servidor@infocatsoluciones.com';                 // SMTP username
    $mail->Password = 'carlitos';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('servidor@infocatsoluciones.com', 'Servidor infocat');
    $mail->addAddress('infocat2.0@gmail.com', 'Carlos A. Pariona V.');     // Add a recipient
    $mail->addAddress($_POST['correo']);               // Name is optional

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensaje desde la web infocat';
    $mail->Body    = 'Se recibió el siguiente correo:'.'<br><br>'.
    '<strong>Nombre: </strong>'.$_POST['nombre'].'<br>'.
    '<strong>Responder a: </strong>'.$_POST['correo'].'<br>'.
    '<strong>Celular: </strong>'.$_POST['celular'].'<br>'.
    '<strong>Oficio: </strong>'.$_POST['oficio'].'<br>'.
    '<strong>Mensaje: </strong>'.$_POST['mensaje'].'<br>'.
    '------------------------------------------------------'.'<br>'.
    'Enviado desde el formulario de <a href="https://infocatsoluciones.com">Infocat Soluciones</a>'.'<br>'.
    '<em>No responda a éste mensaje autogenerado.<em>';

    $mail->send();
    echo 'Mensaje enviado, en breve le respondremos. Saludos';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>