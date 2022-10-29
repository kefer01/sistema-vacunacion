<div class="barra">
    <p>Hola: <?php echo $nombre ?? ''; ?></p>

    <a class="boton-eliminar" href="/logout">Cerrar Sesión</a>
</div>

<?php if (isset($_SESSION['admin'])) { ?>
    <div class="barra-servicios">
        <a href="/admin" class="boton">Ver Citas</a>
        <a href="/vacunas" class="boton">Ver Vacunas</a>
        <a href="/vacunas/crear" class="boton">Nueva Vacuna</a>
    </div>
<?php } //Fin del If 
?>