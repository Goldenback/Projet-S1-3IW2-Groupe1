<?php

namespace App\Core;

use PDO;

class DB
{
    private static ?DB $instance = null;
    private PDO $connection;
    private array $tableMapping = [
        // 'NomDeLaClasse' => 'nom_de_la_table',
        'User' => 'users',
    ];

    private string $host = 'postgres';
    private string $database = 'db_name';
    private string $user = 'root';
    private string $password = 'root';

    private function __construct()
    {
        $dsn = "pgsql:host=$this->host;dbname=$this->database";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->connection = new PDO($dsn, $this->user, $this->password, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function getInstance(): ?DB
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }

    public function getOneBy(string $table, array $criteria, string $returnType = "array") {
        $sql = "SELECT * FROM " . $table . " WHERE ";
        foreach ($criteria as $column => $value) {
            $sql .= $column . "=:" . $column . " AND ";
        }
        $sql = rtrim($sql, ' AND '); // Delete the "AND"

        $stmt = $this->connection->prepare($sql);
        $stmt->execute($criteria);

        if ($returnType == "object") {
            // Note: Il faut avoir une classe correspondant au nom de la table
            // return an object of his specific class
            return $stmt->fetchObject($table);
        } else {
            // Retourne un tableau associatif par défaut
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }


}