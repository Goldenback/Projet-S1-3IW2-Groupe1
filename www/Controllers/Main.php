<?php

namespace App\Controllers;

use App\Models\GlobalConfig;

class Main
{

    private GlobalConfig $config;

    public function __construct()
    {
        $this->config = new GlobalConfig();
        define('BASE_DIR', __DIR__ . '/..'); //pour le dossier parent
    }

    //Attention ----> redirige vers sa vue en fonction du nom de la route
    //donc : le nom de la route doit être exactement comme le nom de son fichier !
    public function loadbackendView(): void
    {
        session_start();
        if ($_SESSION["connected"]) {
            //supprime le "/" du $_SERVER["REQUEST_URI]
            $uri = strtolower($_SERVER["REQUEST_URI"]);
            $uriView = explode('/', trim($uri, '/'));

            //conditions pour vérifier dans quel dossier il se trouve (Backend ou Frontend)
            if (file_exists(BASE_DIR . "/Views/Templates/Back-Office/" . $uriView[0] . ".php")) {
                include(BASE_DIR . "/Views/Templates/Back-Office/" . $uriView[0] . ".php");
                include(BASE_DIR . "/Views/Templates/Back-Office/sideBar.php");
            } else {
                $_SESSION["error_message"] = "Pas de vue trouvé";
                header("Location: /error");
            }
        } else {
            header("Location: /login");
        }
    }

    public function loadFrontEndView(): void
    {
        if ($_SERVER["REQUEST_URI"]) {
            //supprime le "/" du $_SERVER["REQUEST_URI]
            $uri = strtolower($_SERVER["REQUEST_URI"]);
            $uriView = explode('/', trim($uri, '/'));

            //conditions pour vérifier dans quel dossier il se trouve (Backend ou Frontend)
            if (file_exists(BASE_DIR . "/Views/Templates/Front-Office/" . $uriView[0] . ".php")) {
                include(BASE_DIR . "/Views/Templates/Front-Office/" . $uriView[0] . ".php");
            } else {
                header("Location: /error");
            }
        } else {
            header("Location: /about");
        }
    }

    public function loadDemoView(): void
    {
        if ($_SERVER["REQUEST_URI"]) {
            //supprime le "/" du $_SERVER["REQUEST_URI]
            $uri = strtolower($_SERVER["REQUEST_URI"]);
            $uriView = explode('/', trim($uri, '/'));

            //conditions pour vérifier dans quel dossier il se trouve (Backend ou Frontend)
            if (file_exists(BASE_DIR . "/Views/Templates/Demo/" . $uriView[0] . ".php")) {
                include(BASE_DIR . "/Views/Templates/Demo/" . $uriView[0] . ".php");
            } else {
                header("Location: /error");
            }
        } else {
            header("Location: /about");
        }
    }
}