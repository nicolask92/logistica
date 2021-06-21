<?php

class SessionManager {

    private $accessControl = [
        "admin" => ['home', 'login'],
        "supervisor" => ['home'],
        "chofer" => ['home', 'verViaje'],
        "mecanico" => ['home'],
        "sinRol" => ['home']
    ];

    public function __construct() {
    }

    function iniciarSesion($usuario, $rol) {
        if (!isset($_SESSION['usuario'])) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = $rol;
        }
    }

    public function cerrarSesion() {
        if (isset($_SESSION['usuario'])) {
            session_destroy();
        }
    }

    public function chequearSesion($modulo = null) {
        $tieneAcceso = $this->tieneAccesoAlModulo($modulo);
        return isset($_SESSION['usuario']) && $tieneAcceso;
    }

    private function tieneAccesoAlModulo($modulo) {
        if (isset($_SESSION['usuario'])) {
            if ($modulo == null) {
                return true;
            } else {
                return in_array($modulo, $this->accessControl[$_SESSION['rol']]);
            }
        }
        else {
            return false;
        }
    }
}