<?php

namespace App\Models;

use App\DB\Database;

class config
{
    private ?int $id;
    private string $primary_color;
    private string $secondary_color;
    private string $isDeleted;
    private Database $pdo;

    public function __construct()
    {
        $this->pdo = new Database();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPrimaryColor(): string
    {
        return $this->primary_color;
    }

    /**
     * @param string $primary_color
     */
    public function setPrimaryColor(string $primary_color): void
    {
        $this->primary_color = $primary_color;
    }

    /**
     * @return string
     */
    public function getSecondaryColor(): string
    {
        return $this->secondary_color;
    }

    /**
     * @param string $secondary_color
     */
    public function setSecondaryColor(string $secondary_color): void
    {
        $this->secondary_color = $secondary_color;
    }

    /**
     * @return string
     */
    public function getIsDeleted(): string
    {
        return $this->isDeleted;
    }

    /**
     * @param string $isDeleted
     */
    public function setIsDeleted(string $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }


    public function getAllFonts()
    {
        $stmt = $this->pdo->query("SELECT * FROM fonts");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}