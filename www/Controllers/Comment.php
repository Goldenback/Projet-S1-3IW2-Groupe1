<?php

namespace App\Controllers;

class Comment
{
    public function __construct()
    {
        define('BASE_DIR', __DIR__ . '/..');
    }

    public function index(): void
    {
        require(BASE_DIR . "/Views/pages/comment/index.php");
    }
}