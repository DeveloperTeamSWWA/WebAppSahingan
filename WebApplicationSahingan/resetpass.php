<?php

include('resetbackend.php');

?>
<html lang="en">
<title>Reset Password</title>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="CSS/forgot.css">
<title>Login</title>
      
    </head>
    <body>
       <div class="center">
       <div class="logo"><img src="logo.png" width="90" height="90"></div>
            <h1>Reset Password</h1>
            
            <form action ="resetpass.php" method="post" id="LoginForm">
            <div class="error2">
            <?php if (isset($_GET['error'])){?>
            <p class ="error"><?php echo $_GET['error']; ?></p>
            </div>
            
            <?php } ?>

            <div class="error2">
            <?php if (isset($_GET['success'])){?>
            <p class ="success"><?php echo $_GET['success']; ?></p>
            </div>
            
            <?php } ?>
                
                <div class="txt_field">
                <input type="password" name="newpassword" id="pass" minlength="8">
                <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                <span></span>
                <label >New Password</label>
                </div>
                <div class="txt_field">
                <input type="password" name="confirmpassword" id="pass">
                <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                <span></span>
                <label class="label1">New Password</label>
                </div>
                
                <button id="login" name="reset" class="log">RESET</button>
           
                <br>
                
                
                <div class="signup_link">
                 
                </div>
              
                
            </form>
            


        </div>
     

    </body>
    </html>
