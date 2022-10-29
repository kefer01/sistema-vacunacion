<h1 class="nombre-pagina">Panel de Servicios</h1>
<p class="descripcion-pagina">Administración de Vacunas</p>

<?php include_once __DIR__ . '/../templates/barra.php'; ?>

<h3>Vacunas disponibles</h3>
<div class="servicios">
    <?php foreach ($vacunas as $vacuna) { ?>
        <div class="vacuna-index">
            <div>
                <p>Nombre: <span><?php echo $vacuna->nombre; ?></span></p>
                <p>Cantidad: <span><?php echo $vacuna->cantidad; ?></span></p>
            </div>
            <div class="acciones">
                <a class="boton-actualizar" href="/vacunas/actualizar?id=<?php echo $vacuna->id; ?>">Actualizar</a>
                <form action="/vacunas/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $vacuna->id; ?>">
                    <input type="submit" value="Borrar" class="boton-eliminar">
                </form>
            </div>
        </div>
    <?php } ?>
</div>