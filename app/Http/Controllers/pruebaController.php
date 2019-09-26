<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class pruebaController extends Controller
{
    public function prueba($name)
    {
        return 'Estamos dentro del controllador ' .$name;
    }
}
