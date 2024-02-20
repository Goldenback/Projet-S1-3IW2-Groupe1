<?php

namespace App\Controllers;

class User
{
    public function __construct()
    {
        define('BASE_DIR', __DIR__ . '/..');
    }

    public function index(): void
    {
        require(BASE_DIR . "/Views/pages/user/index.php");
    }

    public function show(): void
    {
        require(BASE_DIR . "/Views/pages/user/show.php");
    }
}