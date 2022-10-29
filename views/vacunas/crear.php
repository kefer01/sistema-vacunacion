<h1 class="nombre-pagina">Nueva Vacuna</h1>
<p class="descripcion-pagina">Llena todos los campos para añadir una nueva vacuna</p>

<?php 
include_once __DIR__ . '/../templates/barra.php';
include_once __DIR__ . '/../templates/alertas.php'; 
?>

<h3>Registrar ingreso de nueva vacuna</h3>
<form action="/vacunas/crear" method="POST" class="formulario">
    <?php include_once __DIR__ . '/formulario.php'; ?>
    <input class="boton" type="submit" value="Guardar Vacuna">
</form>