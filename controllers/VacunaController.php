<?php

namespace Controllers;

use Model\Vacuna;
use MVC\Router;

class VacunaController {

    public static function index(Router $router) {
        iniciaSesion();
        isAdmin();
        $vacunas = Vacuna::all();

        $router->render('vacunas/index', [
            'nombre' => $_SESSION['nombre'],
            'vacunas' => $vacunas
        ]);
    }

    public static function crear(Router $router) {
        iniciaSesion();
        isAdmin();
        $vacuna = new Vacuna;
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vacuna->sincronizar($_POST);
            // debuguear($vacuna);
            $alertas = $vacuna->validar();

            if (empty($alertas)) {
                $vacuna->guardar();
                header('Location: /vacunas');
            }
        }

        $router->render('vacunas/crear', [
            'nombre' => $_SESSION['nombre'],
            'vacuna' => $vacuna,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router) {
        iniciaSesion();
        isAdmin();
        if (!is_numeric($_GET['id'])) return;
        $vacuna = Vacuna::find($_GET['id']);
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vacuna->sincronizar($_POST);

            $alertas = $vacuna->validar();

            if (empty($alertas)) {
                $vacuna->guardar();
                header('Location: /vacunas');
            }
        }

        $router->render('vacunas/actualizar', [
            'nombre' => $_SESSION['nombre'],
            'vacuna' => $vacuna,
            'alertas' => $alertas
        ]);
    }

    public static function eliminar() {
        iniciaSesion();
        isAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            $vacuna = Vacuna::find($id);
            $vacuna->eliminar();
            header('Location: /vacunas');
        }
    }
}
