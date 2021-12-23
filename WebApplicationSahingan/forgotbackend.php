<?php
  use PHPMailer\PHPMailer\PHPMailer;
include('dbcon.php');

$reference = $database->getReference('Login')->getChild('Sahingan');
$user = $reference->getChild('Username')->getValue();
$email = $reference->getChild('Email')->getValue();

if(isset($_POST['send'])){
    $username = $_POST['username'];
   
     if($username == $user){
        
     }  
}
if(isset($_POST['back'])){
    header("Location: index.php");
}

?>
