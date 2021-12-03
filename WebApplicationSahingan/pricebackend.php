<?php
$message="";
include('dbcon.php');
$reference = $database->getReference('Minimum_Rate');
$regprice1 = $reference->getChild('Regularadded_Rate')->getValue();
if(isset($_POST['update'])){
    $price = $_POST['price'];

    if(empty($price)){
        $message = '<label class="text-danger">Please input a price!</label>';
           
    }else{
        if($price == "0"){
            $message = '<label class="text-danger">Please input a valid amount!</label>';
        }else{
            $database->getReference("Minimum_Rate" )
            ->set([
                'Regularadded_Rate' => $regprice1,
                'Regular_Price' => $price,
               ]);
               $message = '<label class="text-success">Successfuly Updated!</label>';
        }
      
    }
    
     
}

?>