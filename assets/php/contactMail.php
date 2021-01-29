<?php 
if(isset($_POST['submit'])){
    $to = "contact@smslogiciels.ma"; // this is your Email address
    $from = $_POST['adress_mail']; // this is the sender's Email address
    $fullname = $_POST['fullname'];
    $phone_number = $_POST['phone_number'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $fullname . " wrote the following:" . "\n\n" . $_POST['message_form'];
    $message2 = "Here is a copy of your message " . $fullname . "\n\n" . $_POST['message_form'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo '<script>alert("Mail Sent. Thank you " . $fullname . ", we will contact you shortly.")</script>'; 
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>