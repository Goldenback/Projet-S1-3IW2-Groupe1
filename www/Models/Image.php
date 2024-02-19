<?php

namespace App\Models;
class Image
{
    private int $id;
    private string $filename;
    private string $description;
    private \DateTime $createdAt;

    public function __construct(string $filename, string $description, \DateTime $createdAt)
    {
        $this->filename = $filename;
        $this->description = $description;
        $this->createdAt = $createdAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): void
    {
        $this->filename = $filename;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}