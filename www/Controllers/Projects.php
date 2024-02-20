<?php

namespace App\Controllers;

class Projects
{
    public function __construct()
    {
        define('BASE_DIR', __DIR__ . '/..');
    }

    public function index(): void
    {
        require(BASE_DIR . "/Views/pages/projects/index.php");
    }

    public function settings(): void
    {
        require(BASE_DIR . "/Views/pages/projects/settings.php");
    }
}