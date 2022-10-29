<?php

namespace Model;

class Usuario extends ActiveRecord {
    // Base de datos 
    protected static $tabla = 'usuarios';
    protected static $columnasDB = [
        'id', 'dpi', 'nombre', 'apellido', 'afiliacion', 'email', 'telefono', 'direccion', 'generoId', 'fechanacimiento', 'vacunas', 'admin', 'rolId', 'confirmado', 'token','password',
    ];

    public $id;
    public $dpi;
    public $nombre;
    public $apellido;
    public $afiliacion;
    public $email;
    public $telefono;
    public $direccion;
    public $generoId;
    public $fechanacimiento;
    public $vacunas;
    public $admin;
    public $rolId;
    public $confirmado;
    public $token;
    public $password;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->dpi = $args['dpi'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->afiliacion = $args['afiliacion'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->generoId = $args['generoId'] ?? '';
        $this->fechanacimiento = $args['fechanacimiento'] ?? '';
        $this->vacunas = $args['vacunas'] ?? 0;
        $this->admin = $args['admin'] ?? '0';
        $this->rolId = $args['rolId'] ?? '1';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    // Mensajes de validación para la creacion de una cuenta
    public function validarNuevaCuenta() {
        if (!$this->dpi) {
            self::$alertas['error'][] = 'El DPI es Obligatorio';
        }
        if (strlen($this->dpi) < 13) {
            self::$alertas['error'][] = 'El DPI debe tener al menos 13 caracteres';
        }
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if (!$this->apellido) {
            self::$alertas['error'][] = 'El Apellido es Obligatorio';
        }
        if (!$this->email) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if (!$this->telefono) {
            self::$alertas['error'][] = 'El Teléfono es Obligatorio';
        }
        if (strlen($this->telefono) < 8) {
            self::$alertas['error'][] = 'El Teléfono debe tener al menos 8 caracteres';
        }
        if (!$this->direccion) {
            self::$alertas['error'][] = 'La Dirección es Obligatoria';
        }
        // if (!$this->generoId) {
        //     self::$alertas['error'][] = 'El Género es Obligatorio';
        // }
        if (!$this->fechanacimiento) {
            self::$alertas['error'][] = 'La Fecha de Nacimiento es Obligatoria';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'El Password es Obligatorio';
        }
        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'El Password debe contener al menos 6 caracteres';
        }

        return self::$alertas;
    }

    public function validarLogin() {
        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'El password es obligatorio';
        }

        return self::$alertas;
    }

    public function validarEmail() {
        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        return self::$alertas;
    }

    public function validarPassword() {
        if (!$this->password) {
            self::$alertas['error'][] = 'El password es obligatorio';
        }
        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'El password debe tener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    // Revisa si el usuario ya existe
    public function existeUsuario() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El Usuario ya esta registrado';
        }
        return $resultado;
    }

    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken() {
        $this->token = uniqid();
    }

    public function comprobarPasswordAndVerificado($password) {
        $resultado = password_verify($password, $this->password);

        if (!$resultado || !$this->confirmado) {
            self::$alertas['error'][] = 'Password Incorrecto o tu cuenta no ha sido confirmada';
        } else {
            return true;
        }
    }
}
