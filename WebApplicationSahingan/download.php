<?php
$message="";
if(!empty($_GET['file'])){
    $fileName = basename($_GET['file']);
    $filePath = 'qrcodeimages/'.$fileName;
    if(!empty($fileName) && file_exists($filePath)){
        // Define headers
        header('Content-Length: ' . filesize($filePath));  
        header('Content-Encoding: none');
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        // Read the file
        readfile($filePath);
        exit;
    }else{
        $message = '<label class="text-danger">Please add member first!</label>';
    }
}