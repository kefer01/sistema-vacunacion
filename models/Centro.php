<?php

namespace Model;

class Centro extends ActiveRecord {
    // Base de Datos
    protected static $tabla = 'centros';
    protected static $columnasDB = ['id', 'centro', 'direccion'];

    public $id;
    public $centro;
    public $direccion;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->centro = $args['centro'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
    }

    public function validar() {
        if (!$this->centro) {
            self::$alertas['error'][] = 'El centro vacunacion es Obligatorio';
        }
        if (!$this->direccion) {
            self::$alertas['error'][] = 'La direccion del centro es Obligatoria';
        }
        return self::$alertas;
    }
}
