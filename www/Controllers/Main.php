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
        if ($_SESSION["connected"]) {
            require(BASE_DIR . "/Views/Templates/Frontend/home.php");
        }
        else{
            header("Location: /login");
            exit();
        }
    }

    public function config() : void
    {
        session_start();
        if($_SESSION["connected"]){
            require(BASE_DIR . "/Views/Templates/Backend/config_form.php");
        }
    }
}