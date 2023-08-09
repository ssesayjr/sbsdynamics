<?php
if(isset($_POST['submit'])) {
    print_r($_POST);
    die;
    $email_to = "info@sbsdyn.com";
    $email_subject = "Mint Makeup & Beauty Enquiry";        

    $fname = $_POST['name']; // required
    $message = $_POST['subject']; // required
    $email_from = $_POST['email']; // required

    // create email content
    $email_content = "From:"." ".$name."\n"."Email:"." ".$email_from."\n"."Message:"." ".$message; 
    mail($email_to, $email_subject, $email_content);
}
?> 