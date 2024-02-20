<?php

namespace App\Models;

class ContactSettings
{
    private int $id;
    private ?string $title = null;
    private ?string $content = null;
    private string $email;

    public function __construct(?string $title, ?string $content, string $email)
    {
        $this->setTitle($title);
        $this->setContent($content);
        $this->setEmail($email);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}