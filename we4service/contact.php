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
        
$message = "<html><body>"
            .$_POST["name"]."<br><br>"
            .$_POST["email"]."<br><br>"
            .$_POST["contact"]."<br><br>"
            .$_POST["message"]."".
            "</body></html>";
        
$sendmail = mail($to, $subject, $message, $headers); 
         header( "Location: index.html" ); 
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>We4service </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://we4serviceprivatelimited.com/style.css" rel="stylesheet">
    <style>
       .contact-section
        {
            padding: 40px 0;
            background-size: cover;
        }
        .contact-section h1
        {
            text-align: center;
            color: dodgerblue;
        }
        .border
        {
            width: 100px;
            height: 10px;
            background: #34495e;
            margin: 30px auto;
        }
        .contact-form
        {
            max-width: 500px;
            margin: auto;
            padding: 0 10px;
            overflow: hidden;
        }
        .contact-form-text
        {
            display: block;
            width: 100%;
            box-sizing: border-box;
            margin: 16px 0;
            padding: 20px 40px;
            transition: 0.5s;
        }
        .contact-form-text:focus
        {
            box-shadow: 0 0 10px 4px #34495e;
        }
        textarea.contact-form-text
        {
            resize: none;
            height: 120px;
        }
        .contact-form-btn
        {
            float: right;
            border: 0;
            background: #34495e;
            padding: 12px 50px;
            border-radius: 20px;
            color: aqua;
            font-size: 15px;
            cursor: pointer;
            transition: 0.5s;
        }
        .contact-form-btn:hover
        {
            background: aqua;
            color: #34495e;
        }
        
         
        
               .contact-section img {
                   max-width: 100%;
  height: auto;
}
        
        
        
        
    </style>
</head>
<body>
    <div class="header">
        <img  src="https://i.ibb.co/WzTMd1S/Pics-Art-logo.png" class="logo">
        <input type="checkbox" id="chk">
        <label for="chk" class="show-menu-btn">
            <i>: : :</i>
        </label>
        
        <ul class="menu">
            <li><a href="http://we4serviceprivatelimited.com/index.html">Home</a></li>
            <li><a href="http://we4serviceprivatelimited.com/about.html">About</a></li>
            <li><a href="http://we4serviceprivatelimited.com/our_services.html">Our Services</a>
                <ul>
                    <li><a href="http://we4serviceprivatelimited.com/services/Ticketing-services.html">Ticketing Services</a></li>
                    <li><a href="http://we4serviceprivatelimited.com/services/Travel-assistance.html">Travel Assistance</a></li>
                    <li><a href="http://we4serviceprivatelimited.com/services/general-services.html">General Services</a></li>
                    <li><a href="http://we4serviceprivatelimited.com/services/hr-services.html">HR Services</a></li>
                    <li><a href="http://we4serviceprivatelimited.com/services/banking-services.html">Banking Services</a></li>
                    <li><a href="http://we4serviceprivatelimited.com/services/card-holder-services.html">Card Holder Services</a></li>
                    <li><a href="http://we4serviceprivatelimited.com/services/suppliers.html">Supplies</a></li>
                    <li><a href="http://we4serviceprivatelimited.com/services/labour-supply.html">Labour Supply</a></li>
                    <li><a href="http://we4serviceprivatelimited.com/services/man-power-supply.html">Man Power Supply</a></li>
                    <li><a href="http://we4serviceprivatelimited.com/services/registration.html">Registration</a></li>
                    <li><a href="http://we4serviceprivatelimited.com/services/daily-services.html">Daily Services</a></li>
                    <li><a href="http://we4serviceprivatelimited.com/services/insurance.html">Insurance</a></li>
                    <li><a href="http://we4serviceprivatelimited.com/services/loan-services.html">Loan Services</a></li>
                    <li><a href="http://we4serviceprivatelimited.com/services/courier-services.html">Courier Services</a></li>
                    <li><a href="http://we4serviceprivatelimited.com/services/sales.html">Sales</a></li>
                    <li><a href="http://we4serviceprivatelimited.com/services/other-services.html">Others</a></li>
                </ul>
            </li>
            <li><a href="http://we4serviceprivatelimited.com/careers.html">Career</a></li>
            
            <li><a href="http://we4serviceprivatelimited.com/contact.html">Contact</a></li>
            <label for="chk" class="hide-menu-btn">
                <i>X</i>
            </label>
        </ul>
    </div>

    
    
    <div class="contact-section">
        <center>
        <div class="heading"><h2>Contact Us</h2></div>
        <br><img src="https://i.ibb.co/d2GgX8v/IMG-20200627-WA0006.jpg" alt="IMG-20200627-WA0006" border="0" class="responsive" width="460" height="345">
        </center>
        <form class="contact-form" action="http://we4serviceprivatelimited.com/contact.php" method="post">
            <input type="text" class="contact-form-text" placeholder="Your Name" name="name" required>
            <input type="email" class="contact-form-text" placeholder="Your Email" name="email" required>
            <input type="text" class="contact-form-text" placeholder="Your Phone" name="contact" required>
            <textarea class="contact-form-text" placeholder="Your Description" name="message" required></textarea>
            <input type="submit" class="contact-form-btn" value="send" name="submit">
        </form>
    </div>
    
    
    
    <div class="footer">
            <div class="left">
                <table style="text-align: left; color: whitesmoke; font-size: 18px;" cellspacing="30px" cellpadding="10px">
                    <tr>
                        <th><img src="https://i.ibb.co/hK5w3zT/mail.jpg"  width="50"  height="50" style="border-radius: 50%;">
                        <th><i> info.we4service@gmail.com</i>
                    </tr>
                    <tr>
                        <th><img src="https://i.ibb.co/ZJ26sQZ/whatsapp.jpg " width="50"  height="50" style="border-radius: 50%;">
                        <th><i> 9177953497</i>
                    </tr>
                    
                </table>  
            </div>
            
        </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d60902.556634525085!2d78.48093612091238!3d17.44008977032083!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1466344027222" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</body>
</html>