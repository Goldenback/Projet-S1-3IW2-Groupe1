<?php

namespace App\Models;

class GlobalSettings
{
    private int $id;
    private string $name;
    private ?string $colorPrimary = null;
    private ?string $colorSecondary = null;
    private ?Font $fontPrimary = null;
    private ?Font $fontSecondary = null;
    private Template $template;

    public function __construct(string $name, ?string $colorPrimary, ?string $colorSecondary, ?Font $fontPrimary, ?Font $fontSecondary, Template $template)
    {
        $this->setName($name);
        $this->setColorPrimary($colorPrimary);
        $this->setColorSecondary($colorSecondary);
        $this->setFontPrimary($fontPrimary);
        $this->setFontSecondary($fontSecondary);
        $this->setTemplate($template);
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