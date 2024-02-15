<?php

namespace App\Models;

use App\Core\DB;
use PDO;

class User
{
    private int $id;
    protected string $firstname;
    protected string $lastname;
    protected string $email;
    protected string $pwd;
    protected string $role;
    protected int $isDeleted;
    private DB $database;


    public function __construct()
    {
        $this->database = new DB();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $firstname = ucwords(strtolower(trim($firstname)));
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $lastname = strtoupper(trim($lastname));
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $email = strtolower(trim($email));
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPwd(): string
    {
        return $this->pwd;
    }

    /**
     * @param $email
     * @param $newPassword
     * @param null $oldPassword
     * @return bool
     */
    public function setPwd($email, $newPassword, $oldPassword = null): bool
    {
        $pdo = $this->database->getDatabaseConnection();

        // Si l'ancien mot de passe est présent, on le valide d'abord
        if ($oldPassword !== null) {
            $stmt = $pdo->prepare("SELECT pwd FROM users WHERE email = ?");
            $stmt->bindParam(1, $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch();
            // Vérification
            if ($user && !password_verify($oldPassword, $user['pwd'])) {
                return false; // Mot de passe incorrect
            }
        }

        // Hash le nouveau mdp
        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // MaJ du mdp dans la bdd
        $updateStmt = $pdo->prepare("UPDATE users SET pwd = ? WHERE email = ?");
        $updateStmt->bindParam(1, $hashedNewPassword, PDO::PARAM_STR);
        $updateStmt->bindParam(2, $email, PDO::PARAM_STR);

        return $updateStmt->execute(); // True si la maJ est effectué
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    /**
     * @return bool
     */
    public function isDeleted(): int
    {
        return $this->isDeleted;
    }

    /**
     * @param bool $isDeleted
     */
    public function setIsDeleted(int $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }


    public function authenticateUser(string $email, string $password): bool
    {

        $pdo = $this->database->getDatabaseConnection();

        $stmt = $pdo->prepare("SELECT pwd FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user) {
            return password_verify($password, $user['pwd']);
        }

        return false;
    }

    public function createUser(string $firstname, string $lastname, string $email, string $password, string $role, string $ActivationToken): bool
    {
        $pdo = $this->database->getDatabaseConnection();

        $stmt = $pdo->prepare("INSERT INTO users (Firstname, Lastname, email, pwd, Role, is_validated, created_at, updated_at, deleted_at, token) VALUES (?, ?, ?, ?, ?, FALSE, NOW(), NULL, NULL, ?)");
        return $stmt->execute([$firstname, $lastname, $email, $password, $role, $ActivationToken]);
    }

    public function EmailExists(string $email): bool
    {
        $pdo = $this->database->getDatabaseConnection();

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->bindParam(1, $email, PDO::PARAM_STR); // Use 1 for the first parameter, and PDO::PARAM_STR for a string
        $stmt->execute();

        // Get the results
        $result = $stmt->fetch();

        // Check if the email exists
        return $result[0] > 0;
    }


    // Validation d'un compte à sa création
    public function isTokenValid(string $token): bool //vérifie le token
    {
        $pdo = $this->database->getDatabaseConnection();
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE token = :token");
        $stmt->execute(['token' => $token]);
        return $stmt->fetchColumn() > 0;
    }

    public function activateUser(string $token): bool //active l'utilisateur
    {
        $pdo = $this->database->getDatabaseConnection();
        $stmt = $pdo->prepare("UPDATE users SET is_validated = TRUE, token = NULL WHERE token = :token");
        $stmt->execute(['token' => $token]);
        return $stmt->rowCount() > 0;
    }

    public function is_Validated($email): bool  //vérifie si il est activé
    {
        // Assurez-vous de sécuriser la valeur de l'e-mail
        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

        // Requête SQL pour vérifier si le compte est activé
        $pdo = $this->database->getDatabaseConnection();

        $stmt = $pdo->prepare("SELECT is_validated FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        // Récupère le résultat de la requête
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifie si le compte est activé
        if ($result && $result['is_validated'] == 'true') {
            return true;
        } else {
            return false;
        }
    }


}