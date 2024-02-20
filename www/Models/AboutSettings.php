<?php

namespace App\Models;

class AboutSettings
{
    private int $id;
    private ?string $title = null;
    private ?string $content = null;
    private ?Image $image1 = null;
    private ?Image $image2 = null;
    private ?Image $image3 = null;
    private ?Image $image4 = null;

    public function __construct(?string $title, ?string $content, ?Image $image1, ?Image $image2, ?Image $image3, ?Image $image4)
    {
        $this->setTitle($title);
        $this->setContent($content);
        $this->setImage1($image1);
        $this->setImage2($image2);
        $this->setImage3($image3);
        $this->setImage4($image4);
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

    public function getImage1(): ?Image
    {
        return $this->image1;
    }

    public function setImage1(?Image $image1): void
    {
        $this->image1 = $image1;
    }

    public function getImage2(): ?Image
    {
        return $this->image2;
    }

    public function setImage2(?Image $image2): void
    {
        $this->image2 = $image2;
    }

    public function getImage3(): ?Image
    {
        return $this->image3;
    }

    public function setImage3(?Image $image3): void
    {
        $this->image3 = $image3;
    }

    public function getImage4(): ?Image
    {
        return $this->image4;
    }

    public function setImage4(?Image $image4): void
    {
        $this->image4 = $image4;
    }
}