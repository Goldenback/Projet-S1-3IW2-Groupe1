<?php

namespace App\Core;

use PDO;

/**
 * @method prepare(string $string)
 */
class DB
{

    public function __construct()
    {
    }

    function getDatabaseConnection(): PDO
    {
        $host = 'db';
        $db = 'db_name';
        $user = 'super_user_name';
        $pass = 'smth_smth';

        $dsn = "pgsql:host=$host;dbname=$db";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            return new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

}