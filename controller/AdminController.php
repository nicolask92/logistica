<?php

class AdminController
{
    private $render;
    private $database;

    public function __construct($database, $render)
    {
        $this->render = $render;
        $this->database = $database;
    }

    public function execute()
    {
        $result = $this->database->obtenerTodosLosUsuarios();
        $data["users"] = $result;
        echo $this->render->render("view/adminView.php",$data);
    }

    public function editarUsuario(){
        $result = $this->database->obtenerUsuarioPorId($_GET["id"]);
        $data["users"] = $result;
        echo $this->render->render("view/editarUsuarioView.php",$data);
    }
}
