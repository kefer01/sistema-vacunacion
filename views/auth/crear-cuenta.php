<h1 class="nombre-pagina">Crear cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>

<?php
include_once __DIR__ . "/../templates/alertas.php";
?>

<form action="/crear-cuenta" class="formulario" method="POST">
    <div class="campo">
        <label for="dpi">No. DPI</label>
        <input type="number" name="dpi" id="dpi" placeholder="Tu DPi" value="<?php echo s($usuario->dpi); ?>">
    </div>
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre" value="<?php echo s($usuario->nombre); ?>">
    </div>
    <div class="campo">
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" id="apellido" placeholder="Tu Apellido" value="<?php echo s($usuario->apellido); ?>">
    </div>
    <div class="campo">
        <label for="afiliacion">Afiliación</label>
        <input type="number" name="afiliacion" id="afiliacion" placeholder="Tu Afiliación" value="<?php echo s($usuario->afiliacion); ?>">
    </div>
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Tu Email" value="<?php echo s($usuario->email); ?>">
    </div>
    <div class="campo">
        <label for="telefono">Teléfono</label>
        <input type="tel" name="telefono" id="telefono" placeholder="Tu Teléfono" value="<?php echo s($usuario->telefono); ?>">
    </div>
    <div class="campo">
        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" id="direccion" placeholder="Tu Dirección" value="<?php echo s($usuario->direccion); ?>">
    </div>
    <div class="campo">
        <label for="generoId">Género</label>
        <select name="generoId" id="generoId">
            <option value="">-- Seleccione --</option>
            <?php foreach ($genero as $gen) : ?>
                <option <?php echo $usuario->generoId === $gen->id ? 'selected' : ''; ?> value="<?php echo s($gen->id); ?>"><?php echo s($gen->nombre); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="campo">
        <label for="vacunas">Vacunas</label>
        <input type="number" name="vacunas" id="vacunas" placeholder="Tu Vacunas" value="<?php echo s($usuario->vacunas); ?>" min="0">
    </div>
    <div class="campo">
        <label for="fechanacimiento">Fecha de Nacimiento</label>
        <input type="date" name="fechanacimiento" id="fechanacimiento" value="<?php echo s($usuario->fechanacimiento); ?>" max="<?php echo edadValida(); ?>">
    </div>
    <div class="campo">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Tu Password">
    </div>

    <input type="submit" value="Crear cuenta" class="boton">
</form>

<div class="acciones">
    <a href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/olvide">¿Olvidaste tu password?</a>
</div>