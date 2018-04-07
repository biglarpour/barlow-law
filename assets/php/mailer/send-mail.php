<?php
require_once('./class.phpmailer.php');
try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = trim($_POST['name']);
        $from_email = trim($_POST['email']);
        $message = trim($_POST['message']);
        $gotcha = trim($_POST['gotcha']);
        //PHPMailer Object
        $mail = new PHPMailer;
        //From email address and name
        $mail->From = $from_email;
        $mail->FromName = $name;

        //To address and name
        $mail->addAddress("biglarpour@gmail.com", "Abo Test");

        //Address to which recipient will reply
        $mail->addReplyTo($from_email, "Reply");

        //Send HTML or Plain Text email
        $mail->isHTML(true);

        $mail->Subject = "BarlowLaw.co " . $name . "wants to get in touch";
        $mail->Body = "<i>" . $message . "</i>";
        $mail->AltBody = $message;
        if (!empty($gotcha){
            if(!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
        }
            else {
                echo "Message has been sent successfully";
            }
        }
        else {
            echo "You do not have permission";
        }
    }
}catch (Exception $e)
{
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>