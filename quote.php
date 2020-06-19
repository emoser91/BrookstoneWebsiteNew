<?php

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $mailFrom = $_POST['email'];

    $company = $_POST['company'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $fax = $_POST['fax'];

    $job = $_POST['job'];
    $duedate = $_POST['duedate'];
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];
    $sides = $_POST['sides'];
    $ink = $_POST['ink'];
    $stock = $_POST['stock'];
    $artwork = $_POST['artwork'];
    $message = $_POST['message'];

    $mailTo = "main@ericmoser.com";

    $headers = "From: ".$mailFrom;
    
    //Adding the rest of these helped make the email not go to spam in gmail
    $headers = "Reply-To: ".$mailFrom;
    $headers = "Return-Path: ".$mailFrom;
    $headers = "CC: ".$mailFrom;
    $headers = "BCC: ".$mailFrom;

    $txt = "You have received a Quote Request e-mail: \n\n";
    $txt .= "Personal Information: \n";
    $txt .= "Name:  ".$name."\n";
    $txt .= "Company:  ".$company."\n";
    $txt .= "Address:  ".$address."\n";
    $txt .= "City:  ".$city."\n";
    $txt .= "State:  ".$state."\n";
    $txt .= "Zip-Code:  ".$zip."\n";
    $txt .= "Phone:  ".$phone."\n";
    $txt .= "Email:  ".$mailFrom."\n";
    $txt .= "Fax:  ".$fax."\n\n";

    $txt .= "Product Information: \n";
    $txt .= "Job Type:  ".$job."\n";
    $txt .= "Due Date:  ".$duedate."\n";
    $txt .= "Quantity:  ".$quantity."\n";
    $txt .= "Finished Size:  ".$size."\n";
    $txt .= "Sides:  ".$sides."\n";
    $txt .= "Ink:  ".$ink."\n";
    $txt .= "Stock:  ".$stock."\n";
    $txt .= "Artwork:  ".$artwork."\n";
    $txt .= "Message:  ".$message."\n";

    $subject = "Brookstone Printing Quote Request from  ".$name;

    if ( mail($mailTo,$subject,$txt,$headers) ) {
        echo "The email has been sent!";
    } else {
        echo "The email has failed!";
    }

}

?> 
