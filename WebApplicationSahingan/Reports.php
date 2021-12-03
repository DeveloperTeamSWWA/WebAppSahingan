
<html>
<head>
   
    <title>Reports</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="CSS/reports.css">
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

<div class="defQlist">
<input type = "submit" name="showdefQ" class="btn3" onclick="openFormDefQR()" value="Defective QR List">
</div> 
<div class="defMlist">
<input type = "submit" name="showdefQ" class="btn3" onclick="openFormDefMeter()" value="Defective Meter List">
</div>

<div class="memberlist">
   <input type = "submit" name="showMemList" class="btn3" onclick="openForm()" value="Member List">
   
</div>

<div class="paidlist">
   <input type = "submit" name="showPList"onclick="openFormPaid()"class="btn3" value="Paid">
   
</div>


<div class="notpaidlist">
   <input type = "submit" name="showPList" onclick="openFormUnpaid()" class="btn3" value="Unpaid">

   
</div>

<div class="disconnectedlist">
   <input type = "submit" name="showPList" onclick="openFormDisconnected()" class="btn3" value="Disconnected">
   
</div>
     
            

<div class="form-popup" id="memlistform">
  <form action="Reports.php"class="form-container">
    <h1>Member List</h1>
    <div class="wraptable" style="overflow-x: auto;">
        
   <table class="content-table" id="memlisttable" >
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
     include('dbcon.php');
      $reference1 = $database->getReference('Members');
      $getkey = $database->getReference('Members')->getChildKeys();
      $count=0;
      $forexist = 0;
    
      foreach ($getkey as $key){
  
         $count++;
      
      }
        $count = $count - 1;
        $num = 0;
       
  while($num != $count){   
    $num = $num+1;
    $strnum = strval($num);
    $strid = "SWA-";
    $MemberId = $strid.$strnum;
$referenceMember = $database->getReference('Members')->getChild($MemberId);
$firstnameT = $referenceMember->getChild('Firstname')->getValue();
$lastnameT = $referenceMember->getChild('Lastname')->getValue();
$sitioT = $referenceMember->getChild('Sitio')->getValue();
$addressT = $referenceMember->getChild('Address')->getValue();
$contactsT = $referenceMember->getChild('Contacts')->getValue();
$statusT = $referenceMember->getChild('Member_Status')->getValue();

      
      
         ?>
         <tr>
         <td><?php echo $MemberId; ?></td>
         <td><?php echo $firstnameT; ?></td>
         <td><?php echo $lastnameT; ?></td>
         <td><?php echo $sitioT; ?></td>
         <td><?php echo $addressT; ?></td>
         <td><?php echo $contactsT; ?></td>
         <td><?php echo $statusT; ?></td>
       
   
         </tr>
        

   <?php
   
  }

?>

       
    </table>
    </div>

    <button type="submit" class="btn" id="exportMemlist">Print</button>
    <br>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>

  </form>

</div>
<div class="form-popup" id="disconlistform">
  <form action="Reports.php" class="form-container">
    <h1>Disconnected List</h1>
    <div class="wraptable" style="overflow-x: auto;">
        
   <table class="content-table" id = "disconlisttable" >
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
     include('dbcon.php');
      $reference1 = $database->getReference('Members');
      $getkey = $database->getReference('Members')->getChildKeys();
      $count=0;
      $forexist = 0;
    
      foreach ($getkey as $key){
  
         $count++;
      
      }
        $count = $count - 1;
        $num = 0;
       
        while($num != $count){   
          $num = $num+1;
          $strnum = strval($num);
          $strid = "SWA-";
          $MemberId = $strid.$strnum;
$referenceMember = $database->getReference('Members')->getChild($MemberId);
$statusT = $referenceMember->getChild('Member_Status')->getValue();
if($statusT == "Inactive"){
$unNum = strval($num);
$DisconMemberId = $strid.$unNum;
$referenceMember = $database->getReference('Members')->getChild($DisconMemberId);
$firstnameT = $referenceMember->getChild('Firstname')->getValue();
$lastnameT = $referenceMember->getChild('Lastname')->getValue();
$sitioT = $referenceMember->getChild('Sitio')->getValue();
$addressT = $referenceMember->getChild('Address')->getValue();
$contactsT = $referenceMember->getChild('Contacts')->getValue();
$statusT = $referenceMember->getChild('Member_Status')->getValue();

      
      
         ?>
         <tr>
         <td><?php echo $MemberId; ?></td>
         <td><?php echo $firstnameT; ?></td>
         <td><?php echo $lastnameT; ?></td>

         <td><?php echo $sitioT; ?></td>
         <td><?php echo $addressT; ?></td>
         <td><?php echo $contactsT; ?></td>
         <td><?php echo $statusT; ?></td>
       
   
         </tr>
        

   <?php
}
  }

