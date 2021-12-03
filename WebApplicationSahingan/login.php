<?php

include('dbcon.php');

$reference = $database->getReference('Login')->getChild('Sahingan');
$user = $reference->getChild('Username')->getValue();
$pass = $reference->getChild('Password')->getValue();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
     if($username == $user && $password == $pass){
        header("Location: Home.php");
     }
     else if($username != $user && $password != $pass){
         echo "Invalid Username or Password";
         header("Location: index.php?error=Incorrect Username or Password");
     }
     else if($username != $user && $password == $pass){
        header("Location: index.php?error=Incorrect Username or Password");
        echo "Invalid Username or Password";
    }
    else if($username == $user && $password != $pass){
        header("Location: index.php?error=Incorrect Username or Password");
        echo "Invalid Username or Password";
    }
    
     else{

     }
}



?>