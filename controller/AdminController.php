<?php

class AdminController
{
    private $render;
    private $obj_adminModel;

    public function __construct($adminModel, $render){
        $this->render = $render;
        $this->obj_adminModel = $adminModel;
    }

    public function execute(){  
        $result = $this->obj_adminModel->obtenerTodosLosUsuarios();    
        $array_users_sinRol = array();
        for ($i=0; $i < count($result); $i++) { 
            if ($result[$i]['id_rol'] == 5) {
                array_push($array_users_sinRol,
                ['usuario_id' => $result[$i]["usuario_id"],
                 'usuario' => $result[$i]["usuario"],
                 'email' => $result[$i]["email"],
                 'legajo' => $result[$i]["legajo"]]);
            }
            if ($result[$i]['id_rol'] != 5) {
                $data["users"][$i] = $result[$i];
            }
        }

        if(isset($_GET["editar"])){

            $data["alert"] = $this->mensajeEdicion($_GET["editar"]);
        }
        if(isset($_GET["borrar"])){

            $data["alert"] = $this->mensajeBorrar($_GET["borrar"]);
        }
        if(isset($_GET["rol"])){

            $data["alert"] = $this->mensajeAsignar($_GET["rol"]);
        }

        $data["usuarioSinRol"] = $array_users_sinRol;
        echo $this->render->render("view/usuariosView.php",$data);                        
        
    }

    private function mensajeEdicion($mensaje_edicion)
    {
        $alert = array();
        if ($mensaje_edicion) {
            array_push($alert,[
                "alerta" => 'alert alert-success',
                "mensaje" =>'Se editó un usuario correctamente'
            ]);
            return $alert;    
        }
    }

    private function mensajeBorrar($mensaje_borrado){
        $alert = array();
        if ($mensaje_borrado) {
            array_push($alert,[
                "alerta" => 'alert alert-success',
                "mensaje" =>'Se borró un usuario correctamente'
            ]);
            return $alert;    
        }
    }

    private function mensajeAsignar($mensaje_rol){
        $alert = array();
        if ($mensaje_rol) {
            array_push($alert,[
                "alerta" => 'alert alert-success',
                "mensaje" =>'Se asignó correctamente un rol'
            ]);
            return $alert;    
        }
    }

    public function editarUsuario(){
        $usuario = $this->obj_adminModel->obtenerUsuarioPorId($_GET["id"]);
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
        $this->obj_adminModel->userEdit($data);
        header("location: /usuarios?editar=true");
    }

    public function eliminarUsuario(){
        $this->obj_adminModel->eliminarUsuario($_GET["id"]);
        header("location: /usuarios?borrar=true");
    }


    public function asignarRol(){
        if (isset($_POST["btn-aceptar"])) {
            $this->obj_adminModel->actualizarRol($_POST);
            header("location: /usuarios?rol=true");
        }
    }
}
