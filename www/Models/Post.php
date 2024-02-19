<?php

namespace App\Models;

class Post
{
    private int $id;
    private ?string $title = null;
    private ?string $content = null;
    private ?string $url = null;
    private ?Image $image = null;
    private int $displayOrder;
    private \DateTime $createdAt;

    public function __construct(?string $title, ?string $content, ?string $url, ?Image $image, int $displayOrder, \DateTime $createdAt)
    {
        $this->title = $title;
        $this->content = $content;
        $this->url = $url;
        $this->image = $image;
        $this->displayOrder = $displayOrder;
        $this->createdAt = $createdAt;
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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): void
    {
        $this->image = $image;
    }

    public function getDisplayOrder(): int
    {
        return $this->displayOrder;
    }

    public function setDisplayOrder(int $displayOrder): void
    {
        $this->displayOrder = $displayOrder;
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