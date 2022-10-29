<?php

function debuguear($variable): string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html): string {
    $s = htmlspecialchars($html);
    return $s;
}

function esUltimo(string $actual, string $proximo): bool {
    if ($actual !== $proximo) {
        return true;
    }
    return false;
}

// Funcion que valida si la sesion esta iniciada
function iniciaSesion() {
    if (!isset($_SESSION)) {
        session_start();
    }
}

// Funcion que revisa que el usuario este autenticado

function isAuth(): void {
    if (!isset($_SESSION['login'])) {
        header('Location: /');
    };
}

function isAdmin(): void {
    if (!isset($_SESSION['admin'])) {
        header('Location: /');
    }
}

// Funcion que permite validar la edad minima(18 años)
function edadValida(): string {
    $fecha_actual = date("Y-m-d");
    //Se le resta la cantidad de años
    $fechaValida = date("Y-m-d",strtotime($fecha_actual."- 18 year"));
    return $fechaValida;
}
