<?php

namespace App\Models;

use App\Core\DB;

class Home extends DB
{
    private int $id;
    private string $bgImage;
    private string $title;
    private string $paragraph;

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
    public function getBgImage(): string
    {
        return $this->bgImage;
    }

    /**
     * @param string $bgImage
     */
    public function setBgImage(string $bgImage): void
    {
        $this->bgImage = $bgImage;
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
}