<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'info@sbsdyn.com';

  $errors = [];
  
  if (!empty($errors)) {
      $allErrors = join('<br/>', $errors);
      $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
   }
  
  if (!empty($_POST)) {
     $name = $_POST['name'];
     $email = $_POST['email'];
     $message = $_POST['subject'];
    
     if (empty($name)) {
         $errors[] = 'Name is empty';
     }
  
     if (empty($email)) {
         $errors[] = 'Email is empty';
     } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $errors[] = 'Email is invalid';
     }
  
     if (empty($message)) {
         $errors[] = 'Message is empty';
     }
  }



  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  // $contact->smtp = array(
  //   'host' => 'smtp.gmail.com',
  //   'username' => 'comm@sbsdyn.com',
  //   'password' => 'DynamicCommunication88!',
  //   'port' => '25'
  // );


  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
