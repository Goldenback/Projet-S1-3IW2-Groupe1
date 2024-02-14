<?php

namespace App\Models;

use App\DB\Database;
use PDO;
use PDOException;

Class newsletter_subscriber {

    private Database $database;

    public function __construct(){
        $this->database = new Database();
    }

    public function addEmail(String $email) : bool
    {
        try {

            $pdo = $this->database->getDatabaseConnection();

            $stmt = $pdo->prepare("INSERT INTO newsletter_subscribers (email, subscribed_at) VALUES (:email, NOW())");

            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            // Gérer l'erreur ou la logger
            error_log($e->getMessage());
            return false;
        }
    }

    public function removeEmail(String $email) : bool
    {
        try {
            $pdo = $this->database->getDatabaseConnection();

            $stmt = $pdo->prepare("DELETE FROM newsletter_subscribers WHERE email = :email");

            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            // Gérer l'erreur ou la logger
            error_log($e->getMessage());
            return false;
        }
    }


}
