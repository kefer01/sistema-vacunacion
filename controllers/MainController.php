<?php

namespace Controllers;

use Model\Centro;
use MVC\Router;

class MainController {

    public static function main(Router $router) {

        $router->render('main/index', []);
    }

    public static function blog(Router $router) {

        $router->render('main/blog', []);
    }

    public static function centros(Router $router) {
        $centros = Centro::all();
        $router->render('main/centros', [
            'centros' => $centros
        ]);
    }
}
