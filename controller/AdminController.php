<?php

class AdminController
{
    private $render;
    private $database;

    public function __construct($database, $render){
        $this->render = $render;
        $this->database = $database;
    }

    public function execute(){  
        $result = $this->database->obtenerTodosLosUsuarios();
        $data["users"] = $result;         
        echo $this->render->render("view/adminView.php",$data);
    }

    public function editarUsuario(){
        $result = $this->database->obtenerUsuarioPorId($_GET["id"]);
        $data["id"] = $_GET["id"];
        $data["user"] = $result["usuario"];
        $data["legajo"] = $result["legajo"];
        $data["dni"] = $result["dni"];
        $data["nac"] = $result["fecha_nacimiento"];
        $data["email"] = $result["email"];
        echo $this->render->render("view/editarUsuarioView.php",$data);
    }

    public function procesarFormulario(){
        $this->database->editarUsuario($_POST);
        return $this->execute();
    }
}
