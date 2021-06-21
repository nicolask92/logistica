<?php

class SessionManager {

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

    public function chequearSesion() {
        return isset($_SESSION['usuario']);
    }

}