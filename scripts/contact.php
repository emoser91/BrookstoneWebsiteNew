<?php

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['email'];
    $message = $_POST['message'];

    $mailTo = "main@ericmoser.com";

    $headers = "From: ".$mailFrom;
    
    //Adding the rest of these helped make the email not go to spam in gmail
    $headers = "Reply-To: ".$mailFrom;
    $headers = "Return-Path: ".$mailFrom;
    $headers = "CC: ".$mailFrom;
    $headers = "BCC: ".$mailFrom;

    $txt = "You have received a Contact e-mail from  ".$name." \n\n".$message;

    if ( mail($mailTo,$subject,$txt,$headers) ) {
        print("<script>window.alert('The email has been sent!');</script>");
        // echo "The email has been sent!";
        // You can also do a redirect to a new page like thank you for your email
        // header('Location: index.html');

    } else {
        print("<script>window.alert('The email has failed!');</script>");
        // echo "The email has failed!";
    }
}

?> 