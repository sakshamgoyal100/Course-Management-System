<?php

if (!@$_POST['email'] || !@$_POST['subject'] || !@$_POST['html']) {

	die(json_encode(array('msg' => "Invalid data.", "status" => 'error')));

};

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer(true);
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Port = 587;
$mail->Username = 'goyalsajal173@gmail.com';
$mail->Password = 'lgmedyokcsoittyk';
$mail->SMTPSecure = 'tls'; 


// $mail->setFrom('goyalsajal73@gmail.com', 'Sajal Goyal');
$mail->addAddress($_POST['email'], 'Saksham Goyal');
$mail->isHTML(true);
$mail->Subject = $_POST['subject'];
$mail->Body    = $_POST['html'];


try {
    $res = $mail->send();
    if($res){
        die(json_encode(array('msg' => "Email sent successfully", "status" => 'success')));
    }
    else{
        die(json_encode(array('msg' => "Email not sent please contact to admin", "status" => 'error')));
    }
    
} catch (Exception $e) {
    die(json_encode(array('msg' => 'Email could not be sent. Error: '. $mail->ErrorInfo, "status" => 'error')));
}


?>
