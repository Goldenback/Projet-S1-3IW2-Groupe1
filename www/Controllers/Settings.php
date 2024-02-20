<?php

namespace App\Controllers;

class Settings
{
    public function __construct()
    {
        define('BASE_DIR', __DIR__ . '/..');
    }

    public function globalSettings(): void
    {
        require(BASE_DIR . "/Views/pages/global/settings.php");
    }

    public function homeSettings(): void
    {
        require(BASE_DIR . "/Views/pages/home/settings.php");
    }

    public function aboutSettings(): void
    {
        require(BASE_DIR . "/Views/pages/about/settings.php");
    }

    public function projectSettings(): void
    {
        require(BASE_DIR . "/Views/pages/projects/settings.php");
    }

    public function contactSettings(): void
    {
        require(BASE_DIR . "/Views/pages/contact/settings.php");
    }

}