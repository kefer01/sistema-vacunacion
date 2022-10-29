<h1 class="nombre-pagina">Panel de Administracion</h1>

<?php
include_once __DIR__ . '/../templates/barra.php';
?>
<h2>Buscar Citas</h2>
<div class="busqueda">
    <form action="" class="formulario">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" value="<?php echo $fecha; ?>">
        </div>
    </form>
</div>

<?php if (count($citas) === 0) {
    echo "<h2>No Hay Citas en esta fecha</h2>";
} ?>

<div id="citas-admin">
    <div class="citas">
        <?php
        foreach ($citas as $key => $cita) : ?>
            <div>
                <p>ID: <span><?php echo $cita->id ?></span></p>
                <p>Hora: <span><?php echo $cita->hora ?></span></p>
                <p>Cliente: <span><?php echo $cita->cliente ?></span></p>
                <p>Email: <span><?php echo $cita->email ?></span></p>
                <p>Teléfono: <span><?php echo $cita->telefono ?></span></p>
                <p>Vacuna: <span><?php echo $cita->vacuna ?></span></p>
                <div class="botones-form">
                    <form action="/api/eliminar" method="POST">
                        <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                        <input type="submit" value="Eliminar" class="boton-eliminar">
                    </form>
                    <form action="/api/actualizar" method="POST">
                        <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                        <input type="submit" value="Finalizar" class="boton-actualizar">
                    </form>
                </div>
            </div>
        <?php
        endforeach; //Fin de Foreach 
        ?>
    </div>
</div>

<?php
$script = "<script src='build/js/buscador.js'></script>";
?>