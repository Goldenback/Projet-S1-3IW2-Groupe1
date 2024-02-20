<?php

namespace App\Controllers;

class About
{
    public function __construct()
    {
        define('BASE_DIR', __DIR__ . '/..');
    }

    public function index(): void
    {
        require(BASE_DIR . "/Views/pages/about/index.php");
    }

    public function settings(): void
    {
        require(BASE_DIR . "/Views/pages/about/settings.php");
    }
}