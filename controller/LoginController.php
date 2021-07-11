<?php

include_once 'IndexController.php';
include_once 'helper/SessionManager.php';

class LoginController
{
    private $loginModel;
    private $render;

    public function __construct($loginModel, $render)
    {
        $this->loginModel = $loginModel;
        $this->render = $render;
    }

    public function execute($error = false) {
    	$data = null;
        $sm = new SessionManager();
        if ($sm->chequearSesion()) {
			header('location: /home');
        } else {
        	if(isset($_GET['cuentaActivada'])) {
        		$data['cuentaActivada'] = true;
        	}
            if ($error == true) {
                $data['error'] = true;
            }
	        echo $this->render->render("view/loginView.php", $data);
        }
    }

    public function procesarLogin(){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $usuario = $this->loginModel->buscarUsuario($email , $password);
        
        if ($usuario->num_rows > 0) {
            $usuarioComoArray = $usuario->fetch_array();
            $rolUsuario = $this->loginModel->buscarRolPorIdUsuario($usuarioComoArray['id']);

            $sm = new SessionManager();
            $sm->iniciarSesion($usuarioComoArray, $rolUsuario);
            header('location: /');
        } else {
            $this->execute(true);
        }
    }

    public function cerrarSesion() {
        $sm = new SessionManager();
        $sm->cerrarSesion();
	    header('location: /login');
    }
}