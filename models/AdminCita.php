<?php

namespace Model;

class AdminCita extends ActiveRecord {
    protected static $tabla = 'citasservicios';
    protected static $columnasDB = ['id', 'hora', 'cliente', 'email', 'telefono', 'vacuna', 'dosis'];

    public $id;
    public $hora;
    public $cliente;
    public $email;
    public $telefono;
    public $vacuna;
    public $dosis;

    public function __construct()
    {
        $this->id = $args['id'] ?? null;
        $this->hora = $args['hora'] ?? '';
        $this->cliente = $args['cliente'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->vacuna = $args['vacuna'] ?? '';
        $this->dosis = $args['dosis'] ?? '';
    }
}
