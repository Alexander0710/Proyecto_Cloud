<?php

/**
 * Description of Estudiante
 *
 * @author Gaby
 */
class Estudiante {

    private $cedula;
    private $apellidos;
    private $nombres;
    private $direccion;
    private $telefono;

    function __construct($cedula, $apellidos, $nombres, $direccion, $telefono) {
        $this->cedula = $cedula;
        $this->apellidos = $apellidos;
        $this->nombres = $nombres;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

}
