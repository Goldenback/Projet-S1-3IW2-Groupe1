<?php

namespace App\Models;

use App\Core\DB;

class AboutConfig extends DB
{
    private int $id;
    private string $title;
    private string $paragraph;
    private array $images = [];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getParagraph(): string
    {
        return $this->paragraph;
    }

    /**
     * @param string $paragraph
     */
    public function setParagraph(string $paragraph): void
    {
        $this->paragraph = $paragraph;
    }

    /**
     * Get the images associated with the About entity.
     *
     * @return Image[]
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     *  Set the images associated with the About entity.
     *  This method assumes you're passing an array of Image objects.
     *
     * @param Image[] $images
     */
    public function setImages(array $images): void
    {
        $this->images = array_filter($images, function ($image) {
            return $image instanceof Image;
        });
    }

    /**
     * Add a single Image object to the About entity.
     *
     * @param Image $image
     */
    public function addImage(Image $image): void
    {
        if (!$this->imagesContains($image)) {
            $this->images[] = $image;
        }
    }

    /**
     * Check if an Image object is already associated with the About entity.
     *
     * @param Image $image
     * @return bool
     */
    private function imagesContains(Image $image): bool
    {
        foreach ($this->images as $i) {
            if ($i->getId() === $image->getId()) {
                return true;
            }
        }

        return false;
    }
}