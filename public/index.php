<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\APIController;
use Controllers\CitaController;
use Controllers\LoginController;
use Controllers\MainController;
use Controllers\ServicioController;
use Controllers\UsuarioController;
use Controllers\VacunaController;
use MVC\Router;

$router = new Router();

// Pagina Main
$router->get('/', [MainController::class, 'main']);
// Pagina Blog
$router->get('/blog', [MainController::class, 'blog']);
// Pagina Blog
$router->get('/centros', [MainController::class, 'centros']);

// Iniciar Sesion
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Recuperar Password
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);

// Crear cuenta
$router->get('/crear-cuenta', [LoginController::class, 'crear']);
$router->post('/crear-cuenta', [LoginController::class, 'crear']);

// Confirmar cuenta
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);

// Area privada
$router->get('/cita', [CitaController::class, 'index']);
$router->get('/cita/constancia', [CitaController::class, 'generarPDF']);
$router->get('/admin', [AdminController::class, 'index']);

// Usuario
$router->get('/usuario/index', [UsuarioController::class, 'index']);

// API de Citas
$router->get('/api/servicios', [APIController::class, 'index']);
$router->post('/api/citas', [APIController::class, 'guardar']);
$router->post('/api/eliminar', [APIController::class, 'eliminar']);

// CRUD de Servicios
$router->get('/vacunas', [VacunaController::class, 'index']);
$router->get('/vacunas/crear', [VacunaController::class, 'crear']);
$router->post('/vacunas/crear', [VacunaController::class, 'crear']);
$router->get('/vacunas/actualizar', [VacunaController::class, 'actualizar']);
$router->post('/vacunas/actualizar', [VacunaController::class, 'actualizar']);
$router->post('/vacunas/eliminar', [VacunaController::class, 'eliminar']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
