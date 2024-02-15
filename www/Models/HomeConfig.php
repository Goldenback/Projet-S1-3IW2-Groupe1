<?php

namespace App\Models;

use App\Core\DB;

class HomeConfig extends DB
{
    private int $id;
    private string $title;
    private string $paragraph;
    private string $bgImageName;

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
     * @return string
     */
    public function getBgImageName(): string
    {
        return $this->bgImageName;
    }

    /**
     * @param string $bgImageName
     */
    public function setBgImageName(string $bgImageName): void
    {
        $this->bgImageName = $bgImageName;
    }
}