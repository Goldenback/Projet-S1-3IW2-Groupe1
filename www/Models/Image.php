<?php

namespace App\Models;

class image
{
    private ?int $id_images;
    private string $url;
    private string $text;

    /**
     * @return int|null
     */
    public function getIdImages(): ?int
    {
        return $this->id_images;
    }

    /**
     * @param int|null $id_images
     */
    public function setIdImages(?int $id_images): void
    {
        $this->id_images = $id_images;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }
}