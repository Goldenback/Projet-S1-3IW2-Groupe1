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
                if($this->User->is_Validated($email)){
                    $_SESSION["connected"] = true;
                    header("Location: /config");
                    exit();
                }
                else{
                    $_SESSION["error_message"] = "Compte non activé";
                    header("Location: /Login");
                }
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

    public function register(): void //OK
    {
        // Vérifie si le formulaire a été envoyé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupère les données
            $firstname = $_POST["firstname"] ?? '';
            $lastname = $_POST["lastname"] ?? '';
            $email = $_POST["email"] ?? '';
            $password = $_POST["password"] ?? '';

            $role = 'user'; //à changer

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // Génère un token unique pour l'activation de compte
            $activationToken = bin2hex(random_bytes(16));

            // Ajoute l'utilisateur en base de données avec le token
            if ($this->User->createUser($firstname, $lastname, $email, $hashedPassword, $role, $activationToken)) {
                // Envoie l'email d'activation
                $mail = new PHPMailer(true);
                try {
                    // Paramètres du serveur
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'toma11chang@gmail.com';
                    $mail->Password = 'cxcp numx wtqr acvt';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    $mail->setFrom('from@ChallengeStack.com', 'Challenge Stack 1');
                    $mail->addAddress($email);

                    // Contenu
                    $mail->isHTML(true);
                    $mail->Subject = 'Activation de votre compte - Challenge Stack';
                    $mail->Body = 'Veuillez cliquer sur ce lien pour activer votre compte : <a href="localhost/activate?token=' . $activationToken . '">Activer mon compte</a>';

                    $mail->send();
                    header("Location: /login");
                } catch (Exception $e) {
                    $_SESSION["error_message"] = "Impossible d'envoyer le mail d'activation.";
                }
            } else {
                $_SESSION["error_message"] = "Une erreur s'est produite lors de l'inscription.";
            }
        }
        require(BASE_DIR . "/Views/Security/register_form.php");
    }

    public function activate(): void
    {
        session_start();

        // Vérifie si le token est fourni dans l'URL
        if (!empty($_GET['token'])) {
            $token = $_GET['token'];

            // Vérifie si le token existe dans la base de données
            if ($this->User->isTokenValid($token)) {
                // Active le compte utilisateur
                if ($this->User->activateUser($token)) {
                    $_SESSION["success_message"] = "Votre compte a été activé avec succès. Vous pouvez maintenant vous connecter.";
                    header("Location: /login");
                } else {
                    $_SESSION["error_message"] = "Une erreur s'est produite lors de l'activation de votre compte.";
                    header("Location: /error");
                }
            } else {
                $_SESSION["error_message"] = "Lien d'activation invalide ou expiré.";
                header("Location: /error");
            }
        } else {
            $_SESSION["error_message"] = "Aucun token d'activation fourni.";
            header("Location: /error");
        }
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
