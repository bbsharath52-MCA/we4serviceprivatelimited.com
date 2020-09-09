<?php

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $message = $_POST['message'];
    if($name=='' || $email=='' || $contact=='' || $message=='')
    {
        echo "<script>alert('All are required');</script>";
    }
    else
    {
        $from = "WE4SERVICE";
        $webmaster = "d2djobalerts@gmail.com";
        $to = "bbsharath52@gmail.com";
        
        $subject = "Contact Us";
        
$headers = "From: ".$from."<".$webmaster.">\r\n";
$headers .="X-Mailer:PHP/" .phpversion(). "\r\n";
$headers .="MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
        
$message = "<html><body>".$_POST["name"]."".$_POST["email"]."".$_POST["contact"]."".$_POST["message"]."". "</body></html>";
        
$sendmail = mail($to, $subject, $message, $headers); 
        echo "<script>alert('Thank you. ')</script>";
    }
}
?>