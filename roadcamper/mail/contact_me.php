<?php
// Check for empty fields

header('Content-type: text/html; charset=utf-8');

if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))

   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'geral@roadcamper.pt'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contacto do formulário:  $name";
$email_body = "Nova mensagem recebida através do site.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: info@roadcamper.pt\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers.= "Content-Type: text/plain;charset=utf-8\r\n";

$headers .= "Reply-To: $email_address";  
mail($to,$email_subject,$email_body,$headers);

return true;         
?>
