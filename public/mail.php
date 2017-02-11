<?php
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$message=$_REQUEST['message'];
if (($name=="")||($email=="")||($message==""))
    {
    echo "All fields are required, please fill the form again.";
    }
else{        
    $from="From: $name";
    $subject="Message sent using your contact form";
    mail("example@gmail.com", $subject, $message, $from);
	header('Location: thanks.html');//redirect back to homepage
	exit();
    }
?>