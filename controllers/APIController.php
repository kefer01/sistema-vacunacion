<?php

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Vacuna;

class APIController {

    public static function index() {
        $vacunas = Vacuna::all();
        // debuguear($vacunas);
        echo json_encode($vacunas);
    }

    public static function guardar() {

        // Almacena la Cita y devuelve el ID
        $cita = new Cita($_POST);

        $resultado = $cita->guardar();
        // Retornamos una respuesta
        echo json_encode(['resultado' => $resultado]);
    }

    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $cita = Cita::find($id);
            $cita->eliminar();
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }
}
