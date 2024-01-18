<?php

namespace App\Controllers;

use App\Models\config;

class Main
{

    private config $config;

    public function __construct()
    {
        $this->config = new config();
        define('BASE_DIR', __DIR__ . '/..'); //pour le dossier parent
    }
    public function home(): void
    {
        session_start();
        if($_SESSION["connected"]){
            echo "Home";
            require(BASE_DIR . "/Views/Templates/Home.php");
        }
    }

    public function getfonts(): array
    {
        return $this->config->getAllFonts();
    }
}