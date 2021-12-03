<?php
include('dbcon.php');
?>
<html>
<head>
   
    <title>Member Info</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="CSS/memberinfo.css">
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
<div class ="inputs">
        <form action ="MemberInfo.php" method="post">
       
           
          
        <div class="wrapsearchtxt">
        <input type = "text" name="searchIDtxt" class="searchtxt" placeholder="Member_ID">
             
             <input type = "submit" name="searchbtn" class="searchbtn" value="Search">
             </div>
            
          
                <br>
                <br>
            

          
      
        </form>
        

          
      
        <div class="wraptable">
        

        <div class="table-responsive">
        <table class="content-table" id = "table" >
        <thead>
          <tr >
          
             <th>ID</th>
           <th>Firstname</th>
           <th>Lastname</th>
           <th>Sitio</th>
           <th>Contact</th>
           <th>Payment_Status</th>
           <th>Meter_Status</th>
           <th>Status</th>
          </tr>
          <thead>
          <?php
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
            $getkey = $database->getReference('Members')->getChildKeys();
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
     $emailT = $referenceMember->getChild('Email')->getValue();
     $sitioT = $referenceMember->getChild('Sitio')->getValue();
     $addressT = $referenceMember->getChild('Address')->getValue();
     $contactsT = $referenceMember->getChild('Contacts')->getValue();
     $balanceT = $referenceMember->getChild('Balance')->getValue();
     $statusT = $referenceMember->getChild('Member_Status')->getValue();
     $meterstatT = $referenceMember->getChild('Meter_Status')->getValue();
     $payment_stat = $referenceMember->getChild('Payment_Status')->getValue();
     $prev_reading = $referenceMember->getChild('Previous_Reading')->getValue();
     $curr_reading = $referenceMember->getChild('Current_Reading')->getValue();
     $member_fee = $referenceMember->getChild('Membership_Fee')->getValue();
     $penalty = $referenceMember->getChild('Penalty')->getValue();
           
           
              ?>
              <tr>
              <td><?php echo $newkey; ?></td>
              <td><?php echo $firstnameT; ?></td>
              <td><?php echo $lastnameT; ?></td>
     
              <td><?php echo $sitioT; ?></td>
              
              <td><?php echo $contactsT; ?></td> 
              <td><?php echo $payment_stat; ?></td>
              <td><?php echo $meterstatT; ?></td>
              <td><?php echo $statusT; ?></td>
            
              <td style="display:none;"><?php echo $balanceT; ?> </td>
              <td style="display:none;"><?php echo $prev_reading; ?> </td>
              <td style="display:none;"><?php echo $curr_reading; ?> </td>
              <td style="display:none;"><?php echo $member_fee; ?> </td>
              <td style="display:none;"><?php echo $payment_stat; ?></td>
              <td style="display:none;"><?php echo $penalty; ?> </td>
              <td style="display:none;"><?php echo $meterstatT; ?></td>
              </tr>
              <script>
         var table = document.getElementById('table');
         for(var i = 1; i < table.rows.length; i++)
         {
             table.rows[i].onclick = function()
             {
                 document.getElementById("consumer_id").value = this.cells[0].innerHTML;
                 document.getElementById("fname").value = this.cells[1].innerHTML;
                 document.getElementById("lname").value = this.cells[2].innerHTML;
                 document.getElementById("sitio").value = this.cells[3].innerHTML;
                 document.getElementById("address").value = this.cells[4].innerHTML;
                 document.getElementById("contacts").value = this.cells[5].innerHTML;
                 document.getElementById("stat").value = this.cells[6].innerHTML;
                 document.getElementById("IDM2script").value = this.cells[0].innerHTML;
                 
                 document.getElementById("balance").value = this.cells[7].innerHTML;
                 document.getElementById("prev").value = this.cells[8].innerHTML;
                 document.getElementById("cur").value = this.cells[9].innerHTML;
                 document.getElementById("memfee").value = this.cells[10].innerHTML;
                 
                 document.getElementById("paystat").value = this.cells[11].innerHTML;
                 document.getElementById("penalty").value = this.cells[12].innerHTML;
                 document.getElementById("meterstat").value = this.cells[13].innerHTML;
     
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
        
        </div>
      
        </div>
         </div>
         </div>
     


</body>
</html>