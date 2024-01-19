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
            require(BASE_DIR . "/Views/Templates/Home.php");
        }
        else{
            echo "Veuillez-vous connecter";
        }
    }

    public function getfonts(): array
    {
        return $this->config->getAllFonts();
    }

    public function config() : void
    {
        session_start();
        if($_SESSION["connected"]){
            require(BASE_DIR . "/Views/Templates/config_form.php");
        }
    }
}