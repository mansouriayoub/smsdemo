<?php 
if(isset($_POST) AND !empty($_POST)  ){
    $to = "contact@smslogiciels.ma,smslogiciels@gmail.com";
    $from = $_POST['adress_mail'];
    $message = $_POST['message_form'];
    $demande = $_POST['demande']; 
    $demande_content = ""; 
    if( $demande == "crm" ) $demande_content = "SMS CRM (Gestion commerciale)";
    else if( $demande == "rcm" ) $demande_content = "SMS RCM (Rental Cars Management";
    else if( $demande == "developpement" ) $demande_content = "Développement spécifique";
    else if( $demande == "autre" ) $demande_content = "Autre chose";

    $fullname = $_POST['fullname'];
    
    $phone_number = $_POST['phone_number'];
    $subject = strtoupper("DEMANDE : ".$demande_content." DE L'APART DE : ".$fullname);
    
    // $message = "Bonjour,\n\n" . "- Vous avez une demande de l'appart de : ".$fullname ."\n\n- Tél : " .$phone_number. "\n\n- Message : " . $message;
    $message = "Bonjour,\n\n"
    ."- Vous avez une demande de l'appart de : ".$fullname 
    ."\n\n- Tél : " .$phone_number
    ."\n\n- Message : " . $message
    ."\n\n- Besoin choisi par le client : " .$demande_content;
    
    $headers = "From:" . $from;
    
    if( mail($to,$subject,$message,$headers) ) die('sent');
    else die('not-sent');

}
?>