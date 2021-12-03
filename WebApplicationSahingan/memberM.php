
<?php
include('dbcon.php');
$message='';
$messagesuccess="";
$reference = $database->getReference('Members');

$getkey = $database->getReference('Members')->getChildKeys();
$i = 0;

foreach ($getkey as $key){
   
    $i++;
  
}
$i = $i-1;

$numID = preg_replace('/[^0-9.]+/', '', $key);
$turntoIntID = (int)$numID;
$turntoIntID = $i+1;
$strID ="SWA-";
$memberID = $strID . $turntoIntID;

if(isset($_POST['add'])){
    $mID = $_POST['member_ID'];
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $Sitio = $_POST['sitio'];
   
    $Address = $_POST['address'];
    $Contact = $_POST['contacts'];
 
    
    $idM2 = $_POST['IDM2'];
    $idM2script=$_POST['IDM2script'];

    if(empty($idM2script)){
        if(empty($_POST['ID2']) ||empty($_POST['fname2']) ||empty($_POST['lname2'])||empty($_POST['sitio2']) ||
        empty($_POST['address2']) ||empty($_POST['contacts2'])){
    
           
            if(empty($_POST['member_ID']) ||empty($_POST['fname']) ||empty($_POST['lname']) ||
            empty($_POST['address']) ||empty($_POST['contacts'])){
                $message = '<label class="text-danger">Please fill up all the fields!</label>';
            }
            else if($Sitio == "---Select---"){
              
                $message = '<label class="text-danger">Please select sitio!</label>';
               
                
               } 
            else{
           
            $database->getReference("Members/" . $mID )
               ->set([
                   
                'Firstname' => $Fname,
                'Lastname' => $Lname,
                'Sitio'=> $Sitio,
                'Password' => $Contact,
                'Address' =>$Address,
                 'Contacts'=> $Contact,
                 'Previous_Reading' => "0",
                 'Current_Reading' => "0",
                 'Balance' => "0",
                 'Membership_Fee' => "500",
                 'Payment_Status' => "Unpaid",
                 'Member_Status' => "Active",
                 'Meter_Status' => "Working",
                 'Penalty' => "0",
                 
                    
                  ]);
                
                  require_once 'phpqrcode/qrlib.php'; 
                  $tempDir = 'qrcodeimages/'; 
	              $filename = $mID;
                  $codeContents = $mID;  
	              QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
                
                  $message = '<label class="text-success">Successfuly Added</label>'; 
                  $getkey = $database->getReference('Members')->getChildKeys();
                  $i = 0;
                  
                  foreach ($getkey as $key){
                     
                      $i++;
                    
                  }
                  $i = $i-1;
                  $numID = preg_replace('/[^0-9.]+/', '', $key);
                  $turntoIntID = (int)$numID;
                  $turntoIntID = strval($i);
                  $strID ="SWA-";
                  $memberID = $strID . $turntoIntID;
                }
             
        }
    }
    
    else{
        if($idM2 != $idM2script){
            $message = '<label class="text-danger">Please use the edit button!</label>';
        }
    }
    $getkey = $database->getReference('Members')->getChildKeys();
    $i = 0;
    
    foreach ($getkey as $key){
       
        $i++;
      
    }
    $i = $i-1;
    
    $numID = preg_replace('/[^0-9.]+/', '', $key);
    $turntoIntID = (int)$numID;
    $turntoIntID = $i+1;
    $strID ="SWA-";
    $memberID = $strID . $turntoIntID;
    }
   

    