?>

       
    </table>
    </div>

    <button type="submit" class="btn" id="exportDisconlist">Print</button>
    <button type="button" class="btn cancel" onclick="closeFormDisconnected()">Close</button>
  </form>
</div>

<div class="form-popup" id="paidlistform">
  <form action="Reports.php" class="form-container">
    <h1>Paid List</h1>
    <div class="wraptable" style="overflow-x: auto;">
        
   <table class="content-table" id = "paidlisttable" >
   <thead>
     <tr >
     
        <th>ID</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Sitio</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Payment Status</th>
      <th>Status</th>
     </tr>
     <thead>
     <?php
     include('dbcon.php');
      $reference1 = $database->getReference('Members');
      $getkey = $database->getReference('Members')->getChildKeys();
      $count=0;
      $forexist = 0;
    
      foreach ($getkey as $key){
  
         $count++;
      
      }
        $count = $count - 1;
        $num = 0;
       
  while($num != $count){   
    $num = $num+1;
    $strnum = strval($num);
    $strid = "SWA-";
    $MemberId = $strid.$strnum;
$referenceMember = $database->getReference('Members')->getChild($MemberId);
$payment_stat = $referenceMember->getChild('Payment_Status')->getValue();
if($payment_stat == "Paid"){
  $unNum = strval($num);
$paidMemberId = $strid.$unNum;
$referenceMemberPaid = $database->getReference('Members')->getChild($paidMemberId);
$firstnameT = $referenceMemberPaid->getChild('Firstname')->getValue();
$lastnameT = $referenceMemberPaid->getChild('Lastname')->getValue();

$sitioT = $referenceMemberPaid->getChild('Sitio')->getValue();
$addressT = $referenceMemberPaid->getChild('Address')->getValue();
$contactsT = $referenceMemberPaid->getChild('Contacts')->getValue();

$statusT = $referenceMemberPaid->getChild('Member_Status')->getValue();

$payment_stat = $referenceMemberPaid->getChild('Payment_Status')->getValue();

      
      
         ?>
         <tr>
         <td><?php echo $paidMemberId; ?></td>
         <td><?php echo $firstnameT; ?></td>
         <td><?php echo $lastnameT; ?></td>

         <td><?php echo $sitioT; ?></td>
         <td><?php echo $addressT; ?></td>
         <td><?php echo $contactsT; ?></td>
         <td><?php echo $payment_stat; ?></td>
         <td><?php echo $statusT; ?></td>
       
        
    
         </tr>
        
  
   <?php
}
}

?>

       
    </table>
    </div>

    <button type="submit" class="btn" id="exportPaidlist">Print</button>
    <button type="button" class="btn cancel" onclick="closeFormPaid()">Close</button>
  </form>
</div>

<div class="form-popup" id="unpaidlistform">
  <form action="Reports.php" class="form-container">
    <h1>Unpaid List</h1>
    <div class="wraptable" style="overflow-x: auto;">
        
   <table class="content-table" id = "unpaidlisttable" >
   <thead>
     <tr >
     
        <th>ID</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Sitio</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Payment Status</th>
      <th>Status</th>
     </tr>
     <thead>
     <?php
     include('dbcon.php');
      $reference1 = $database->getReference('Members');
      $getkey = $database->getReference('Members')->getChildKeys();
      $count=0;
      $forexist = 0;
    
      foreach ($getkey as $key){
  
         $count++;
      
      }
        $count = $count - 1;
        $num = 0;
       
  while($num != $count){   
    $num = $num+1;
    $strnum = strval($num);
    $strid = "SWA-";
    $MemberId = $strid.$strnum;
$referenceMember = $database->getReference('Members')->getChild($MemberId);
$payment_stat = $referenceMember->getChild('Payment_Status')->getValue();
if($payment_stat == "Unpaid"){
$unNum = strval($num);
$UnpaidMemberId = $strid.$unNum;
$referenceMemberUnpaid = $database->getReference('Members')->getChild($UnpaidMemberId);
$firstnameT = $referenceMemberUnpaid ->getChild('Firstname')->getValue();
$lastnameT = $referenceMemberUnpaid ->getChild('Lastname')->getValue();
$emailT = $referenceMemberUnpaid ->getChild('Email')->getValue();
$sitioT = $referenceMemberUnpaid ->getChild('Sitio')->getValue();
$addressT = $referenceMemberUnpaid ->getChild('Address')->getValue();
$contactsT = $referenceMemberUnpaid ->getChild('Contacts')->getValue();

$statusT = $referenceMemberUnpaid ->getChild('Member_Status')->getValue();

$payment_stat = $referenceMemberUnpaid ->getChild('Payment_Status')->getValue();

      
      
         ?>
         <tr>
         <td><?php echo $UnpaidMemberId; ?></td>
         <td><?php echo $firstnameT; ?></td>
         <td><?php echo $lastnameT; ?></td>

         <td><?php echo $sitioT; ?></td>
         <td><?php echo $addressT; ?></td>
         <td><?php echo $contactsT; ?></td>
         <td><?php echo $payment_stat; ?></td>
         <td><?php echo $statusT; ?></td>
       
        
         </tr>
        
  
   <?php
}
}

