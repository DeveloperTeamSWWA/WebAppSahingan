<?php
include('Homebackend.php');

?>
<html>
<head>
   
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="CSS/stylehome.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="header">
<div class="logo"><img src="logo.png" width="70" height="70"></div>
<center>
<h1 class="fonts">SAHINGAN WATER WORKS ASSOCIATION</h1>
</center>
 </div>


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

<div class ="info">
<div class ="memcount">
<?php
include('dbcon.php');

$reference = $database->getReference('Members');
$numchild = $database->getReference('Members')->getSnapshot()->numChildren(); 
if($numchild < 0){

}
else{
$getkey = $database->getReference('Members')->getChildKeys();
$i = 0;


foreach ($getkey as $key){
   
    $i++;
  
}
$i= $i - 1;
if($i < 0){
  $i = $i*0;
}
}
?>
<h4 class="echoI"><?php echo $i; ?></h4>
<h4 class="memtxt">MEMBER COUNT</h4>
</div>

</div>
<div class = "wrapper">
<form action ="Home.php" method="post">
  <br>
  <br>
  <h3 class="sns">Send Notification</h3>
  <textarea name="msgannouncement" id="" cols="40" rows="10"></textarea>
  <br>
 <br>
  <input type = "submit" name = "sendannouncement" class="searchterm" value="SEND ANNOUNCEMENT">
  <input type="date" name="date" class="setdate">
  <input type = "submit" name = "setduedate" class="searchterm2" value="Set due date">
  </form>
</div>
<div class="wraperror">
        <h4><?php echo $message; ?></h4>
        </div>

<div class = "defmeter">
<?php
include('dbcon.php');

$reference = $database->getReference('Defective_Meter');
$numchild = $database->getReference('Defective_Meter')->getSnapshot()->numChildren(); 
if($numchild < 0){

}
else{
$getkey = $database->getReference('Defective_Meter')->getChildKeys();
$i = 0;


foreach ($getkey as $key){
   
    $i++;
  
}
$i= $i - 1;
if($i < 0){
  $i = $i*0;
}
}
?>
<h4 class = "echoI"><?php echo $i; ?></h4>
<h4 class="defmeterh4">DEFECTIVE METERS</h4>
</div>
<div class = "defQR">

<?php
include('dbcon.php');

$reference = $database->getReference('Defective_QR');
$numchild = $database->getReference('Defective_QR')->getSnapshot()->numChildren(); 
if($numchild < 0){

}
else{
$getkey = $database->getReference('Defective_QR')->getChildKeys();
$i = 0;


foreach ($getkey as $key){
   
    $i++;
  
}
$i= $i - 1;
if($i < 0){
  $i = $i*0;
}
}
?>
<h4 class = "echoI"><?php echo $i; ?></h4>
<h4 class ="defqrtxt">DEFECTIVE QR</h4>
</div>
<div class="paid">
<?php 
include('dbcon.php');
$reference1 = $database->getReference('Members');
$numchild = $database->getReference('Members')->getSnapshot()->numChildren(); 
if($numchild < 0){

}
else{
$getkey = $database->getReference('Members')->getChildKeys();
$i = 0;


foreach ($getkey as $key){
   
    $i++;
  
}
$i= $i - 1;
$numberofpaid=0;
$numpaid = 0;
$Idchar = "SWA-";
  while($numpaid != $i){
    $numpaid = $numpaid+1;
    $newnumpaid = strval($numpaid);
    $newIdchar = $Idchar.$newnumpaid;
$referenceMember = $database->getReference('Members')->getChild($newIdchar);
$paymentstat = $referenceMember->getChild('Payment_Status')->getValue();
if($paymentstat == "Paid"){
$numberofpaid = $numberofpaid + 1;
}
}

}

?>
<h4 class = "echoI"><?php echo $numberofpaid; ?></h4>
<h4 class="numpaidtxt">NUMBER OF PAID</h4>
</div>
<div class="unpaid">
<?php 
include('dbcon.php');
$reference1 = $database->getReference('Members');
$numchild = $database->getReference('Members')->getSnapshot()->numChildren(); 
if($numchild < 0){

}
else{
$getkey = $database->getReference('Members')->getChildKeys();
$i = 0;


foreach ($getkey as $key){
   
    $i++;
  
}
$i= $i - 1;
$numberofpaid=0;
$numpaid = 0;
$Idchar = "SWA-";
  while($numpaid != $i){
    $numpaid = $numpaid+1;
    $newnumpaid = strval($numpaid);
    $newIdchar = $Idchar.$newnumpaid;
$referenceMember = $database->getReference('Members')->getChild($newIdchar);
$paymentstat = $referenceMember->getChild('Payment_Status')->getValue();
if($paymentstat == "Unpaid"){
$numberofpaid = $numberofpaid + 1;
}
}

}

?>
<h4 class = "echoI"><?php echo $numberofpaid; ?></h4>
<h4 class ="unpaidtxt">NUMBER OF UNPAID</h4>
</div>
<div class ="due">
<?php
include('dbcon.php');
$referencedue = $database->getReference('Due_Date');
$Due = $referencedue->getChild('Due')->getValue();

?>

<h5>Due Date</h5>
<h4 class="duetxt"><?php echo $Due; ?></h3>
</div>
</div>


</body>
</html>