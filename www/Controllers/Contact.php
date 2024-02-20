<?php

namespace App\Controllers;

class Contact
{
    public function __construct()
    {
        define('BASE_DIR', __DIR__ . '/..');
    }

    public function index(): void
    {
        require(BASE_DIR . "/Views/pages/contact/index.php");
    }

    public function settings(): void
    {
        require(BASE_DIR . "/Views/pages/contact/settings.php");
    }
}