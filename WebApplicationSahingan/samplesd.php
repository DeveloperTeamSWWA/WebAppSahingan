<?php
date_default_timezone_set('Asia/Manila');
$date1 = date('F j, Y');
$date2 = "November 26, 2021";

$seconds_to_expire = strtotime($date2) - time();
if ($seconds_to_expire < 3*86400) {
     
echo "inamo";
}

    $fourRandomDigit = mt_rand(1000,9999);
    echo $fourRandomDigit;    

?>
