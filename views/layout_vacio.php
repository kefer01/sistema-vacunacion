<?php

if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;

if (!isset($inicio))
    $inicio = false;
?>
<?php echo $contenido; ?>