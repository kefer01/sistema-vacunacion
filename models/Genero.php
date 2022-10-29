<?php

namespace Model;

class Genero extends ActiveRecord {
    // Bade de Datos
    protected static $tabla = 'genero';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;


    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }

    public function validar() {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El Género es Obligatorio';
        }
        return self::$alertas;
    }
}
