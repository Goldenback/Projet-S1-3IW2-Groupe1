<?php

namespace App\Models;

class Font
{
    private int $id;
    private string $name;
    private string $url;

    public function __construct(string $name, string $url)
    {
        $this->setName($name);
        $this->setUrl($url);
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

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}