<?php

namespace App\Controllers;

class Template 
{
    private $scssContent;

    public function __construct($config){
        $this->scssContent = <<<SCSS
            \$primary-color: {$config['colorPrimary']};
            \$secondary-color: {$config['colorSecondary']};
            \$font-primary: '{$config['fontPrimary']}';
            \$font-secondary: '{$config['fontSecondary']}';
SCSS;
    }

    public function generateScss($path) {
        $byteWritten = null;
        echo shell_exec('ls ./Front-end/Workspace/src/css/partials/');
        $byteWritten = file_put_contents($path, $this->scssContent);
        echo shell_exec('ls ./Front-end/Workspace/src/css/partials/');
        if (!$bytesWritten) {
            echo "Erreur lors de l'écriture du fichier.";
        } else {
            echo "Fichier écrit avec succès, $bytesWritten octets écrits.";
        }
    }
}

?>
