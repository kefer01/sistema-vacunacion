<?php

namespace Model;

class Cita extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'citas';
    protected static $columnasDB = ['id','fecha','hora', 'vacunaId', 'idCentro', 'usuarioId'];

    public $id;
    public $fecha;
    public $hora;
    public $vacunaId;
    public $idCentro;
    public $usuarioId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->vacunaId = $args['vacunaId'] ?? '';
        $this->idCentro = $args['idCentro'] ?? '';
        $this->usuarioId = $args['usuarioId'] ?? '';
    }

}