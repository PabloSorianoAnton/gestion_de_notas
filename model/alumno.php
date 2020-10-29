<?php

require_once 'persona.php';

class Alumno extends Persona {
    private $nombre;
    private $apep;
    private $apem;
    private $grupo;

    function __construct($email,$passwd,$nombre,$apep,$apem,$grupo) {
        parent:: __construct($email,$passwd);
        $this->nombre=$nombre;
        $this->apep=$apep;
        $this->apem=$apem;
        $this->grupo=$grupo;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }

    public function getApep(){
        return $this->apep;
    }

    public function setApep($apep){
        $this->apep = $apep;
        return $this;
    }

    public function getApem(){
        return $this->apem;
    }

    public function setApem($apem){
        $this->apem = $apem;
        return $this;
    }

    public function getGrupo(){
        return $this->grupo;
    }

    public function setGrupo($grupo){
        $this->grupo = $grupo;
        return $this;
    }
}