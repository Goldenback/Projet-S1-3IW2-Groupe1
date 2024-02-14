<?php

namespace App\Controllers;

use App\Models\newsletter_subscriber;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Contact
{

    public function __construct(){
        define('BASE_DIR', __DIR__ . '/..'); //pour le dossier parent
    }

    public function subscribe(): void
    {
        // Vérifiez que la requête est bien une requête POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

            // Valider l'adresse email
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Le processus d'abonnement commence ici
                $subscriber = new newsletter_subscriber();
                $result = $subscriber->addEmail($email);

                if ($result) {
                    // Si l'inscription est réussie
                    header('Location: /thank-you');
                    exit;
                } else {
                    $error = "Subscription failed";
                    include(BASE_DIR . "/Views/Templates/Frontend/service.php");
                    exit;
                }
            } else {
                // Si l'email n'est pas valide
                $error = "invalid email !";
                include(BASE_DIR . "/Views/Templates/Frontend/service.php");
                exit;
            }
        } else {
            // Si la méthode de requête n'est pas POST
            header('Location: /service');
            exit;
        }
    }

}
