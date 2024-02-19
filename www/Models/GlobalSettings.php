<?php

namespace App\Models;

class GlobalSettings
{
    private int $id;
    private string $name;
    private ?string $colorPrimary = null;
    private ?string $colorSecondary = null;
    private ?string $fontPrimary = null;
    private ?string $fontSecondary = null;
    //private ?string $templateConfig;

    public function __construct($template)
    {
        $this->name = $template['name'];
        $this->colorPrimary = $template['colorPrimary'];
        $this->colorSecondary = $template['colorSecondary'];
        $this->fontPrimary = $template['fontPrimary'];
        $this->fontSecondary = $template['fontSecondary'];
        //$this->template = $templateConfig;
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

    public function getColorPrimary(): ?string
    {
        return $this->colorPrimary;
    }

    public function setColorPrimary(?string $colorPrimary): void
    {
        $this->colorPrimary = $colorPrimary;
    }

    public function getColorSecondary(): ?string
    {
        return $this->colorSecondary;
    }

    public function setColorSecondary(?string $colorSecondary): void
    {
        $this->colorSecondary = $colorSecondary;
    }

    public function getFontPrimary(): ?Font
    {
        return $this->fontPrimary;
    }

    public function setFontPrimary(?Font $fontPrimary): void
    {
        $this->fontPrimary = $fontPrimary;
    }

    public function getFontSecondary(): ?Font
    {
        return $this->fontSecondary;
    }

    public function setFontSecondary(?Font $fontSecondary): void
    {
        $this->fontSecondary = $fontSecondary;
    }

    public function getTemplate(): Template
    {
        return $this->template;
    }

    public function setTemplate(Template $template): void
    {
        $this->template = $template;
    }
}