<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once './.env';
require_once './phpmailer/phpmailer/src/Exception.php';
require_once './phpmailer/phpmailer/src/PHPMailer.php';
require_once './phpmailer/phpmailer/src/SMTP.php';

session_start();

function envoiEmail($nom, $email, $objet, $message) {

    try {
        // Création d'une instance de PHPMailer
        $mail = new PHPMailer(true);

        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['email'];
        $mail->Password = $_ENV['mot_de_pass'];
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Destinataire et expéditeur
        $mail->setFrom($email, $nom); // Exepediteur du mail
        //$mail->addAddress($email, $nom); // Destinataire
        $mail->addAddress($_ENV['mailPerso'], 'MamadouAl');

        // Contenu de l'e-mail
        $mail->isHTML(true);
        $mail->Subject = "[Site perso] $objet";
        $mail->Body = '
            <html> 
                <head>
                    <style>
                        body {font-family: Arial, serif;}
                        .header {color: #444; font-size: 1.2em; margin-bottom: 10px;}
                        .content {margin: 20px 0;}
                        .footer {font-size: 0.8em; color: #888;}
                        .block {font-family: Arial, serif; background-color: #f9f9f9; padding: 10px; border-left: 5px solid #cbc7c7;}
                    </style>
                </head>
                <body>
                    <div class="header">Vous avez un message de votre site perso</div>
                    <div class="content">
                        <blockquote class="block">
                            <p><strong>Nom :</strong> ' .$nom.'</p>
                            <p><strong>Email :</strong> '.$email.'</p>
                            <p><strong>Objet :</strong> '.$objet.'</p>
                            <p>'.$message.'</p>
                        </blockquote>
                        
                    </div>
                    <div class="footer">Ceci est un message automatique, merci de ne pas y répondre.</div>
                </body>
            </html>';

        // Envoi de l'e-mail
        $mail->send();

        // Message de confirmation
        $confirmationMessage = "Un e-mail a été envoyé à $email.";
        return $confirmationMessage;
    } catch (Exception $e) {
        return 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
    }
}

// Récupération des données du formulaire
$nom = $_POST['contactName'];
$email = $_POST['contactEmail'];
$objet = $_POST['contactSubject'];
$message = $_POST['contactMessage'];

// Verification des données
if (empty($nom) || empty($email) || empty($objet) || empty($message)) {
    echo 'Veuillez remplir tous les champs.';
} else {
   //utilise htmlentities pour éviter les failles XSS
    $nom = htmlentities($nom);
    $email = htmlentities($email);
    $objet = htmlentities($objet);
    $message = htmlentities($message);

    // Envoi de l'e-mail
    envoiEmail($nom, $email, $objet, $message);
    $_SESSION['success_message'] = "<p style='color: green; background-color: #e8e6e6'>Votre message a bien été envoyé. Merci de m\'avoir contacté.</p>";
    header('Location: contact.php#message');
}