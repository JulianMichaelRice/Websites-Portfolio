<?php
    session_start();
    $name = $_POST['c_name'];
    $last = $_POST['c_last'];
    $email = $_POST['c_email'];
    $number = $_POST['c_number'];
    $type = $_POST['c_type'];
    $length = $_POST['c_length'];

    if ($type == "one") {
        $type = "one on one consultation";
    } else {
        $type = "group consultation";
    }

    $email_subject = "$name wants to set up an appointment with you!\n";
    
    $email_body = "$name is asking for a $length minute $type. Their name is $name $last, and they can be contacted by email at $email or by phone at $number. Let's do this!";

    $to = 'nherbeauty.co@gmail.com';
    $headers = 'From: $to \r\n';
    $headers .= 'Reply-To: $email \r\n';
    mail($to,$email_subject,$email_body,$headers);
    $_SESSION['notification'] = "We will get back to you soon!";
    header('location:services');
?>