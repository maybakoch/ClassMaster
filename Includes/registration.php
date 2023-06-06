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
        
        	$server_name="Localhost";
            $user_name="u984052863_sCLQ7";
            $password="May123123!";
            $database_name="u984052863_l8d3L";
        	$conn=new mysqli($server_name,$user_name,$password,$database_name);
        		if ($conn->connect_error)  {
        		die ("connection failed:".$conn->connect_error);
        												}
        												$fullname=$_POST['fullname'];
        												$id=$_POST['id'];
        												$email=$_POST['email'];
        											
        											
        											if (isset($_POST['classNameValue1'])) {$ClassName  = $_POST['classNameValue1']; }
        											elseif (isset($_POST['classNameValue2'])) { $ClassName = $_POST['classNameValue2']; }
        											elseif (isset($_POST['classNameValue3'])) { $ClassName  = $_POST['classNameValue3']; }
        											elseif (isset($_POST['classNameValue4'])) { $ClassName  = $_POST['classNameValue4']; }
        											elseif (isset($_POST['classNameValue5'])) { $ClassName  = $_POST['classNameValue5']; }
        											elseif (isset($_POST['classNameValue6'])) { $ClassName  = $_POST['classNameValue6']; }
        											
        											
        											if (isset($_POST['priceValue1'])) {$price  = $_POST['priceValue1']; }
        											elseif (isset($_POST['priceValue2'])) { $price = $_POST['priceValue2']; }
        											elseif (isset($_POST['priceValue3'])) { $price  = $_POST['priceValue3']; }
        											elseif (isset($_POST['priceValue4'])) { $price  = $_POST['priceValue4']; }
        											elseif (isset($_POST['priceValue5'])) { $price  = $_POST['priceValue5']; }
        											elseif (isset($_POST['priceValue6'])) { $price  = $_POST['priceValue6']; }
        											
                                            
        												
        												$phone=$_POST['phone'];
        												$time=$_POST['time'];
        												if(empty($fullname)||empty($id)||empty($email)||empty($phone)||empty($time)) {
        													echo "Please enter all the required fields";
        												}
        												else {
        													$sql = "INSERT INTO Reservation (FullName, ID, Email, ClassName, Price, Phone,  Time)
        														VALUES ('$fullname', '$id', '$email','$ClassName', '$price','$phone','$time')";
        														if (!$conn->query($sql)) {echo "Error: " . $sql . "<br>" . $conn->error;}
        														
        											$message.= 'Hello '.$fullname.'. Your registration for class "'.$ClassName.'" has been successfully completed. Looking forward to seeing you soon! In the meantime, you can add the class to your personal calendar and receive a reminder about the class and how to get there via the "activities" page on our website.';
    $subject = 'Registration Successfull';

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
        $mail->addAddress($email, '');
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body    = $message;
        if($mail->send()){
            //echo 'Order placed successfully.';
            
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        die();
    }
    

    echo '<script>window.location.href = "../Includes/homepage.html";</script>';
    exit();


}

$conn->close();
 ?>