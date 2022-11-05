<?php

namespace Model;

class PdfCita extends ActiveRecord {
    protected static $tabla = 'citasservicios';
    protected static $columnasDB = ['id', 'hora', 'fecha', 'vacuna', 'centro', 'direccion'];

    public $id;
    public $hora;
    public $fecha;
    public $vacuna;
    public $centro;
    public $direccion;

    public function __construct()
    {
        $this->id = $args['id'] ?? null;
        $this->hora = $args['hora'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->vacuna = $args['vacuna'] ?? '';
        $this->centro = $args['centro'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
    }
}
