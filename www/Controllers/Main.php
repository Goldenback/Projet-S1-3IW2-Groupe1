<?php

namespace App\Controllers;

use App\Models\GlobalSettings;
use App\Config\Config;
use Template;

class Main
{

    private $config;

    public function __construct()
    {
        // Assurez-vous que le chemin d'accès à config.php est correct.
        // Cette ligne charge la configuration. Vous pourriez vouloir ajuster ceci pour charger une configuration spécifique en fonction de certaines conditions.
        $configPath = __DIR__ . '/../Config/config.php';
        $config = require $configPath;
        
       
        $this->config = $config['templateLight'];

        define('BASE_DIR', __DIR__ . '/../..'); // Définir le répertoire de base pour faciliter la référence aux chemins dans l'application

        // Instanciation de la classe Template avec la configuration choisie
        $template = new Template($this->config);

        // Chemin vers le fichier SCSS de variables dynamiques
        $dynamicVariablesPath = BASE_DIR . '/Front-end/Workspace/src/css/partials/_dynamic-variables.scss';

        // Génération et écriture du contenu SCSS
        $template->generateScss($dynamicVariablesPath);
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