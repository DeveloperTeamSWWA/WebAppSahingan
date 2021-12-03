<?php

include('dbcon.php');

$reference = $database->getReference('Login')->getChild('Sahingan');
$user = $reference->getChild('Username')->getValue();
$pass = $reference->getChild('Password')->getValue();
$as = $reference->getChild('as')->getValue();
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];

     if($username == $user){
        if($newpassword == $confirmpassword){
            $database->getReference("Login/Sahingan")
            ->set([
                
             'Username' => $username,
             'Password' => $confirmpassword,
             'as'=> $as,
          
               ]);
               header("Location: forgotpass.php?success=Successfuly Reset");
              
        }else{
            echo "Unmatched Password";
            header("Location: forgotpass.php?error=Unmatched Password");
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
