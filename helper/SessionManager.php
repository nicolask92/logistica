<?php

include_once("controller/AccessDeniedY404Controller.php");

class SessionManager {

    private $accessControl = [
        "admin" => ['login', 'registro', 'home', 'reportes', 'usuarios','editarUsuario','eliminarUsuario','cargarViaje', 'perfil'],
        "supervisor" => ['login', 'registro', 'home', 'cargarViaje', 'detalle', 'perfil'],
        "chofer" => ['login', 'registro', 'home', 'verViaje', 'subirDatos', 'chofer', 'reporteDiario', 'procesarReporteDiario', 'perfil'],
        "mecanico" => ['login', 'registro','home', 'service', 'mecanico', 'perfil'],
        "sinRol" => ['login', 'registro', 'home']
    ];

    function iniciarSesion($usuario, $rol) {
        if (!isset($_SESSION[$usuario['usuario']])) {
            $_SESSION['usuario'] = $usuario['usuario'];
            $_SESSION['rol'] = $rol;
            $nombre = ucfirst($usuario['nombre']);
            $apellido = ucfirst($usuario['apellido']);
            $_SESSION['nombreCompleto'] = "${nombre}, ${apellido}";
            $_SESSION['idUsuarioActual'] = $usuario['id'];
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
		$arrayDeVistas = array_merge(...array_values($this->accessControl));

		$existeVista = in_array($modulo, $arrayDeVistas);
		if ($existeVista) {
			$tienePermisoParaLaVista = in_array($modulo, $this->accessControl[$_SESSION['rol']]);
		}

        $render = new Render('view/partial');
        $con = new AccessDeniedY404Controller($render);

        if (!$existeVista) {
            $con->paginaNoExiste();
            exit;
        } else if (!$tienePermisoParaLaVista) {
            $con->accesoDenegado();
            exit;
        }
        return $existeVista && $tienePermisoParaLaVista;
    }
}
