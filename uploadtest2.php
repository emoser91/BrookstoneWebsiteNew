<?php

//upload.php
//This File will execute once for every file uploaded

$folder_name = 'clientfiles/';

if(!empty($_FILES))
{
    $fullname = $_POST['fullname'];
    $company = $_POST['company'];
    $mailFrom = $_POST['email'];
    $message = $_POST['message'];

    $mailTo = "emoser91@gmail.com";
    $headers = "From: ".$mailFrom;
    $headers = "Reply-To: ".$mailFrom;
    $headers = "Return-Path: ".$mailFrom;
    $headers = "CC: ".$mailFrom;
    $headers = "BCC: ".$mailFrom;

    $subject = "Brookstone Printing File Upload";

    $txt = "You have received a File Upload Email: \n\n";
    $txt .= "Information: \n";
    $txt .= "Name:  ".$fullname."\n";
    $txt .= "Company:  ".$company."\n";
    $txt .= "Email:  ".$mailFrom."\n";
    $txt .= "Message:  ".$message."\n";

    //Process File Transfer
    $temp_file = $_FILES['file']['tmp_name'];
    $location = $folder_name . $_FILES['file']['name'];
    move_uploaded_file($temp_file, $location);

    //Send Email
    $txt .= "File Name:  ".$_FILES['file']['name']."\n";
    if ( mail($mailTo,$subject,$txt,$headers) ) 

}

?>