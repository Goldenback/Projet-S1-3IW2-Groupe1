<?php

namespace App\Models;
use App\Core\DB;

class User extends DB
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $username;
    private string $email;
    private string $password;
    private string $role;
    private bool $isValidated;
    private bool $isDeleted;
    private \DateTime $createdAt;
    private string $activation_token;

    public function __construct(
        string    $firstname,
        string    $lastname,
        string    $username,
        string    $email,
        string    $password,
        string    $role,
        bool      $isValidated,
        bool      $isDeleted,
        \DateTime $createdAt,
        string $activation_token
    )
    {
        $this->setFirstname($firstname);
        $this->setLastname($lastname);
        $this->setUsername($username);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setRole($role);
        $this->setIsValidated($isValidated);
        $this->setIsDeleted($isDeleted);
        $this->setCreatedAt($createdAt);
        $this->setactivation_token($activation_token);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function isValidated(): bool
    {
        return $this->isValidated;
    }

    public function setIsValidated(bool $isValidated): void
    {
        $this->isValidated = $isValidated;
    }

    public function isDeleted(): bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(bool $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getActivation_token(): string
    {
        return $this->activation_token;
    }

    public function setActivation_token(string $token): void
    {
        $this->activation_token = $token;
    }
}