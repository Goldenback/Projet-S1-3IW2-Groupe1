<?php

namespace App\Controllers;

class Error
{
    public function __construct(){
        define('BASE_DIR', __DIR__ . '/..'); //pour le dossier parent
    }
    public function page404(): void
    {
        include(BASE_DIR . "/Views/Templates/Frontend/error404.php");
    }
}