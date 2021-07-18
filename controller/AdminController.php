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
        
        $usuarios_sin_rol = $this->database->getUsersWithOutRol();
        $usuarios_con_rol = $this->database->getUsersWithRol();
        
        $data["usuarioSinRol"] = $usuarios_sin_rol;
        $data["usuarioConRol"] = $usuarios_con_rol;
        $data["alert"] = $this->mostrarMensaje();      
        
        echo $this->render->render("view/usuariosView.php",$data);                        
    }
    
    private function mostrarMensaje(){
        $alert = array();
        if (isset($_GET['editar'])) {
            array_push($alert,[
                "alerta" => 'alert alert-success',
                "mensaje" =>'Se editó un usuario correctamente'
            ]);
        }
        if (isset($_GET['borrar'])) {
            array_push($alert,[
                "alerta" => 'alert alert-success',
                "mensaje" =>'Se borró un usuario correctamente'
            ]);
        }
        if (isset($_GET['rol'])) {
            array_push($alert,[
                "alerta" => 'alert alert-success',
                "mensaje" =>'Se asignó correctamente un rol'
            ]);
        }
        return $alert;
    }


    // private function mensajeEdicion($mensaje_edicion)
    // {
    //     $alert = array();
    //     if ($mensaje_edicion) {
    //         array_push($alert,[
    //             "alerta" => 'alert alert-success',
    //             "mensaje" =>'Se editó un usuario correctamente'
    //         ]);
    //         return $alert;    
    //     }
    // }

    // private function mensajeBorrar($mensaje_borrado){
    //     $alert = array();
    //     if ($mensaje_borrado) {
    //         array_push($alert,[
    //             "alerta" => 'alert alert-success',
    //             "mensaje" =>'Se borró un usuario correctamente'
    //         ]);
    //         return $alert;    
    //     }
    // }

    // private function mensajeAsignar($mensaje_rol){
    //     $alert = array();
    //     if ($mensaje_rol) {
    //         array_push($alert,[
    //             "alerta" => 'alert alert-success',
    //             "mensaje" =>'Se asignó correctamente un rol'
    //         ]);
    //         return $alert;    
    //     }
    // }

    public function editarUsuario(){
        $usuario = $this->database->obtenerUsuarioPorId($_GET["id"]);
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
        $this->database->userEdit($data);
        header("location: /usuarios?editar=true");
    }

    public function eliminarUsuario(){
        $this->database->eliminarUsuario($_GET["id"]);
        header("location: /usuarios?borrar=true");
    }


    public function asignarRol(){
        if (isset($_POST["btn-aceptar"])) {
            $this->database->actualizarRol($_POST);
            header("location: /usuarios?rol=true");
        }
    }
}
