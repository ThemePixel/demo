<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/autoload.php';


$mail = new PHPMailer(true);


$mail->setLanguage('ru','vendor/phpmailer/phpmailer/language/');
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;   

    $mail->isSMTP();   

    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'z9110857@gmail.com';                     
    $mail->Password   = 'ibhosrqigdaucnfq';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;   


    $mail->CharSet = 'UTF-8';
    //$mail->From = 'Pixel@gmail.com';
    
    $mail->setFrom('hrthrtht@gmail.com', 'Pixel');
    $mail->addAddress('z9110857@gmail.com', 'Pixel');  
    


    $mail->Subject = 'From "Pixel.com"';
   
    $mail->addReplyTo("reply@yourdomain.com", "Reply"); //CC and BCC 
    $mail->addCC("cc@example.com"); 
    $mail->addBCC("bcc@example.com"); //Send HTML or Plain Text email 



    $mail->isHTML(true);  
    
    


    $body = '<h1>New order!</h1>';

    if(trim(!empty($_POST['name']))){
        $body.='<p><strong>Name:</strong> '.$_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['phone']))){
        $body.='<p><strong>Phone:</strong> '.$_POST['phone'].'</p>';
    } 

    if(trim(!empty($_POST['email']))){
        $body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';
    }
    if(trim(!empty($_POST['body']))){
        $body.='<p><strong>Message:</strong> '.$_POST['body'].'</p>';
    }
    




    $mail->Body = $body;

    if (!$mail->send()) {
        $message = 'Ошибка';
    } else {
        $message = 'Данные отправлены!';
    }

    $response = ['message' => $message];


    

    header('Content-type: application/json');
    echo json_encode($response);



   

    ?>




















