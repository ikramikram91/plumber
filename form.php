<?php
$msg_ok = "Votre message a bien été envoyer";
define('MAIL_DESTINATAIRE','walidplomberie@plombieriledefrance.fr'); 
// vérification des champs
if (empty($_POST['nom'])) 
$message .= "Votre nom<br/>";
if (empty($_POST['prenom'])) 
$message .= "Votre prenom<br/>";
if (empty($_POST['email'])) 
$message .= "Votre email<br/>";
if (empty($_POST['numero'])) 
$message .= "Votre numero<br/>";
if (empty($_POST['text'])) 
$message .= "Votre message<br/>";

foreach($_POST as $index => $valeur) {
    $$index = stripslashes(trim($valeur));
  }

//Préparation de l'entête du mail:
$mail_entete  = "MIME-Version: 1.0\r\n";
$mail_entete .= "From: {$_POST['nom']} "."<{$_POST['email']}>\r\n";
$mail_entete .= 'Reply-To: '.$_POST['email']."\r\n";
$mail_entete .= 'Content-Type: text/plain; charset="iso-8859-1"';
$mail_entete .= "\r\nContent-Transfer-Encoding: 8bit\r\n";
$mail_entete .= 'X-Mailer:PHP/' . phpversion()."\r\n";

// préparation du corps du mail
$mail_corps  = "Message de :  $nom $prenom\n";

$mail_corps .= $text;


// envoi du mail

if (mail(MAIL_DESTINATAIRE,$mail_corps,$mail_entete)) {
    header("Status: 301 Moved Permanently", false, 301);
    header("Location: https://plombieriledefrance.fr/");
exit;
    //Le mail est bien expédié
    
  } else {
    //Le mail n'a pas été expédié
    echo "Une erreur est survenue lors de l'envoi du formulaire par email";
  }


?>

