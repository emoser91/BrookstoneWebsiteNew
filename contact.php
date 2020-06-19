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

    $txt = "You have received a Quote Request e-mail from  ".$name."/n/n".$message;

    if ( mail($mailTo,$subject,$txt,$headers) ) {
        // echo '<script>alert("The email has been Sent!")</script>';
        echo "The email has been sent!";
    } else {
        echo "The email has failed!";
    }

    // mail($mailTo, $subject, $txt, $headers);
    // mail($mailFrom, $subject, $txt, $headers);
    // header("Location: requestaquote.html?mailsend");

}

?> 