<?php
include('cashierM.php');
?>

<html>
<head>
   
    <title>Cashier</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="CSS/cashier.css">
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
<div class ="inputs" id="reset">
        <form action ="cashier.php" method="post">
        

        <div class="wrapsearchtxt">
             <input type = "text" name="searchIDtxt" class="searchtxt" placeholder="Member_ID">
             
            <input type = "submit" name="searchbtn" class="searchbtn" value="Search">
            </div>
           
            <div class="wrapf">
             Name: <br>  <input type = "text" name="fullname" id="fullname" class="searchTerm" readonly>
             <input type = "hidden" name="fname" id="fname" class="searchTerm">
             <input type = "hidden" name="lname" id="lname" class="searchTerm">
             <input type = "hidden" name = "consumer_ID" id="consumer_ID">
            <input type = "hidden" name = "address" id="address">
            <input type = "hidden" name = "contacts" id="contacts">
            <input type = "hidden" name = "balance" id="balance">
            <input type = "hidden" name = "sitio" id="sitio">
            
            
            
            </div>
            
            <div class="wrapprev">
            Previous_Reading:  <br> <input type = "text" name="prev_reading" id="prev_reading" class="searchTerm" readonly>
             <br>
             </div>

             <div class="wrapcurr">
            Current_Reading: <br>  <input type = "text" name="curr_reading" id="curr_reading" class="searchTerm" readonly>
             <br>
             
             </div>
             <div class="wrapcash">
         <input type = "text" name="cash" id="cash" onkeyup="numbersOnly(this)" oninput="myFunction()"  class="searchTermTC" >
             <br>
             <script>
function numbersOnly(input) {
    var regex = /[^0-9]/gi;
    input.value = input.value.replace(regex, "");
}

</script>
            
             </div>
             <div class="wrapPay">
          <input type = "submit" name="pay" id="pay" class="pay" value="NEXT TRANSACTION">
             <br>
            
             </div>
             <br>
           <div class="wraperror">
        <?php echo $message; ?>
        </div>
           
            <div class="wrapmemberfee">
             Membership Fee: <br>  <input type = "text" name="mfee" id="mfee" class="searchTerm"readonly>
            </div>
            <div class="wrappenalty">
             Penalty: <br>  <input type = "text" name="penalty" id="penalty" class="searchTerm" readonly>
            </div>
            <div class="ltotal">
            <label class="tl">TOTAL: </label>
            </div>
            <div class="wraptotal">
           <input type = "text" name="total" id="total" class="searchTermTC" readonly>
             <br>
             </div>
             <div class="lcash">
            <label class="cashl">CASH: </label>
            </div>
             <div class="lchange">
            <label class="cl">CHANGE: </label>
            </div>
             <div class="wrapchange">
           <input type = "text" name="change" id="change" class="searchTermChange"readonly>
             <br>
             </div>
          
                <br>
                <br>
              
   
    
 
   
  
</div>
           

            
        </form>
