<?php


class LoginController
{
    private $loginModel;
    private $render;

    public function __construct($loginModel, $render)
    {
        $this->loginModel = $loginModel;
        $this->render = $render;
    }

    public function execute()
    {
        echo $this->render->render("view/loginView.php");
    }

    public function procesarLogin(){

        $email = $_POST["email"];
        $password = $_POST["password"];
        $data = $this->loginModel->buscarUsuario($email, $password);
        echo $this->render->render("$data");
    }
}