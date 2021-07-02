<?php

class AdminController
{
    private $render;
    private $database;

    public function __construct($adminModel, $render){
        $this->render = $render;
        $this->database = $adminModel;
    }

    public function execute(){  
        $result = $this->database->obtenerTodosLosUsuarios();    
        $data["users"] = $result;
        if ($_GET["editar"] == true) {
            $alert = array(
                "alerta" => 'alert alert-success',
                "mensaje" =>'Se edito un usuario correctamente'
            );
            $data["alert"] = $alert;
        }
        if ($_GET["borrar"] == true) {
            $alert = array(
                "alerta" => 'alert alert-success',
                "mensaje" =>'Se borro un usuario correctamente'
            );
            $data["alert"] = $alert;
        }
        echo $this->render->render("view/usuariosView.php",$data);
        
    }

    public function editarUsuario(){
        $result = $this->database->obtenerUsuarioPorId($_GET["id"]);
        $data["user"] = $result;
        echo $this->render->render("view/editarUsuarioView.php",$data);
    }

    public function procesarFormulario(){
        $data = array(
            "id" => $_POST["id_usuario"],
            "legajo" => $_POST["legajo"],
            "dni" => $_POST["dni"],
            "nacimiento" => $_POST["nacimiento"],
            "email" => $_POST["email"],
            "rol" => $_POST["rol"]
        );
        $this->database->editarUsuario($data);
        header("location: /usuarios?editar=true");
    }

    public function eliminarUsuario(){
        $this->database->eliminarUsuario($_GET["id"]);
        header("location: /usuarios?borrar=true");
    }
}
