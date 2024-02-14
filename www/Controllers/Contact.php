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

    public function sendMessage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération et nettoyage des données du formulaire
            $firstName = htmlspecialchars(strip_tags($_POST['first-name']));
            $lastName = htmlspecialchars(strip_tags($_POST['last-name']));
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $phone = htmlspecialchars(strip_tags($_POST['phone']));
            $topic = htmlspecialchars(strip_tags($_POST['topic']));
            $userType = $_POST['option'];
            $message = htmlspecialchars(strip_tags($_POST['messageArea']));

            // Validation supplémentaire des données
            if (empty($firstName) || empty($lastName) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($phone) || empty($topic) || empty($userType) || empty($message)) {
                header('Location: /contact#contact-us');
                exit;
            } else {
                try {
                    // Gestion du mail

                    // Si tout est réussi, rediriger vers la page de remerciement

                    header('Location: /thank-you');
                    exit;
                }
                catch (Exception $e) {
                    // En cas d'erreur lors de l'enregistrement ou de l'envoi de l'e-mail
                    header('Location: /contact#contact-us');
                    exit;
                }
            }
        } else {
            header('Location: /about');
            exit;
        }
    }
}
