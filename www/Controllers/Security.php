<?php

namespace App\Controllers;

use App\Core\DB;
use App\Models\User;

class Security
{
    public function __construct()
    {
        define('BASE_DIR', __DIR__ . '/..'); //pour le dossier parent
    }

    public function login(): void
    {
        // Check if the form was submitted and the request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve username and password from request data
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Get database connection
            $db = DB::getInstance()->getConnection();

            // Prepare and execute SQL query to fetch user by email
            $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $userData = $stmt->fetch();

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
}
