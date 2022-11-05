<?php

namespace Controllers;

use Model\Centro;
use MVC\Router;
use Dompdf\Dompdf;
use Model\PdfCita;
use Model\Usuario;

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

    public static function generarPDF(Router $router) {

        if (empty($_SESSION['id']) || empty($_SESSION['nombre'])) {
            echo "No es posible generar la constancia de Vacunación.";
        } else {
            $id = $_SESSION['id'];
            $usuario = Usuario::find($id);

            // Consultar la base de datos
            $consulta = "SELECT citas.id, citas.hora, citas.fecha, vacunas.nombre AS vacuna, centros.centro, centros.direccion";
            $consulta .= " FROM citas";
            $consulta .= " LEFT OUTER JOIN usuarios  ON citas.usuarioId=usuarios.id";
            $consulta .= " LEFT OUTER JOIN vacunas  ON vacunas.id = citas.vacunaId";
            $consulta .= " LEFT OUTER JOIN centros ON citas.idCentro=centros.id";
            $consulta .= " WHERE usuarios.id =  '${id}' ";
            $citas = PdfCita::SQL($consulta);
            // debuguear($citas);

            ob_start();

            include('../views/cita/constancia.php');
            $html = ob_get_clean();

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();

            $dompdf->loadHtml($html);
            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('letter', 'portrait');
            ob_get_clean();
            // Render the HTML as PDF
            $dompdf->render();
            // Output the generated PDF to Browser
            $dompdf->stream('constancia_' . $usuario->nombre . $usuario->apellido . '.pdf', array('Attachment' => 0));
            exit;
        }

        $router->renderSinVista('/cita/constancia', [
            'usuario' => $usuario,
            'citas' => $citas
        ]);
    }
}
