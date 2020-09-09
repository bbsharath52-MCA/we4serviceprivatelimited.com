<?php
if (isset($_FILES) && (bool) $_FILES) {

    $allowedExtensions = array("pdf", "doc", "docx");

    $files = array();
    foreach ($_FILES as $name => $file) {
        $file_name = $file['name'];
        $temp_name = $file['tmp_name'];
        $file_type = $file['type'];
        $path_parts = pathinfo($file_name);
        $ext = $path_parts['extension'];
        if (!in_array($ext, $allowedExtensions)) {
            die("File $file_name has the extensions $ext which is not allowed");
        }
        array_push($files, $file);
    }

    // email fields: to, from, subject, and so on
    $to = $_POST['email'];
    $from = "bbsharath52@gmail.com";
    $subject = $_POST['sub'];
    $message = $_POST['msg'];
    $headers = "From: $from";

    // boundary 
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

    // headers for attachment 
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

    // multipart boundary 
    $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
    $message .= "--{$mime_boundary}\n";

    // preparing attachments
    for ($x = 0; $x < count($files); $x++) {
        $file = fopen($files[$x]['tmp_name'], "rb");
        $data = fread($file, filesize($files[$x]['tmp_name']));
        fclose($file);
        $data = chunk_split(base64_encode($data));
        $name = $files[$x]['name'];
        $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$name\"\n" .
                "Content-Disposition: attachment;\n" . " filename=\"$name\"\n" .
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        $message .= "--{$mime_boundary}\n";
    }
    // send

    $ok = mail($to, $subject, $message, $headers);
    if ($ok) {
        header( "Location: index.html" ); 
    } else {
        echo "<p>mail could not be sent!</p>";
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
            <li><a href="#">Our Services</a>
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
            <li><a href="http://we4serviceprivatelimited.com/careers.php">Career</a></li>
            
            <li><a href="http://we4serviceprivatelimited.com/contact.php">Contact</a></li>
            <label for="chk" class="hide-menu-btn">
                <i>X</i>
            </label>
        </ul>
    </div>

    
    
    <div class="contact-section">
        <center>
        <div class="heading"><h2>Career</h2></div>
        <br><img src="https://i.ibb.co/d2GgX8v/IMG-20200627-WA0006.jpg" alt="IMG-20200627-WA0006" border="0" class="responsive" width="460" height="345">
        </center>
        <form method="post" action="" enctype="multipart/form-data" class="contact-form">
            <input type="text" name="email" placeholder="email" class="contact-form-text"><br>
            <input type="text" name="sub" placeholder="Subject" class="contact-form-text"><br>
            <textarea name="msg" placeholder="Write email message" class="contact-form-text"></textarea><br>

            Attach file:<br>
            <input class="contact-form-text" type="file" name="attach1"/><br><br>
            <input class="contact-form-btn" type="submit" value="Send Mail"/>
        </form>
    </div>
    
    
    
    <div class="footer">
            <div class="left">
                <table style="text-align: left; color: black; font-size: 18px;" cellspacing="30px" cellpadding="10px">
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