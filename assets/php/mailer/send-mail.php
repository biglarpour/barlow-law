<?php
require_once('./class.phpmailer.php');
try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = trim($_POST['name']);
        $from_email = trim($_POST['email']);
        $message = trim($_POST['message']);
        $gotcha = trim($_POST['gotcha']);
        echo $gotcha;
    }
catch (Exception $e)
{
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>