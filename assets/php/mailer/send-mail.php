<?php
require_once('./class.phpmailer.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = trim($_POST['name']);
        $from_email = trim($_POST['email']);
        $message = trim($_POST['message']);
        $gotcha = trim($_POST['gotcha']);
        echo $_SERVER['REQUEST_METHOD'];
        echo $_POST['email'];
        echo $_POST['name'];
        echo $_POST['gotcha'];
        echo $_POST['message'];
        }
    else{
        echo "Must be a post"
        }
    }
catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>