<?php

include('dbcon.php');

$reference = $database->getReference('Login')->getChild('Sahingan');
$user = $reference->getChild('Username')->getValue();
$pass = $reference->getChild('Password')->getValue();
$as = $reference->getChild('as')->getValue();
if(isset($_POST['reset'])){
    
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];
        if(empty($newpassword) || empty($confirmpassword)){
            echo "Fill up all the fields!";
            header("Location: resetpass.php?error=Fill up the fields");
        }
        else{
        if($newpassword == $confirmpassword){
            $database->getReference("Login/Sahingan")
            ->set([
                
             'Username' => $user,
             'Password' => $confirmpassword,
             'as'=> $as,
          
               ]);
               header("Location: resetpass.php?success=Successfuly Reset");
            }
        if($newpassword != $confirmpassword){
                echo "Unmatched Password";
                header("Location: resetpass.php?error=Unmatched Password");
            }
        }
}


?>
