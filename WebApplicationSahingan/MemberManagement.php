
<?php
include('memberM.php');
?>
<html>
<head>
   
    <title>Member Management</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="CSS/addstyle.css">
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

</div>
<div class ="inputs">
   <div class="wrapback">
           <a href ="AccountManagement.php">
           <button class="backbtn" ><b>BACK</button><br>
           </a>
   </div>
        <form action ="MemberManagement.php" method="post">
        <input type = "hidden" name="IDM2" id = "IDM2" value="<?php echo $memberID ?>">
           <input type = "hidden" name = "IDM2script" id= "IDM2script">
           <input type = "hidden" name = "balance" id= "balance">
           <input type = "hidden" name = "prev" id= "prev">
           <input type = "hidden" name = "cur" id= "cur">
           <input type = "hidden" name = "memfee" id= "memfee">
           <input type = "hidden" name = "meterstat" id= "meterstat">
           <input type = "hidden" name = "paystat" id= "paystat">
           <input type = "hidden" name = "penalty" id= "penalty">
           <input type = "hidden" name = "stat" id= "stat">
        <div class="wrapsearchtxt">
             <input type = "text" name="searchIDtxt" class="searchtxt" placeholder="Member_ID">
             
            <input type = "submit" name="searchbtn" class="searchbtn" value="Search">
            </div>

           
          
                <br>
                <br>
                <div class="wrapc">
            <input type = "text" name="member_ID" class="searchTerm" id="consumer_id" value="<?php echo $memberID ?>" readonly>
             </div>
             <br>
             <div class="wrapf">
            <input type = "text" name="fname" id="fname" class="searchTerm" placeholder="Firstname">
            </div>
             <br>
             <div class="wrapl">
            <input type = "text" name="lname" id="lname" class="searchTerm" placeholder="Lastname">
             <br>
             </div>
             <div class="wraps">
            <select id="sitio" onchange="" class="searchTerm" name="sitio">
                        <option value="---Select---">---Select---</option>
                        <option name="sitio" value="Sitio1">Sitio 1</option>
                        <option  name="sitio" value="Sitio2">Sitio 2</option>
                        <option  name="sitio" value="Sitio3">Sitio 3</option>
                        <option  name="sitio" value="Banaba East">Banaba East</option>
                        </select>
            <br>
            </div>
            <div class="wrapadd">
            <input type = "text" name="address" id="address" class="searchTerm" placeholder="Address">
            </div>
               <br>
           
        <div class="wrapcontact">
           <input type = "text" name="contacts" maxlength="11" onkeyup="numbersOnly(this)" oninput="myFunction()" id="contacts" class="searchTerm" placeholder="Contact">
            </div>
            <div class="wrapu">
            <input type = "text" name="user" id="user" class="searchTerm" placeholder="Username" readonly>
            </div>
            <div class="wrapp">
            <input type = "text" name="pass" id="pass" class="searchTerm" placeholder="Password" readonly>
            </div>
            
            <script>
function numbersOnly(input) {
    var regex = /[^0-9]/gi;
    input.value = input.value.replace(regex, "");
}
</script>
<script>
function myFunction() {
   var user = document.getElementById("consumer_id").value;
  var pass = document.getElementById("contacts").value;

  document.getElementById("user").value = user;
  document.getElementById("pass").value = pass;
}
      </script>
    <br>
    <div class="wrapqr">
    
    <div class="qrframe" style="border:2px solid black; width:50px; height:50px;">
		<?php echo '<img src="qrcodeimages/'. @$filename.'.png" style="width:45px; height:45px;"><br>'; ?>
		</div>
 <a class="btn btn-primary submitBtn" style="width:180px; margin:5px 0;" href="download.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
  
</div>
   <div class="wrapinsert">
   <input type = "submit" name="add" class="insertbtn" value="ADD">
</div>  
<div class="wrapedit">
   <input type = "submit" name="edit" class="editbtn" value="EDIT">
</div>
<div class="wrapdelete">
   <input type = "submit" name="delete" class="deletebtn" value="DEACTIVATE">
   
  
</div>
           <br>
           <div class="wraperror">
        <h4><?php echo $message; ?></h4>
        </div>
            
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
      <th>Address</th>
      <th>Contact</th>
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
         <td><?php echo $addressT; ?></td>
         <td><?php echo $contactsT; ?></td>
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