if(isset($_POST['edit'])){
    $mID = $_POST['member_ID'];
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $Sitio = $_POST['sitio'];
    $Address = $_POST['address'];
    $Stat = $_POST['stat'];
    $MStat = $_POST['meterstat'];
    $Contact = $_POST['contacts'];
    $Balance = $_POST['balance'];
    $Prev = $_POST['prev'];
    $Cur = $_POST['cur'];
    $Memfee = $_POST['memfee'];
    $PayStat = $_POST['paystat'];
    $Penalty = $_POST['penalty'];

    $idM2 = $_POST['IDM2'];
    $idM2script=$_POST['IDM2script'];
    if(empty($idM2script)){
        
        $message = '<label class="text-danger">Please use the add button!</label>';
    }
   else{
  
    if(empty($_POST['ID2']) ||empty($_POST['fname2']) ||empty($_POST['lname2'])||empty($_POST['sitio2']) ||
    empty($_POST['address2']) ||empty($_POST['contacts2'])){

       
        if(empty($_POST['member_ID']) ||empty($_POST['fname']) ||empty($_POST['lname']) ||
        empty($_POST['address']) ||empty($_POST['contacts'])){
            $message = '<label class="text-danger">Please search Member_ID and click the table!</label>';
        }
        else if($Sitio == "---Select---"){
          
            $message = '<label class="text-danger">Please select sitio!</label>';
           
            
           } 
        else{
        
            
        $database->getReference("Members/" . $mID )
           ->set([
               
               'Firstname' => $Fname,
               'Lastname' => $Lname,
               'Sitio'=> $Sitio, 
               'Address' =>$Address,
               'Password' => $Contact,
                'Contacts'=> $Contact,
                'Balance' =>$Balance,
                'Previous_Reading'=> $Prev,
                'Current_Reading'=> $Cur,
                'Membership_Fee'=> $Memfee,
                'Payment_Status'=> $PayStat,
                'Penalty'=> $Penalty,
                'Member_Status'=> $Stat,
                'Meter_Status'=> $MStat,
                
                
                
              ]);
              $message = '<label class="text-success">Successfuly Edited</label>'; 
            }

    }
}
    $getkey = $database->getReference('Members')->getChildKeys();
$i = 0;

foreach ($getkey as $key){
   
    $i++;
  
}
$i = $i-1;

$numID = preg_replace('/[^0-9.]+/', '', $key);
$turntoIntID = (int)$numID;
$turntoIntID = $i+1;
$strID ="SWA-";
$memberID = $strID . $turntoIntID;
}
if(isset($_POST['delete'])){
  
    $mID = $_POST['member_ID'];
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $Sitio = $_POST['sitio'];
    $Address = $_POST['address'];
    $Stat = $_POST['stat'];
    $MStat = $_POST['meterstat'];
    $Contact = $_POST['contacts'];
    $Balance = $_POST['balance'];
    $Prev = $_POST['prev'];
    $Cur = $_POST['cur'];
    $Memfee = $_POST['memfee'];
    $PayStat = $_POST['paystat'];
    $Penalty = $_POST['penalty'];
    $idM2 = $_POST['IDM2'];
    $idM2script=$_POST['IDM2script'];

    if(empty($idM2script)){
        
            $message = '<label class="text-danger">Please use the add button!</label>';
    }

       else{
           
        
    if(empty($_POST['ID2']) ||empty($_POST['fname2']) ||empty($_POST['lname2'])||empty($_POST['sitio2']) ||
    empty($_POST['address2']) ||empty($_POST['contacts2'])){

       
        if(empty($_POST['member_ID']) ||empty($_POST['fname']) ||empty($_POST['lname']) ||
        empty($_POST['address']) ||empty($_POST['contacts'])){
            $message = '<label class="text-danger">Please search Member_ID and click the table!</label>';
        }
        else if($Sitio == "---Select---"){
          
            $message = '<label class="text-danger">Please select sitio!</label>';
           
            
           } 
        else{
        
            
        $database->getReference("Members/" . $mID )
           ->set([
               
               'Firstname' => $Fname,
               'Lastname' => $Lname,
               'Sitio'=> $Sitio, 
               'Address' =>$Address,
               'Password' => $Contact,
                'Contacts'=> $Contact,
                'Balance' =>$Balance,
                'Previous_Reading'=> $Prev,
                'Current_Reading'=> $Cur,
                'Membership_Fee'=> $Memfee,
                'Payment_Status'=> $PayStat,
                'Penalty'=> $Penalty,
                'Member_Status'=> "Inactive",
                'Meter_Status'=> $MStat,
                
                
                
              ]);
              $message = '<label class="text-success">Successfuly Deactivated!</label>'; 
            }

    }
       
}
    $getkey = $database->getReference('Members')->getChildKeys();
$i = 0;

foreach ($getkey as $key){
   
    $i++;
  
}
$i = $i-1;

$numID = preg_replace('/[^0-9.]+/', '', $key);
$turntoIntID = (int)$numID;
$turntoIntID = $i+1;
$strID ="SWA-";
$memberID = $strID . $turntoIntID;
}

?>