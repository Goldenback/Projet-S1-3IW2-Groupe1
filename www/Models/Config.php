<?php

namespace App\Models;

use App\Core\DB;

class Config extends DB
{
    protected int $id;
    protected string $colorPrimary;
    protected string $colorSecondary;
    protected ?Font $fontPrimary = null;
    protected ?Font $fontSecondary = null;

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
    public function getColorPrimary(): string
    {
        return $this->colorPrimary;
    }

    /**
     * @param string $colorPrimary
     */
    public function setColorPrimary(string $colorPrimary): void
    {
        $this->colorPrimary = $colorPrimary;
    }

    /**
     * @return string
     */
    public function getColorSecondary(): string
    {
        return $this->colorSecondary;
    }

    /**
     * @param string $colorSecondary
     */
    public function setColorSecondary(string $colorSecondary): void
    {
        $this->colorSecondary = $colorSecondary;
    }

    /**
     * @return Font|null
     */
    public function getFontPrimary(): ?Font
    {
        return $this->fontPrimary;
    }

    /**
     * @param Font|null $fontPrimary
     */
    public function setFontPrimary(?Font $fontPrimary): void
    {
        $this->fontPrimary = $fontPrimary;
    }

    /**
     * @return Font|null
     */
    public function getFontSecondary(): ?Font
    {
        return $this->fontSecondary;
    }

    /**
     * @param Font|null $fontSecondary
     */
    public function setFontSecondary(?Font $fontSecondary): void
    {
        $this->fontSecondary = $fontSecondary;
    }
}