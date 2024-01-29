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

    //redirige vers sa vue en fonction du nom de la route
    //ps : le nom du "ex : /dashboard" doit être exactement comme le nom de son fichier
    public function loadBackendView() : void
    {
        session_start();
        if($_SESSION["connected"]){
            //supprime le "/" du $_SERVER["REQUEST_URI]
            $uri = strtolower($_SERVER["REQUEST_URI"]);
            $uriView = explode('/', trim($uri, '/'));

            if(file_exists(BASE_DIR . "/Views/Templates/Backend/" .$uriView[0].".php")){
                include(BASE_DIR . "/Views/Templates/Backend/navBar.php");
                include(BASE_DIR . "/Views/Templates/Backend/" .$uriView[0].".php");
            }
            else{
                print $_SESSION["error_message"] = "Pas de vue trouvé";
                header("Location: /error");
            }
        }
        else{
            $_SESSION["error_message"] = "Veuillez-vous connecter";
            header("Location: /login");
        }
    }

    public function contact() : void
    {
        session_start();
        if($_SESSION["connected"]){
            include(BASE_DIR . "/Views/Templates/Frontend/contact.php");
        }
    }
}