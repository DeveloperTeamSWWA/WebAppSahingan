
<?php
include('dbcon.php');
$message='';
$reference = $database->getReference('Users');

$getkey = $database->getReference('Users')->getChildKeys();
$i = 0;

foreach ($getkey as $key){
   
    $i++;
  
}
$i = $i-1;

$numID = preg_replace('/[^0-9.]+/', '', $key);
$turntoIntID = (int)$numID;
$turntoIntID = $i+1;
$strID ="SWAU-";
$memberID = $strID . $turntoIntID;



if(isset($_POST['add'])){
    $uID = $_POST['user_ID'];
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $as = $_POST['as'];
    $User = $_POST['user'];
    $Pass = $_POST['pass'];
    $Contact = $_POST['contacts'];
 
    
    $idM2 = $_POST['IDM2'];
    $idM2script=$_POST['IDM2script'];

    if(empty($idM2script)){
        if(empty($_POST['ID2']) ||empty($_POST['fname2']) ||empty($_POST['lname2'])||empty($_POST['sitio2']) ||
        empty($_POST['address2']) ||empty($_POST['contacts2'])){
    
           
            if(empty($_POST['user_ID']) ||empty($_POST['fname']) ||empty($_POST['lname']) ||empty($_POST['contacts'])){
                $message = '<label class="text-danger">Please fill up all the fields!</label>';
            }
            else if($as == "---Select---"){
              
                $message = '<label class="text-danger">Please select position</label>';
               
                
               } 
            else{
            
                
            $database->getReference("Users/" . $uID )
               ->set([
                   
                'Firstname' => $Fname,
                'Lastname' => $Lname,
                'Username' => $User,
                'Password' => $Pass,
                'as'=> $as, 
        
                 'Contacts'=> $Contact,
                
                 
                    
                  ]);
                  $message = '<label class="text-success">Successfuly Added</label>'; 
                }
    
        }
    }
    else{
        if($idM2 != $idM2script){
            $message = '<label class="text-danger">Please use the edit button!</label>';
        }
    }
    $reference = $database->getReference('Users');

    $getkey = $database->getReference('Users')->getChildKeys();
    $i = 0;
    
    foreach ($getkey as $key){
       
        $i++;
      
    }
    $i = $i-1;
    
    $numID = preg_replace('/[^0-9.]+/', '', $key);
    $turntoIntID = (int)$numID;
    $turntoIntID = $i+1;
    $strID ="SWAU-";
    $memberID = $strID . $turntoIntID;
    }

    
if(isset($_POST['edit'])){
    $uID = $_POST['user_ID'];
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $as = $_POST['as'];
    $Contact = $_POST['contacts'];
    $User = $_POST['user'];
    $Pass = $_POST['pass'];

    if(empty($_POST['ID2']) ||empty($_POST['fname2']) ||empty($_POST['lname2'])||empty($_POST['sitio2']) ||
    empty($_POST['address2']) ||empty($_POST['contacts2'])){

       
        if(empty($_POST['user_ID']) ||empty($_POST['fname']) ||empty($_POST['lname']) ||empty($_POST['contacts'])){
            $message = '<label class="text-danger">Please search User_ID and click the table!</label>';
        }
        else if($as == "---Select---"){
          
            $message = '<label class="text-danger">Please select position</label>';
           
            
           } 
        else{
        
            
        $database->getReference("Users/" . $uID )
           ->set([
               
               'Firstname' => $Fname,
               'Lastname' => $Lname,
               'Username' => $User,
                'Password' => $Pass,
               'as'=> $as, 
                'Contacts'=> $Contact,
                
                
                
                
              ]);
              $message = '<label class="text-success">Successfuly Edited</label>'; 
            }

    }
    $reference = $database->getReference('Users');

$getkey = $database->getReference('Users')->getChildKeys();
$i = 0;

foreach ($getkey as $key){
   
    $i++;
  
}
$i = $i-1;

$numID = preg_replace('/[^0-9.]+/', '', $key);
$turntoIntID = (int)$numID;
$turntoIntID = $i+1;
$strID ="SWAU-";
$memberID = $strID . $turntoIntID;
}
if(isset($_POST['delete'])){
    $idM2script2 = $_POST['IDM2script'];
    if(empty($idM2script2)){
        $message = '<label class="text-danger">Please search User_ID and click the table!</label>';
      
     
    }
    else{
        
        $referenceMemberToDelete = $database->getReference('Users')->getChild($idM2script2);

        $referenceMemberToDelete->remove();
        $newgetkey = $database->getReference('Users')->getChildKeys();
    $newi = 0;
    
    foreach ($newgetkey as $newkey){
       
        $i++;
      
    }
    
    $newnumID = preg_replace('/[^0-9.]+/', '', $newkey);
    $newturntoIntID = (int)$newnumID;
    $newturntoIntID = $newturntoIntID+1;
    $newstrID ="SWAU-";
    $newmemberID = $newstrID . $newturntoIntID;
    $message = '<label class="text-success">Successfuly Deleted!</label>'; 
    }
    $reference = $database->getReference('Users');

    $getkey = $database->getReference('Users')->getChildKeys();
    $i = 0;
    
    foreach ($getkey as $key){
       
        $i++;
      
    }
    $i = $i-1;
    
    $numID = preg_replace('/[^0-9.]+/', '', $key);
    $turntoIntID = (int)$numID;
    $turntoIntID = $i+1;
    $strID ="SWAU-";
    $memberID = $strID . $turntoIntID;

}
?>