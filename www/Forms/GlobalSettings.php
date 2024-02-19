<?php

namespace App\Forms;
class GlobalSettings
{

    public function __construct(){

    }

    public function getConfig($fontOptions): array
    {
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>"",
                "class"=>"form",
                "id"=>"form-update",
                "submit"=>"update",
                "error"=>"Erreurs"
            ],
            "inputs"=>[
                "colorPrimary"=>[
                    "type"=>"text",
                    "id"=>"form-update-colorPrimary",
                    "required"=>false,
                    "placeholder"=>"New color",
                    "class"=>"form-input",
                ],
                "colorSecondary"=>[
                    "type"=>"text",
                    "id"=>"form-update-colorSecondary",
                    "required"=>false,
                    "placeholder"=>"New color",
                    "class"=>"form-input",
                ],
                "fontPrimary"=>[
                    "type"=>"select",
                    "id"=>"form-update-fontPrimary",
                    "required"=>false,
                    "placeholder"=>"Name of the font"
                    "class"=>"form-input",
                    "options"=>$fontOptions,
                ],
                "fontSecondary"=>[
                    "type"=>"select",
                    "id"=>"form-update-fontSecondary",
                    "required"=>false,
                    "placeholder"=>"Name of the font"
                    "class"=>"form-input",
                    "options"=>$fontOptions,
                ],
            ]
        ]
    }
}