?>

       
    </table>
    </div>

    <button type="submit" class="btn" id="exportUnpaidlist">Print</button>
    <button type="button" class="btn cancel" onclick="closeFormUnpaid()">Close</button>
  </form>
</div>


<div class="form-popup" id="defMeterlistform">
  <form action="Reports.php" class="form-container">
    <h1>Defective Meter List</h1>
    <div class="wraptable" style="overflow-x: auto;">
        
   <table class="content-table" id = "defmeterlisttable" >
   <thead>
     <tr >
     
        <th>ID</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Sitio</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Meter Status</th>
      <th>Payment Status</th>
      <th>Status</th>
     </tr>
     <thead>
     <?php
     include('dbcon.php');
      $reference1 = $database->getReference('Defective_Meter');
      $getkey = $database->getReference('Defective_Meter')->getChildKeys();
      $count=0;
      $forexist = 0;
    
      foreach ($getkey as $key){
  
        $count++;
        $count = $count - 1;
        $num = 0;
       
 if($key == "Default"){

 }else{
  $defM = $reference1->getChild($key)->getValue();
$referenceMember = $database->getReference('Members')->getChild($defM);
$meterstat = $referenceMember->getChild('Meter_Status')->getValue();
if($meterstat == "Defective"){


$firstnameT = $referenceMember->getChild('Firstname')->getValue();
$lastnameT = $referenceMember->getChild('Lastname')->getValue();
$emailT = $referenceMember->getChild('Email')->getValue();
$sitioT = $referenceMember->getChild('Sitio')->getValue();
$addressT = $referenceMember->getChild('Address')->getValue();
$contactsT = $referenceMember->getChild('Contacts')->getValue();

$statusT = $referenceMemberUnpaid ->getChild('Member_Status')->getValue();

$payment_stat = $referenceMemberUnpaid ->getChild('Payment_Status')->getValue();

      
      
         ?>
         <tr>
         <td><?php echo $key; ?></td>
         <td><?php echo $firstnameT; ?></td>
         <td><?php echo $lastnameT; ?></td>
         <td><?php echo $sitioT; ?></td>
         <td><?php echo $addressT; ?></td>
         <td><?php echo $contactsT; ?></td>
         <td><?php echo $meterstat; ?></td>
         <td><?php echo $payment_stat; ?></td>
         <td><?php echo $statusT; ?></td>
       
        
         </tr>
        
  
   <?php
}
}
}
?>

       
    </table>
    </div>

    <button type="submit" class="btn" id="exportDefMlist">Print</button>
    <button type="button" class="btn cancel" onclick="closeFormDefMeter()">Close</button>
  </form>
</div>


<div class="form-popup" id="defQRlistform">
  <form action="Reports.php" class="form-container">
    <h1>Defective QR List</h1>
    <div class="wraptable" style="overflow-x: auto;">
        
   <table class="content-table" id = "defqrlisttable" >
   <thead>
     <tr >
     
        <th>ID</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Sitio</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Meter Status</th>
      <th>Payment Status</th>
      <th>Status</th>
     </tr>
     <thead>
     <?php
     include('dbcon.php');
      $reference1 = $database->getReference('Defective_QR');
      $getkey = $database->getReference('Defective_QR')->getChildKeys();
      $count=0;
      $forexist = 0;
    
      foreach ($getkey as $key){
  
        $count++;
        $count = $count - 1;
        $num = 0;
       
        if($key == "Default"){

        }else{
          $defQ = $reference1->getChild($key)->getValue();
          $referenceMember = $database->getReference('Members')->getChild($defQ);

$meterstat = $referenceMember->getChild('Meter_Status')->getValue();

$firstnameT = $referenceMember->getChild('Firstname')->getValue();
$lastnameT = $referenceMember->getChild('Lastname')->getValue();
$emailT = $referenceMember->getChild('Email')->getValue();
$sitioT = $referenceMember->getChild('Sitio')->getValue();
$addressT = $referenceMember->getChild('Address')->getValue();
$contactsT = $referenceMember->getChild('Contacts')->getValue();

$statusT = $referenceMemberUnpaid ->getChild('Member_Status')->getValue();

$payment_stat = $referenceMemberUnpaid ->getChild('Payment_Status')->getValue();

      
      
         ?>
         <tr>
         <td><?php echo $key; ?></td>
         <td><?php echo $firstnameT; ?></td>
         <td><?php echo $lastnameT; ?></td>
         <td><?php echo $sitioT; ?></td>
         <td><?php echo $addressT; ?></td>
         <td><?php echo $contactsT; ?></td>
         <td><?php echo $meterstat; ?></td>
         <td><?php echo $payment_stat; ?></td>
         <td><?php echo $statusT; ?></td>
       
        
         </tr>
        
  
   <?php
}
}

