<?php

namespace App\Core;

use PDO;

class DB
{
    private static ?DB $instance = null;
    private PDO $connection;

    private string $host = 'postgres';
    private string $database = 'db_name';
    private string $user = 'root';
    private string $password = 'root';
    private static array $tableMapping = [
        //table name => class name
        'users' => \App\Models\User::class,
    ];

    public function __construct()
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
        $sql = rtrim($sql, ' AND ');
    
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($criteria);
    
        if ($returnType == "object") {
            return $stmt->fetchObject($this->getClassNameFromTable($table));
        } else {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
    
    public function insert(string $table, array $data): bool {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
    
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders);";
        $stmt = $this->connection->prepare($sql);
    
        foreach ($data as $key => &$value) {
            // converti les bool
            if (is_bool($value)) {
                $value = $value ? 't' : 'f'; // PostgreSQL accepte 't' et 'f' comme valeurs booléennes
            }
            $stmt->bindParam(":$key", $value);
        }
    
        return $stmt->execute();
    }
    
    public function update(string $table, array $criteria, array $data): bool {
        $sql = "UPDATE " . $table . " SET ";
        $updates = [];
        foreach ($data as $key => $value) {
            $updates[] = "$key = :$key";
        }
        $sql .= implode(', ', $updates);
        $sql .= " WHERE ";
        foreach ($criteria as $key => $value) {
            $sql .= "$key = :$key AND ";
        }
        $sql = rtrim($sql, ' AND ');
    
        $stmt = $this->connection->prepare($sql);
        $result = $stmt->execute(array_merge($data, $criteria));
    
        return $result;
    }

    private function getClassNameFromTable(string $table): string {
        if (array_key_exists($table, self::$tableMapping)) {
            return self::$tableMapping[$table];
        } else {
            throw new \Exception("Aucune classe trouvée pour la table '{$table}'.");
        }
    }
    
    
}