<?php

namespace App\Controllers;

use App\Models\User;

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

            // Vérifiez l'authentification
            if ($this->User->authenticateUser($email, $password)) {
                session_start();
                $_SESSION["connected"] = true;
                header("Location: /Config");
                exit();

            } else {
                // Authentification échouée, affiche un message d'erreur
                echo "Authentification échouée. Veuillez réessayer.";
            }
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
        echo "Formulaire d'inscription : ";

        // Vérifie si le formulaire a été envoyé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupère les données
            $firstname = $_POST["firstname"] ?? '';
            $lastname = $_POST["lastname"] ?? '';
            $email = $_POST["email"] ?? '';
            $password = $_POST["password"] ?? '';
            $role = 'user';

            // pour hacher le mot de passe
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            //ajoute dans la bdd
            if ($this->User->createUser($firstname, $lastname, $email, $hashedPassword, $role)) {
                header("Location: /login");
                exit();
            } else {
                echo "Erreur lors de l'inscription | réessayer";
            }
        }

        require(BASE_DIR . "/Views/Security/register_form.php");
    }
}
