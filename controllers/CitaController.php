<?php

namespace Controllers;

use Model\Centro;
use MVC\Router;

class CitaController {

    public static function index(Router $router) {

        isAuth();
        $centros = Centro::all();
        
        $router->render('cita/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id'],
            'centros' => $centros
        ]);
    }
}
