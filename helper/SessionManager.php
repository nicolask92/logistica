<?php

class SessionManager {

    private $accessControl = [
        "admin" => ['home', 'admin', 'editarUsuario','eliminarUsuario','cargarViaje'],
        "supervisor" => ['home', 'cargarViaje'],
        "chofer" => ['home', 'verViaje', 'subirDatos'],
        "mecanico" => ['home', 'service'],
        "sinRol" => ['home']
    ];

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
        if ($modulo == 'registro' && !isset($_SESSION['usuario'])) {
            return true;
        } else {
            $tieneAcceso = $this->tieneAccesoAlModulo($modulo);
            return isset($_SESSION['usuario']) && $tieneAcceso;
        }
    }

    private function tieneAccesoAlModulo($modulo) {
        if (isset($_SESSION['usuario'])) {
            if ($modulo == null) {
                return true;
            } else {
                return in_array($modulo, $this->accessControl[$_SESSION['rol']]);
            }
        } else {
            return false;
        }
    }
}