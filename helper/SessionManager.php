<?php

include_once("controller/AccessDeniedY404Controller.php");

class SessionManager {

    private $accessControl = [
        "admin" => ['home', 'reportes', 'asignarRoles'],
        "supervisor" => ['home', 'cargarViaje'],
        "chofer" => ['home', 'verViaje', 'subirDatos'],
        "mecanico" => ['home', 'service'],
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
                return $this->esUnaVistaValida($modulo);
            }
        } else {
            return false;
        }
    }

    private function esUnaVistaValida($modulo) {
        $existeVista = false;
        $tienePermisoParaLaVista = false;
        $arrayDeVistas = array_merge(...array_values($this->accessControl));

        foreach($this->accessControl as $rol=>$webs) {
           foreach ($webs as $web) {
               $existeVista = in_array($modulo, $arrayDeVistas);
               if ($existeVista) {
                   $tienePermisoParaLaVista = in_array($modulo, $this->accessControl[$_SESSION['rol']]);
               }
           }
        }
        $render = new Render('view/partial');
        $con = new AccessDeniedY404Controller($render);

        if (!$existeVista) {
            $con->paginaNoExiste();
            exit;
        } else if ($existeVista && !$tienePermisoParaLaVista) {
            $con->accesoDenegado();
            exit;
        }
        return $existeVista && $tienePermisoParaLaVista;
    }
}
