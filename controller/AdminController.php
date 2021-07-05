<?php

class AdminController
{
    private $render;
    private $obj_database;

    public function __construct($adminModel, $render){
        $this->render = $render;
        $this->obj_database = $adminModel;
    }

    public function execute($mensajes = null){  
        $result = $this->obj_database->obtenerTodosLosUsuarios();    
        $data["users"] = $result;
        if ($mensajes == true) {
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
        $usuario = $this->obj_database->obtenerUsuarioPorId($_GET["id"]);
        print_r($usuario);
        $data["user"] = $usuario;
        echo $this->render->render("view/editarUsuarioView.php",$data);
    }

    public function procesarFormulario(){
        $data = array(
            "legacy" => $_POST["legacy"],
            "dni" => $_POST["dni"],
            "nacimiento" => $_POST["nacimiento"],
            "email" => $_POST["email"],
            "rol" => $_POST["rol"],
            "id_usuario" => $_POST["id_usuario"]

        );
        $this->obj_database->userEdit($data);
        $editar = true;
        return $this->execute($editar);
    }

    public function eliminarUsuario(){
        $this->obj_database->eliminarUsuario($_GET["id"]);
        header("location: /usuarios?borrar=true");
    }
}
