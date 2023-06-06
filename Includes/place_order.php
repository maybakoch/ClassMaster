<?php
require 'mailer/src/Exception.php';
require 'mailer/src/PHPMailer.php';
require 'mailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mailer = array(
    'host'=>'smtp.gmail.com',
    'username'=>'classmasteon@gmail.com',
    'password'=>'wucwaliwhcrosgdq',
    'fromName'=>'ClassMaster',
    'from'=>'classmasteon@gmail.com'
);

if(isset($_POST['placeorder'])){
    $total = 0;
    $message = "<b>Order Details</b><br><br>";
    for($i=0; $i<count($_POST['product_name']); $i++){
		if($_POST['product_quantity'][$i]>0){
        	$message.= $_POST['product_quantity'][$i].' x '.$_POST['product_name'][$i].' ($'.$_POST['product_price'][$i].')'.'<br>';
        	$total += $_POST['product_price'][$i] * $_POST['product_quantity'][$i];
		}
    }
    
    $message.= "<br><b>Order Total:</b> $".$total;
	$subject = 'Order Placed';

    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;                                     
        $mail->isSMTP();                                          
        $mail->Host       = $mailer['host']; 
        $mail->SMTPAuth   = true;                         
        $mail->Username   = $mailer['username'];           
        $mail->Password   = $mailer['password'];                              
        $mail->SMTPSecure = 'tls';                                  
        $mail->Port       = 587;                               
        $mail->setFrom($mailer['from'], $mailer['fromName']);                                  
        $mail->addAddress('art.products100@gmail.com', '');
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body    = $message;
        if($mail->send()){
           
             echo '<script>alert("Order placed successfully");</script>';
            echo '<script>window.location.href = "../Includes/homepage.html";</script>';
    exit();

        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        die();
    }
    
    
}


