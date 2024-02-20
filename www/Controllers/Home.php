<?php

namespace App\Controllers;

class Home
{
    public function __construct()
    {
        define('BASE_DIR', __DIR__ . '/..');
    }

    public function index(): void
    {
        require(BASE_DIR . "/Views/pages/home/index.php");
    }

    public function settings(): void
    {
        require(BASE_DIR . "/Views/pages/home/settings.php");
    }
}