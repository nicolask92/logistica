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
        $result = $this->database->get();
        $data["users"] = $result;
        echo $this->render->render("view/usuariosActivosView.php",$data);
        var_dump($_GET);
    }

    public function editarUsuario(){
        $result = $this->database->get($_GET["id"]);
        $data["uno"] = $result;
        echo $this->render->render("view/editarUsuarioView.php",$data);

    }

    public function eliminarUsuario(){
        $result = $this->database->get($_GET["id"]);
        $data["dos"] = $result;
        echo $this->render->render("view/eliminarUsuarioView.php",$data);
    }

    public function asignarRoles(){
        echo $this->render->render("view/asignarRolesView.php");
    }
}
