<?php
/*ini_set('display_errors', 1);
error_reporting(E_ALL);*/

// Charger la configuration du template
$config = require  __DIR__ . '/../Config/Config.php';



class Template 
{
    public function __construct($config){

        $scssContent = <<<SCSS
        \$primary-color: {$config['primaryColor']};
        \$secondary-color: {$config['secondaryColor']};
        SCSS;
        $dynamicVariablesPath = __DIR__ . '/../../Front-end/Workspace/src/css/partials/_dynamic-variables.scss';
    } 
}

// Chemin vers le fichier SCSS de variables dynamiques


// Écrire les variables dans le fichier

$bytesWritten = file_put_contents($dynamicVariablesPath, $scssContent);
if ($bytesWritten === false) {
    echo "Erreur lors de l'écriture du fichier.";
} else {
    echo "Fichier écrit avec succès, $bytesWritten octets écrits.";
}
?>
