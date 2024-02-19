<?php

namespace App\Controllers;

use App\Core\DB;
use App\Models\User;

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

            // check is email exist + get his informations
            $userData = $this->db->getOneBy("users", ['email'=> $email]);

            // Verify password if user is found
            if ($userData && password_verify($password, $userData['password'])) {
                $user = new User(
                    $userData['firstname'],
                    $userData['lastname'],
                    $userData['username'],
                    $userData['email'],
                    $userData['password'],
                    $userData['role'],
                    $userData['is_validated'],
                    $userData['is_deleted'],
                    new \DateTime($userData['created_at'])
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
                    $_SESSION['user_id'] = $user->getId();
                    $_SESSION['email'] = $user->getEmail();

                    // Redirect to home page
                    header("Location: /config");
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
        exit();
    }




}
