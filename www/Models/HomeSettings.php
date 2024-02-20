<?php

namespace App\Models;

class HomeSettings
{
    private int $id;
    private ?string $title = null;
    private ?string $content = null;
    private ?Image $image = null;

    public function __construct(?string $title, ?string $content, ?Image $image)
    {
        $this->setTitle($title);
        $this->setContent($content);
        $this->setImage($image);
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

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): void
    {
        $this->image = $image;
    }
}