</div>
       
      
<div class="wraptable">
        
 
   <div class="table-responsive">
   <table class="content-table" id = "table" >
   <thead>
     <tr >
     
        <th>ID</th>
      <th>Name</th>
      <th>Payment_Status</th>
      <th>Status</th>
     </tr>
     <thead>
     <?php
     $space=" ";
     if(isset($_POST['searchbtn'])){
      $reference1 = $database->getReference('Members');
      $count=0;
      $forexist = 0;
      $Search_ID = $_POST['searchIDtxt'];
      if(empty($Search_ID)){
         ?>
       
         <?php
         echo "Input Member_ID!";
      }
      else{
      foreach ($getkey as $key){
  
         $count++;
      
      if($Search_ID == $key){
         $forexist = $forexist+1;
         $newkey = $key;
         } 
        
     }
    
     if($forexist == 1){
     
$referenceMember = $database->getReference('Members')->getChild($newkey);
$firstnameT = $referenceMember->getChild('Firstname')->getValue();
$lastnameT = $referenceMember->getChild('Lastname')->getValue();
$addressT = $referenceMember->getChild('Address')->getValue();
$contactsT = $referenceMember->getChild('Contacts')->getValue();
$balanceT = $referenceMember->getChild('Balance')->getValue();
$sitioT = $referenceMember->getChild('Sitio')->getValue();
$payment_stat = $referenceMember->getChild('Payment_Status')->getValue();
$statusT = $referenceMember->getChild('Member_Status')->getValue();
$prev_reading = $referenceMember->getChild('Previous_Reading')->getValue();
$curr_reading = $referenceMember->getChild('Current_Reading')->getValue();
$member_fee = $referenceMember->getChild('Membership_Fee')->getValue();
$penalty = $referenceMember->getChild('Penalty')->getValue();




$numcur = intval($balanceT);
$nummemfee = intval($member_fee);
$numpenalty = intval($penalty);
$pinaktotal = $numcur + $nummemfee;
$pinaktotal = $pinaktotal + $numpenalty;      
         ?>
         <tr>
         <td><?php echo $newkey; ?></td>
         <td><?php echo $lastnameT, $firstnameT; ?></td>
         <td><?php echo $payment_stat; ?></td>
         <td><?php echo $statusT; ?></td>
         <td style="display:none;"><?php echo $firstnameT; ?> </td>
         <td style="display:none;"><?php echo $lastnameT; ?> </td>
         <td style="display:none;"><?php echo $addressT; ?> </td>
         <td style="display:none;"><?php echo $contactsT; ?> </td>
         <td style="display:none;"><?php echo $balanceT; ?> </td>
         <td style="display:none;"><?php echo $sitioT; ?> </td>
         <td style="display:none;"><?php echo $prev_reading; ?> </td>
         <td style="display:none;"><?php echo $curr_reading; ?> </td>
         <td style="display:none;"><?php echo $member_fee; ?> </td>
         <td style="display:none;"><?php echo $penalty; ?> </td>
         <td style="display:none;"><?php echo $pinaktotal; ?> </td>
         <td style="display:none;"><?php echo $meter_stat; ?> </td>
        
         </tr>
         <script>
    var table = document.getElementById('table');
    for(var i = 1; i < table.rows.length; i++)
    {
        table.rows[i].onclick = function()
        {
         
         document.getElementById("consumer_ID").value = this.cells[0].innerHTML;
            document.getElementById("fullname").value = this.cells[1].innerHTML;
            document.getElementById("fname").value = this.cells[4].innerHTML;
            document.getElementById("lname").value = this.cells[5].innerHTML;
            document.getElementById("address").value = this.cells[6].innerHTML;
            document.getElementById("contacts").value = this.cells[7].innerHTML;
            document.getElementById("balance").value = this.cells[8].innerHTML;
            document.getElementById("sitio").value = this.cells[9].innerHTML;
            document.getElementById("prev_reading").value = this.cells[10].innerHTML;
            document.getElementById("curr_reading").value = this.cells[11].innerHTML;
            document.getElementById("mfee").value = this.cells[12].innerHTML;
            document.getElementById("penalty").value = this.cells[13].innerHTML;
        
            var bal = document.getElementById("balance").value;
           
            document.getElementById("total").value = this.cells[14].innerHTML;
            document.getElementById("pass").value = this.cells[16].innerHTML;
           
        };
 
    }
   
    </script>
         <?php
         

     }else{
        echo "Member_ID doesn't exist!";
     }
   }
}


?>


    </table>
    <script>
function myFunction() {
  var cash = document.getElementById("cash").value;
  var total = document.getElementById("total").value;

  var parseCash = parseInt(cash);
  var parseTotal = parseInt(total);
  var change = parseCash - parseTotal

  document.getElementById("change").value = change;
}
      </script>
   
   </div>
 
   </div>
    </div>
    </div>

</body> 


</html>
