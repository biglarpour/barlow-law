<?php
try {
    if(isset($_POST['email'])) {
        $email_from = "egbarlow@gmail.com";
        $email_to = "biglarpour@gmail.com";
        function died($error) {
            // your error code can go here
            echo "We are very sorry, but there were error(s) found with the form you submitted. ";
            echo "These errors appear below.<br /><br />";
            echo $error."<br /><br />";
            echo "Please go back and fix these errors.<br /><br />";
            die();
        }
        function clean_string($string) {
            $bad = array("content-type","bcc:","to:","cc:","href");
            return trim(str_replace($bad,"",$string));
        }
        $name = clean_string($_POST['name']); // required
        $email_address = clean_string($_POST['email']); // required
        $comments = clean_string($_POST['message']); // required
        $email_subject = "Barlow Law Inc. Prospect client requesting contact ";
        $email_subject .= $name;
        $error_message = "";
        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
        if(!preg_match($email_exp,$email_address)) {
            $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
        }
        $string_exp = "/^[A-Za-z .'-]+$/";
        if(!preg_match($string_exp,$name)) {
            $error_message .= 'The Name you entered does not appear to be valid.<br />';
        }
        if(empty($_POST['placeholder'])){
            $error_message .= 'Authentication to use this service is not valid.<br />';
        }
        if(strlen($error_message) > 0) {
            died($error_message);
        }
        $email_message = "The following person reached you via BarlowLaw.co\n\n";
        $email_message .= "Name: ".$name."\n";
        $email_message .= "Email: ".$email_address."\n";
        $email_message .= "Message: ".$comments."\n";
        // create email headers
        $headers = 'From: '.$email_from."\r\n".
                   'Reply-To: ' .$email_address. "\r\n" .
                   'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);
        exit(header("Location:http://barlowlaw.co"));
    }
    else {
        echo "nothing";
    }
}
catch (Exception $e)
{
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>