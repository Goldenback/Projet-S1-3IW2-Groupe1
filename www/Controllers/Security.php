<?php

namespace App\Controllers;

use App\Models\User;
use Random\RandomException;

require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


class Security
{

    private User $User;

    public function __construct(){
        $this->User = new User();

        define('BASE_DIR', __DIR__ . '/..'); //pour le dossier parent
    }

    public function login(): void
    {
        // Vérifie si le formulaire a été envoyé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupère les données du formulaire de connexion
            $email = $_POST["email"] ?? '';
            $password = $_POST["password"] ?? '';

            session_start();
            // Vérifie l'authentification
            if ($this->User->authenticateUser($email, $password)) {
                $_SESSION["connected"] = true;
                header("Location: /dashboard");
                exit();

            } else {
                $_SESSION["error_message"] = "Email ou mot de passe incorrect !";
                header("Location: /Login" );
            }
            exit();
        }

        // Ne pas afficher de contenu HTML ou de texte avant header()
        require(BASE_DIR . "/Views/Security/login_form.php");
    }

    public function logout(): void
    {
        session_start();

        //pour effacer les données de la session
        $_SESSION = array();

        session_destroy();

        // Redirige l'utilisateur vers la page de connexion
        header("Location: /login");
        exit();
    }

    public function register(): void
    {
        // Vérifie si le formulaire a été envoyé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupère les données
            $firstname = $_POST["firstname"] ?? '';
            $lastname = $_POST["lastname"] ?? '';
            $email = $_POST["email"] ?? '';
            $password = $_POST["password"] ?? '';

            $role = 'user'; //à changer

            // pour hacher le mot de passe
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            //ajoute dans la bdd
            if ($this->User->createUser($firstname, $lastname, $email, $hashedPassword, $role)) {
                header("Location: /login");
                exit();
            }
        }

        require(BASE_DIR . "/Views/Security/register_form.php");
    }

    /**
     * @throws RandomException
     */
    public function forgotPWD(): void {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["email"])) {
                $email = $_POST['email'];
                if ($this->User->emailExists($email)) {
                    // Genere un mot de passe aléatoire
                    $newPassword = bin2hex(random_bytes(8));
                    // MaJ du mot de passe
                    $this->User->setPwd($email, $newPassword);
                    // Instance PHPMailer
                    $mail = new PHPMailer(true);

                    try {
                        // Paramètre du serveur
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com'; // Mettre SMTP server pour envoyer à travers
                        $mail->SMTPAuth = true; // Activer SMTP authentication
                        $mail->Username = 'toma11chang@gmail.com'; // peut etre changer par le mail exprès pour le projet
                        $mail->Password = 'cxcp numx wtqr acvt'; // mot de passe de l'application (dans gmail)
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Activer TLS encryption
                        $mail->Port = 587; // TCP port pour connecter

                        $mail->setFrom('from@ChallengeStack.com', 'Challenge Stack 1');
                        $mail->addAddress($email); // ajoute le mail

                        // Contenue
                        $mail->isHTML(true);
                        $mail->Subject = 'Nouveau mot de passe - Challenge Stack';
                        $mail->Body = 'Votre nouveau mot de passe est : ' . $newPassword;

                        $mail->send();
                        header("Location: /login");
                    } catch (Exception $e) {
                        $_SESSION["error_message"] = "Impossible d'envoyer le mail.";
                    }
                } else {
                    $_SESSION["error_message"] = "Email inexistant !";
                }
            } else {
                $_SESSION["error_message"] = "Veuillez fournir votre mail.";
            }
        }

        require(BASE_DIR . "/Views/Security/forgot_password.php");
    }

}
