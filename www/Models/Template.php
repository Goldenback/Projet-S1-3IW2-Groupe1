<?php

namespace App\Models;

class Template
{
    private int $id;
    private string $name;

    public function __construct(string $name)
    {
        $this->setName($name);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}