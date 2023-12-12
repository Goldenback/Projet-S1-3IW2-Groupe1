<?php

namespace App\Controllers;

class Error
{
    public function page404(): void
    {
        echo "Page 404";
        http_response_code(404);
    }
}