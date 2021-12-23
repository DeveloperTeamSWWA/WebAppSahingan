<?php
  use PHPMailer\PHPMailer\PHPMailer;
include('dbcon.php');

$reference = $database->getReference('Login')->getChild('Sahingan');
$user = $reference->getChild('Username')->getValue();
$email = $reference->getChild('Email')->getValue();

if(isset($_POST['send'])){
    $username = $_POST['username'];
   
     if($username == $user){
        
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        
         $mail = new PHPMailer;
         $mail->isSMTP();                                      // Set mailer to use SMTP
         $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
         $mail->SMTPAuth = false;                               // Enable SMTP authentication
         $mail->Username = 'developerteamswwa@gmail.com';                 // SMTP username
         $mail->Password = 'SWWAssociation';                           // SMTP password
         $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
         $mail->Port = 25;                                    // TCP port to connect to
         
         $mail->setFrom('developerteamswwa@gmail.com', 'Sahingan Water Works Association');
         $mail->addAddress($email);     // Add a recipient
         $mail->addReplyTo('developerteamswwa@gmail.com');
         
         //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
         $mail->isHTML(true);                                  // Set email format to HTML
         
            $mail->Subject='Reset Password';
           $mail->Body='http://3.38.168.232/WebAppSahingan/WebApplicationSahingan/resetpass.php'.'   Please click the link to reset password!';
           $mail->AltBody ='To reset the password please click the link!';
           $mail->SMTPOptions = array(
             'ssl' => array(
                 'verify_peer' => false,
                 'verify_peer_name' => false,
                 'allow_self_signed' => true
             )
         );
         if(!$mail->send()) {
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
         } 
         if($mail->send()) {
            echo 'Message sent';
            header("Location: forgotpass.php?success=Message Sent");
        } 
        

        
     }else{
        echo "Invalid Username!";
        header("Location: forgotpass.php?error=Invalid Username");
     }
    
}

if(isset($_POST['back'])){
    header("Location: index.php");
}



?>
