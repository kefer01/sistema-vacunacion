<?php
$auth = $_SESSION['login'] ?? false;
?>
<!DOCTYPE html>
<html lang="es-419">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Vacunas</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <header class="header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <div class="izquierda">
                    <a href="/">
                        <img src="/build/img/logo-igss.png" alt="Logotipo IGSS">
                    </a>
                    <h1>Vacunate</h1>
                </div>
                <div class="mobile-menu">
                    <img class="menu-hamburguesa" src="/build/img/menu-hamburguesa.png" alt="">
                </div>
                <div class="derecha">
                    <nav class="navegacion ver">
                        <a href="/cita">Registro</a>
                        <a href="/centros">Centros de Vacunación</a>
                        <a href="/blog">Blog</a>
                        <?php if (!$auth) { ?>
                            <a href="/login">Iniciar Sesión</a>
                        <?php } else { ?>
                            <a href="/usuario/index">Perfil</a>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php } ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="contenedor-app">
        <div class="app">
            <?php echo $contenido; ?>
        </div>
    </div>

    <footer class="footer">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/cita">Registro</a>
                <a href="/centros">Centros de Vacunación</a>
                <a href="/blog">Blog</a>
                <?php if ($auth) { ?>
                    <a href="/usuario/index">Perfil</a>
                <?php } ?>
            </nav>
        </div>
        <p class="copyright">Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>
    <script src="/build/js/menuHamburguesa.js"></script>                
    <?php
    echo $script ?? '';
    ?>

</body>

</html>