?>

       
    </table>
    </div>

    <button type="submit" class="btn" id="exportDefQRlist">Print</button>
  
    <button type="button" class="btn cancel" onclick="closeFormDefQR()">Close</button>
  </form>
</div>








</div>
<script>
function openForm() {
  document.getElementById("memlistform").style.display = "block";

}

function closeForm() {
  document.getElementById("memlistform").style.display = "none";
 
}
function openFormPaid() {
 
 document.getElementById("paidlistform").style.display = "block";
}

function closeFormPaid() {
 
 document.getElementById("paidlistform").style.display = "none";
}
function openFormDisconnected() {
 
 document.getElementById("disconlistform").style.display = "block";
}

function closeFormDisconnected() {
 
 document.getElementById("disconlistform").style.display = "none";
}
function openFormDefMeter() {
 
 document.getElementById("defMeterlistform").style.display = "block";
}


function closeFormDefMeter() {
 
 document.getElementById("defMeterlistform").style.display = "none";
}
function openFormDefQR() {
 
 document.getElementById("defQRlistform").style.display = "block";
}

function closeFormDefQR() {
 
 document.getElementById("defQRlistform").style.display = "none";
}

function openFormUnpaid() {
 
  document.getElementById("unpaidlistform").style.display = "block";
}

function closeFormUnpaid() {
  
  document.getElementById("unpaidlistform").style.display = "none";
}
</script>
</body>
</html>



<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script>
var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
  function html_table_to_excel(type)
    {
        var data = document.getElementById('memlisttable');

        var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

        XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

        XLSX.writeFile(file, 'MemberList-'+date+'.' + type);
    }

    function html_table_to_exceldiscon(type)
    {
        var data = document.getElementById('disconlisttable');

        var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

        XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

        XLSX.writeFile(file, 'DisconnectedList-'+date+'.' + type);
    }
    function html_table_to_excelunpaid(type)
    {
        var data = document.getElementById('unpaidlisttable');

        var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

        XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

        XLSX.writeFile(file, 'UnpaidList-'+date+'.' + type);
    }
    function html_table_to_excelpaid(type)
    {
        var data = document.getElementById('paidlisttable');

        var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

        XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

        XLSX.writeFile(file, 'PaidList-'+date+'.' + type);
    }
    function html_table_to_exceldefM(type)
    {
        var data = document.getElementById('defmeterlisttable');

        var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

        XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

        XLSX.writeFile(file, 'DefectiveMeterList-'+date+'.' + type);
    }
    function html_table_to_exceldefQR(type)
    {
        var data = document.getElementById('defqrlisttable');

        var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

        XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

        XLSX.writeFile(file, 'DefectiveQRList-'+date+'.' + type);
    }


    const export_button = document.getElementById('exportMemlist');
    const export_button1 = document.getElementById('exportDisconlist');
    const export_button2 = document.getElementById('exportUnpaidlist');
    const export_button3 = document.getElementById('exportPaidlist');
    const export_button4 = document.getElementById('exportDefMlist');
    const export_button5 = document.getElementById('exportDefQRlist');
    export_button.addEventListener('click', () =>  {
        html_table_to_excel('xlsx');
        
    });
    export_button1.addEventListener('click', () =>  {
      
        html_table_to_exceldiscon('xlsx');
    });
    export_button2.addEventListener('click', () =>  {
      
      html_table_to_excelunpaid('xlsx');
  });
  export_button3.addEventListener('click', () =>  {
      
      html_table_to_excelpaid('xlsx');
  });
  export_button4.addEventListener('click', () =>  {
      
      html_table_to_exceldefM('xlsx');
  });
  export_button5.addEventListener('click', () =>  {
      
      html_table_to_exceldefQR('xlsx');
  });
  
  
</script>

