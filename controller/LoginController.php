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
        $sm = new SessionManager();
        if ($sm->chequearSesion()) {
            $indexController = new IndexController($this->render);
            $indexController->execute();
        } else {
            if ($error == true) {
                $data['error'] = true;
                echo $this->render->render("view/loginView.php", $data);
            } else {
                echo $this->render->render("view/loginView.php");
            }
        }
    }

    public function procesarLogin(){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $usuario = $this->loginModel->buscarUsuario($email , $password);
        
        if ($usuario->num_rows > 0) {
            $usuarioComoArray = $usuario->fetch_array();
            $rolUsuario = $this->loginModel->buscarRolPorIdUsuario($usuarioComoArray['id']);

            $indexController = new IndexController($this->render);
            $sm = new SessionManager();
            $sm->iniciarSesion($usuarioComoArray['usuario'], $rolUsuario);
            $indexController->execute();
        } else {
            $this->execute(true);
        }
    }

    public function cerrarSesion() {
        $sm = new SessionManager();
        $sm->cerrarSesion();
        echo $this->render->render("view/loginView.php");
    }
}