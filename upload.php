<?php

//upload.php

$folder_name = 'clientfiles/';

// $mailTo = "main@ericmoser.com";
$mailTo = "artwork@brookstoneprinting.com";

//Just going to use the From section as a CC
// $mailFrom = "emoser91@gmail.com";
$mailFrom = "todd@brookstoneprinting.com";

$headers = "From: ".$mailFrom;

$subject = "Brookstone Printing File Upload";

//Adding the rest of these helped make the email not go to spam in gmail
$headers = "Reply-To: ".$mailFrom;
$headers = "Return-Path: ".$mailFrom;
$headers = "CC: ".$mailFrom;
$headers = "BCC: ".$mailFrom;

$txt = "You have received a file upload: \n\n";
$txt .= "Information: \n";
$txt .= "Subject: Brookstone Uploads \n";
$txt .= "Message: A file has been uploaded to the clientfiles folder using Brookstone Printing drag and drop \n";

//Form Personal Information
//The information is not passing properly
$name = $_POST['name'];
$mailFrom = $_POST['email'];
$company = $_POST['company'];
$message = $_POST['message'];

$txt .= "Name:  ".$name."\n";
$txt .= "Email:  ".$email."\n";
$txt .= "Company:  ".$company."\n";
$txt .= "Message:  ".$message."\n";

if(!empty($_FILES))
{
 $temp_file = $_FILES['file']['tmp_name'];
 $location = $folder_name . $_FILES['file']['name'];
 move_uploaded_file($temp_file, $location);

 $filesent = $_FILES['file']['name'];
 $txt .= "File Name:  ".$filesent."\n";
 mail($mailTo,$subject,$txt,$headers);
}

if(isset($_POST["name"]))
{
 $filename = $folder_name.$_POST["name"];
 unlink($filename);
}

$result = array();

$files = scandir('clientfiles');

$output = '<div class="row">';

if(false !== $files)
{
 foreach($files as $file)
 {
  if('.' !=  $file && '..' != $file)
  {
   $output .= '
   <div class="col-md-2">
    <img src="'.$folder_name.$file.'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
    <buttonupload type="button" class="btn btn-link remove_image" id="'.$file.'">Remove</buttonupload>
   </div>
   ';
  }
 }
}

$output .= '</div>';
echo $output;

?>