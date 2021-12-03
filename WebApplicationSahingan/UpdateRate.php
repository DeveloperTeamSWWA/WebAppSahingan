<!DOCTYPE html>
<html lang="en">
<head>
<title>Update Minimum Rate</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="CSS/updaterate.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<div class="header">
<div class="logo"><img src="logo.png" width="70" height="70"></div>
<center>
<h1 class="fonts">SAHINGAN WATER WORKS ASSOCIATION</h1>
</center>
 </div>
<body  scroll="no" style="overflow: hidden">

<div class="buttondiv">
        <a href ="Home.php">
        <button class="button"><b>HOME<b></button><br>
        </a>
       
        <a href ="cashier.php">
        <button class="button"><b>CASHIER<b></button><br>
        </a>
        <a href ="AccountManagement.php">
        <button class="button" ><b>ACCOUNT MANAGEMENT</button><br>
        </a>
         <a href ="MemberInfo.php">
        <button class="button"><b>MEMBER INFO</button><br>
        </a>
        <a href ="UpdateRate.php">
        <button class="button"><b>UPDATE RATE</button><br>
        </a>
        <a href ="Reports.php">
        <button class="button"><b>REPORTS</button><br>
        </a>
        <a href ="index.php">
        <button name="logout" class="button"><b>LOG OUT<b></button><br>
        </a>    
       
</div>
  
    
<div class="inputs">
              
<div class="minimum1">
<div class="head">
<p class="rate">MINIMUM RATE</p>
</div>
<div class="pricecontain">
<div class="peso"> <span class="span">&#8369;</span></div>
 <?php
 include('dbcon.php');
$referenceMember = $database->getReference('Minimum_Rate');
$minimumrate = $referenceMember->getChild('Regular_Price')->getValue();
 ?>
<p class="price"><?php echo $minimumrate ;?>.00</p>
              </div>
              <div class="cubic">
                <p class="cubiclabel"> per 10 cubic meter</p>
              </div>

<a href="MinimumRate.php">  <div class="updatebutton"> <p class="up">UPDATE</p></div>   </a> 

              </div>

              <div class="minimum">
                <div class="head">
    <p class="rate">ADDED RATE</p>
     </div>
     <div class="pricecontain">
       <div class="peso"> <span class="span">&#8369;</span></div>
       <?php
 include('dbcon.php');
$referenceMember = $database->getReference('Minimum_Rate');
$addedrate = $referenceMember->getChild('Regularadded_Rate')->getValue();
 ?>
      
      <p class="price"><?php echo $addedrate ;?>.00</p>
      
      
                  </div>
    
                  <div class="cubic">
    
                    <p class="cubiclabel"> per cubic meter</p>
                  </div>
    
        <a href="AddedRate.php">  <div class="updatebutton"> <p class="up">UPDATE</p></div>   </a> 
    
                  </div>
     
     

           

    
      
       </div>
    
     
       
    


</body>
</html>