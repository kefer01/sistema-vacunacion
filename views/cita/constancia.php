<?php
$nombre_logo = __DIR__ . "\logoministerio.png";
$imagenBase64Min = "data:image/png;base64," . base64_encode(file_get_contents($nombre_logo));
$logoIgss = __DIR__ . "\logo-igss.png";
$imagenBase64Igss = "data:image/png;base64," . base64_encode(file_get_contents($logoIgss));
$css = __DIR__ . "\style.css";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Constancia de Vacunación</title>
    <link rel="stylesheet" href="/views/cita/style.css">
    <style>
        @import url('fonts/BrixSansRegular.css');
        @import url('fonts/BrixSansBlack.css');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        p,
        label,
        span,
        table {
            font-family: 'BrixSansRegular';
            font-size: 9pt;
        }

        .h2 {
            font-family: 'BrixSansBlack';
            font-size: 16pt;
        }

        .h3 {
            font-family: 'BrixSansBlack';
            font-size: 12pt;
            display: block;
            background: #0a4661;
            color: #FFF;
            text-align: center;
            padding: 3px;
            margin-bottom: 5px;
        }

        #page_pdf {
            width: 95%;
            margin: 15px auto 10px auto;
        }

        .textright {
            text-align: right;
        }

        .textleft {
            text-align: left;
        }

        .textcenter {
            text-align: center;
        }

        .round {
            border-radius: 10px;
            border: 1px solid #0a4661;
            overflow: hidden;
            padding-bottom: 15px;
        }

        .round p {
            padding: 0 15px;
        }

        .nota {
            font-size: 8pt;
        }

        .label_gracias {
            font-family: verdana;
            font-weight: bold;
            font-style: italic;
            text-align: center;
            margin-top: 20px;
        }


        h4 {
            text-align: center;
        }

        .encabezado {
            display: flex;
            align-items: center;
        }

        .detalle-citas {}

        .titulos {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            background-color: #e1e1e1;
        }

        .datos_cliente {
            display: flex;
            justify-content: space-around;
        }

        .datos-paciente {
            margin: 2rem 0;
        }

        .detalle-citas {
            margin: 2rem 0;
        }

        .pie-pagina {
            margin: 2rem 0;
        }

        .listaV {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
        }
    </style>
</head>

<body class="pdf">
    <div id="page_pdf">
        <div class="encabezado">
            <div>
                <img src="<?php echo $imagenBase64Min ?>">
            </div>
            <div>
                <img width="100px" height="100px" src="<?php echo $imagenBase64Igss ?>">
            </div>
            <div>
                <h4>Ministerio de Salud Publica y Asistencia Social</h4>
            </div>
        </div>
        <h4>Constancia de Vacunación contra Covid-19</h4>
        <div class="datos-paciente">
            <span class="h3">Datos del Paciente</span>
            <div class="datos_cliente">
                <div class="bloque">
                    <p>Nombre:</p>
                    <p><?php echo $usuario->nombre . $usuario->apellido; ?>
                    </p>
                    <p>Fecha de Nacimiento:</p>
                    <p><?php echo $usuario->fechanacimiento; ?></p>

                </div>
                <div class="bloque">
                    <p>DPI:</p>
                    <p><?php echo $usuario->dpi; ?></p>
                    <p><label>Dirección:</p>
                    <p><?php echo $usuario->direccion; ?></p>
                </div>
                <div class="bloque">
                    <p>Teléfono:</p>
                    <p><?php echo $usuario->telefono; ?></p>
                    <p><label>Correo:</p>
                    <p><?php echo $usuario->email; ?></p>
                </div>
            </div>
        </div>

        <div class="detalle-citas">
            <div class="titulos">
                <p>No. de Dosis</p>
                <p>Tipo de Vacuna</p>
                <p>Fecha de Vacunación</p>
                <p>Lugar de Vacunación</p>
                <p>Dirección</p>
            </div>
            <div id="detalle_productos">
                <?php
                if ($citas > 0) {
                    $i = 1;
                    foreach ($citas as $cita) {
                ?>
                        <div class="listaV">
                            <p><?php echo $i; ?></p>
                            <p><?php echo $cita->vacuna; ?></p>
                            <p><?php echo $cita->fecha; ?></p>
                            <p><?php echo $cita->centro; ?></p>
                            <p><?php echo $cita->direccion; ?></p>
                        </div>
                <?php
                        $i++;
                    }
                }
                ?>
            </div>
        </div>
        <div class="pie-pagina">
            <p class="nota">Si usted tiene preguntas sobre esta constancia, <br>pongase en contacto con nombre, teléfono y Email</p>
            <h4 class="label_gracias">¡Gracias por vacunarte y protegerte a ti y a los que te rodean!</h4>
        </div>
    </div>
</body>

</html>