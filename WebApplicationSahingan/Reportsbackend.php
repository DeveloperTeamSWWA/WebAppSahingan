<?php
include('dbcon.php');
 
if(isset($_POST["export"]))  
{  
$referenceMember = $database->getReference('Members')->getChild('SWA-1');
$firstnameT = $referenceMember->getChild('Firstname')->getValue();
$lastnameT = $referenceMember->getChild('Lastname')->getValue();
if(!isset($error)){

    // Title of the CSV
          $Content = "Firstname,Lastname\n";

    //set the data of the CSV
    $Content .= "$firstnameT,$lastnameT\n";

    //set the file name and create CSV file
    $FileName = $firstnameT."-".date("d-m-y-h:i:s").".csv";
    header('Content-Type: application/csv'); 
    header('Content-Disposition: attachment; filename="' . $FileName . '"'); 
    echo $Content;
    exit();
}
}

//if their are errors display them
if(isset($error)){
foreach($error as $error){
    echo '<p style="color:#ff0000">$error</p>';
}
}