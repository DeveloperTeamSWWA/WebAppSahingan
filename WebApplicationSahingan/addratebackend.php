<?php
$message="";
include('dbcon.php');
$reference = $database->getReference('Minimum_Rate');
$regprice = $reference->getChild('Regular_Price')->getValue();
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
                'Regular_Price' => $regprice,
                'Regularadded_Rate' => $price,
               ]);
               $message = '<label class="text-success">Successfuly Updated!</label>';
        }
      
    }
    
     
}

?>