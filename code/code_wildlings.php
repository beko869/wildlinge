<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'library/Exception.php';
require 'library/PHPMailer.php';
require 'library/SMTP.php';
require 'mail_config.php';


function getPageHTML( $pathToHTML )
{
    $html = file_get_contents( $pathToHTML );
    $html = str_replace( '@@navigation_html@@', getNavigationHTML(), $html );

    return $html;
}


function getNavigationHTML()
{
    $navigationHTML = file_get_contents( 'html/navigation.html' );
    return $navigationHTML;
}


function sendEmail( $paraSubject, $paraFrom, $paraMessage )
{
    //global MAIL_HOST; MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD;

    $mail = new PHPMailer();

    //mailsettings
    $mail->IsSMTP();
    //$mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->CharSet = 'utf-8';
    $mail->SetLanguage ("de");
    $mail->Host = MAIL_HOST;
    $mail->Mailer = 'smtp';
    $mail->Port = MAIL_PORT;
    $mail->Username = MAIL_USERNAME;
    $mail->Password = MAIL_PASSWORD;


     //Recipients
     $mail->setFrom('wildlinge@gmx.at', $paraFrom );
     $mail->addAddress('bianca.zinner1@gmail.com', 'Bianca Zinner');     // Add a recipient
 
     // Content
     $mail->isHTML(true);                                  // Set email format to HTML
     $mail->Subject = $paraSubject;
     $mail->Body    = $paraMessage;
     $mail->AltBody = $paraMessage;
 
     $mail->send();
    
}