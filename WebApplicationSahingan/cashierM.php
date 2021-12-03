
<?php
include('dbcon.php');
$message='';
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

$numID = preg_replace('/[^0-9.]+/', '', $key);
$turntoIntID = (int)$numID;
$turntoIntID = $turntoIntID+1;
$strID ="SWA-";
$memberID = $strID . $turntoIntID;
}


if(isset($_POST['pay'])){
    $ID = $_POST['consumer_ID'];
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $add = $_POST['address'];
    $cont = $_POST['contacts'];
    $balance = $_POST['balance'];
    $sitio = $_POST['sitio'];
    $prev = $_POST['prev_reading'];
    $curr = $_POST['curr_reading'];
    $total = $_POST['total'];
    $mfee = $_POST['mfee'];
   
    $penalty = $_POST['penalty'];
    $change = $_POST['change'];
    $cash = $_POST['cash'];
    $newprev_reading = $_POST['curr_reading'];

    $newadd = trim(ucwords($add));
    $newcontact = trim(ucwords($cont));
    $newfname = trim(ucwords($Fname));
    $newlname = trim(ucwords($Lname));
    $newprevread = trim(ucwords($newprev_reading));
    $newsitio = trim(ucwords($sitio));

    if(empty($Fname) || empty($balance)){
        $message = '<label class="text-danger">Please search ID and click the table!</label>';
        
    }else{
        if($total == 0){
            $message = '<label class="text-danger">You are already paid!</label>';
        }else{
   if(empty($cash)){
    $message = '<label class="text-danger">Please input cash!</label>';
   }
   else{
       if($cash < $total ){
        $message = '<label class="text-danger">Invalid cash!</label>';
       }else{
       
    $database->getReference("Members/" . $ID )
    ->set([
    
        'Firstname' => $newfname,
        'Lastname' => $newlname,
        'Sitio'=> $newsitio, 
        'Address' =>$newadd,
         'Contacts'=> $newcontact,
         'Previous_Reading' => $newprevread,
         'Current_Reading' => "0",
         'Balance' => "0",
         'Membership_Fee' => "0",
         'Payment_Status' => "Paid",
         'Member_Status' => "Active",
         'Penalty' => "0",
         'Meter_Status' => "Working",
         'Password' => $newcontact,
         
      
      
         
       ]);
       
      
       $fourRandomDigit = mt_rand(1000,9999);
       $tr = $fourRandomDigit;
       require('fpdf.php');
       $pdf = new FPDF();
       $pdf->AddPage();
       $pdf->SetFont('Arial','B',16);
       $pdf->Cell(190, 8, 'Sahingan Water Works Association', 1,1,'C');
       $pdf->SetFont('Arial','B',12);
       $pdf->Cell(190, 8, 'Barangay Balete, Batangas City', 1,1,'C');
       $pdf->Cell(100, 8, 'Mr/Mrs '.$Fname.''.$Lname, 1, 0);
       $pdf->Cell(90, 8, 'Date: '. date("Y/m/d"), 1, 1,'R');
       $pdf->Ln(5);
       $pdf->SetFont('Arial','',12);
     
       $pdf->Cell(70, 8, 'Previous_Reading', 1, 0);
       $pdf->Cell(20, 8, $prev, 1, 1,'C');
       $pdf->Cell(70, 8, 'Current_Reading', 1, 0);
       $pdf->Cell(20, 8, $curr, 1, 0,'C');
       $pdf->Cell(70, 8, $tr, 0, 1,'C');
       $pdf->Cell(70, 8, 'Membership Fee', 1, 0);
       $pdf->Cell(20, 8, $mfee, 1, 1,'C');
       $pdf->Cell(70, 8, 'Penalty', 1, 0);
       $pdf->Cell(20, 8, $penalty, 1, 1,'C');
     
       $pdf->Ln(5);
      $pdf->Cell(160, 8, 'Total', 1, 0);
       $pdf->Cell(30, 8, $total, 1, 1,'C');
       $pdf->Cell(160, 8,'Cash', 1, 0);
       $pdf->Cell(30, 8, $cash, 1, 1,'C');
       $pdf->Cell(160, 8,'Change', 1, 0);
       $pdf->Cell(30, 8, $change, 1, 1,'C');
       $pdf->Output('D',$Fname.date("Y/m/d").'.pdf');

       
    }
    
    }
}
}
}

?>