<?php

//upload.php

$folder_name = 'clientfiles/';

if(!empty($_FILES))
{
    print_r($_POST);
    var_dump($_POST);

    //This data is not coming through for some reason!!
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $mailTo = "emoser91@gmail.com";
    $mailFrom = "emoser91@gmail.com";
    $headers = "From: ".$mailFrom;
    $headers = "Reply-To: ".$mailFrom;
    $headers = "Return-Path: ".$mailFrom;
    $headers = "CC: ".$mailFrom;
    $headers = "BCC: ".$mailFrom;

    $txt = "You have received a File Upload e-mail: \n\n";
    $txt .= "Information: \n";
    $txt .= "First Name:  ".$firstname."\n";
    $txt .= "Last Name:  ".$lastname."\n";

    mail($mailTo,$subject,$txt,$headers);

    //Process File Transfer
    $temp_file = $_FILES['file']['tmp_name'];
    $location = $folder_name . $_FILES['file']['name'];
    move_uploaded_file($temp_file, $location);

}

?>