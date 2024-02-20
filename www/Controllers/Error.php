<?php

namespace App\Controllers;

class Error
{
    public function error404(): void
    {
        http_response_code(404);
        echo "Erreur 404 - Page non trouvée <br> <a href='/home'>Retour à l'accueil</a>";
    }
}