<?php

namespace App\Controllers;

use App\Core\DB;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';

class Security
{
    private DB $db;

    public function __construct()
    {
        $this->db = new DB();
        define('BASE_DIR', __DIR__ . '/..'); //pour le dossier parent
    }

    public function login(): void
    {
        // Check if the form was submitted and the request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve username and password from request data
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // check is email exist + get his information
            $userData = $this->db->getOneBy("users", ['email' => $email]);

            // Verify password if user is found
            if ($userData && password_verify($password, $userData['password'])) {
                $user = new User(
                    $userData['id'],
                    $userData['firstname'],
                    $userData['lastname'],
                    $userData['username'],
                    $userData['email'],
                    $userData['password'],
                    $userData['role'],
                    $userData['is_validated'],
                    $userData['is_deleted'],
                    new \DateTime($userData['created_at']),
                    $userData['activation_token']
                );
                if (!$user->isValidated()) {
                    // Account not activated
                    $_SESSION["error_message"] = "Compte non activé";
                    header("Location: /login");
                } else {
                    // Authentication successful
                    // Start PHP session
                    session_start();

                    // Store user information in session
                    $_SESSION['email'] = $user->getEmail();

                    // Redirect to home page
                    header("Location: /home");
                }
            } else {
                // Authentication failed
                // Return error response
                $_SESSION["error_message"] = "Email ou mot de passe incorrect !";
                header("Location: /login");
            }
        } else {
            // Display login form
            require(BASE_DIR . "/Views/Security/login_form.php");
        }
    }

    public function logout(): void
    {
        session_start();

        // erase all the $_SESSION data
        $_SESSION = array();

        session_destroy();

        // Redirection to login page
        header("Location: /login");
    }

    public function register(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupère les données du formulaire
            $firstname = $_POST["firstname"] ?? '';
            $lastname = $_POST["lastname"] ?? '';
            $username = $_POST["username"] ?? '';
            $email = $_POST["email"] ?? '';
            $password = $_POST["password"] ?? '';

            // Hashage du mot de passe
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // Génère un token unique pour l'activation du compte
            $activationToken = bin2hex(random_bytes(16));

            // Vérifie si l'email existe déjà
            if ($this->db->getOneBy("users", ['email' => $email])) {
                // L'utilisateur existe déjà
                $_SESSION["error_message"] = "Cet email est déjà pris !";
                header("Location: /register");
                return;
            }

            // Préparation des données pour l'insertion
            $userData = [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'username' => $username,
                'email' => $email,
                'password' => $hashedPassword,
                'activation_token' => $activationToken,
                'is_validated' => false, // Par défaut, le compte n'est pas validé
                'is_deleted' => false, // Par défaut, le compte n'est pas supprimé
            ];

            // Insertion de l'utilisateur dans la base de données
            if ($this->db->insert("users", $userData)) {
                $mail = new PHPMailer(true);
                try {
                    // Paramètres du serveur
                    $this->ConfigMail($mail, $email);
                    $mail->Subject = 'Activation de votre compte - Simplify';
                    $mail->Body = 'Veuillez cliquer sur ce lien pour activer votre compte : <a href="localhost/activate?token=' . $activationToken . '">Activer mon compte</a>';
                    $mail->send();

                    header("Location: /login");
                } catch (Exception $e) {
                    $_SESSION["error_message"] = "Impossible d'envoyer le mail d'activation.";
                }
            } else {
                $_SESSION["error_message"] = "Une erreur s'est produite lors de l'inscription.";
                header("Location: /register");
                exit;
            }
        } else {
            require(BASE_DIR . "/Views/Security/register_form.php");
        }
    }

    public function forgotPWD(): void
    {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
            $email = $_POST['email'];

            if ($this->db->getOneBy("users", ['email' => $email])) {
                // generate a random password
                $newPassword = bin2hex(random_bytes(8));
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // update password with the new one
                $updateSuccess = $this->db->update("users", ['email' => $email], ['password' => $hashedPassword]);

                if ($updateSuccess) {
                    // Mail config
                    $mail = new PHPMailer(true);
                    try {
                        $this->ConfigMail($mail, $email);
                        $mail->Subject = 'Nouveau mot de passe - Challenge Stack';
                        $mail->Body = 'Votre nouveau mot de passe est : ' . $newPassword . ' Veuillez le changer';
                        $mail->send();

                        $_SESSION["success_message"] = "Un nouveau mot de passe a été envoyé à votre adresse email.";
                        header("Location: /login");
                        exit;
                    } catch (Exception $e) {
                        $_SESSION["error_message"] = "Impossible d'envoyer le mail.";
                        header("Location: /forgot-password");
                        exit;
                    }
                } else {
                    $_SESSION["error_message"] = "Une erreur s'est produite lors de la mise à jour du mot de passe.";
                    header("Location: /forgot-password");
                    exit;
                }
            } else {
                $_SESSION["error_message"] = "Email inexistant !";
                header("Location: /forgot-password");
                exit;
            }
        }

        require(BASE_DIR . "/Views/Security/forgot_password.php");
    }

    public function updatePassword(): void
    {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $currentPassword = $_POST["currentPassword"] ?? '';
            $newPassword = $_POST["newPassword"] ?? '';
            $confirmPassword = $_POST["confirmPassword"] ?? '';
            $email = $_SESSION["email"] ?? '';

            if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword) || empty($email)) {
                $_SESSION["error_message"] = "Tous les champs sont requis.";
                header("Location: /users");
                exit;
            }

            if (strlen($newPassword) < 8) {
                $_SESSION["error_message"] = "Le nouveau mot de passe doit comporter au moins 8 caractères.";
                header("Location: /users");
                exit;
            }

            if ($newPassword !== $confirmPassword) {
                $_SESSION["error_message"] = "Les nouveaux mots de passe ne correspondent pas.";
                header("Location: /users");
                exit;
            }

            $user = $this->db->getOneBy("users", ['email' => $email]);

            if ($user && password_verify($currentPassword, $user['password'])) {
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $updated = $this->db->update("users", ['email' => $email], ['password' => $hashedPassword]);

                if ($updated) {
                    $_SESSION["success_message"] = "Mot de passe mis à jour avec succès.";
                } else {
                    $_SESSION["error_message"] = "Une erreur est survenue lors de la mise à jour du mot de passe.";
                }
            } else {
                $_SESSION["error_message"] = "Mot de passe actuel invalide.";
            }

            header("Location: /users");
            exit;
        }
    }

    public function activate(): void
    {
        session_start();

        if (!empty($_GET['token'])) {
            $token = $_GET['token'];

            $user = $this->db->getOneBy('users', ['activation_token' => $token]);

            if ($user) {
                // Active le compte utilisateur
                $updateSuccess = $this->db->update('users', ['activation_token' => $token], ['is_validated' => true, 'activation_token' => null]);

                if ($updateSuccess) {
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
     * @param PHPMailer $mail
     * @param mixed $email
     * @return void
     * @throws Exception
     */
    public function ConfigMail(PHPMailer $mail, mixed $email): void
    {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Mettre SMTP server pour envoyer à travers
        $mail->SMTPAuth = true; // Activer SMTP authentication
        $mail->Username = 'toma11chang@gmail.com'; // Peut-être changer par le mail exprès pour le projet
        $mail->Password = 'cxcp numx wtqr acvt'; // mot de passe de l'application (dans gmail)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Activer TLS encryption
        $mail->Port = 587; // TCP port pour connecter

        $mail->setFrom('from@ChallengeStack.com', 'Challenge Stack 1');
        $mail->addAddress($email); // ajoute le mail

        // Contenue
        $mail->isHTML(true);
    }
}
