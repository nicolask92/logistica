<?php

class AdminController
{
    private $render;
    private $database;

    public function __construct($adminModel, $render)
    {
        $this->render = $render;
        $this->database = $adminModel;
    }

    public function execute()
    {

        $usuarios_sin_rol = $this->database->getUsersWithOutRol();
        $usuarios_con_rol = $this->database->getUsersWithRol();

        $data["usuarioSinRol"] = $usuarios_sin_rol;
        $data["usuarioConRol"] = $usuarios_con_rol;
        $data["alert"] = $this->mostrarMensaje();

        echo $this->render->render("view/usuariosView.php", $data);
    }

    private function mostrarMensaje()
    {

        $alert = array();
        if (isset($_GET['editar'])) {
            array_push($alert, [
                "alerta" => 'alert alert-success',
                "mensaje" => 'Se editó un usuario correctamente'
            ]);
        }
        if (isset($_GET['borrar'])) {
            array_push($alert, [
                "alerta" => 'alert alert-success',
                "mensaje" => 'Se borró un usuario correctamente'
            ]);
        }
        if (isset($_GET['rol'])) {
            array_push($alert, [
                "alerta" => 'alert alert-success',
                "mensaje" => 'Se asignó correctamente un rol'
            ]);
        }
        return $alert;
    }

    public function editarUsuario()
    {
        $todos_los_datos_usuario = $this->database->getUserForId($_GET["id"]);
        $data["user"] = $todos_los_datos_usuario;
        echo $this->render->render("view/editarUsuarioView.php", $data);
    }

    public function procesarFormulario()
    {
        if (isset($_POST["btn-editar"])) {
            $this->editar();
        }
        if (isset($_POST["btn-borrar"]) && isset($_GET["id"])) {
            $this->eliminarUsuario($_GET["id"]);
        }
        if (isset($_POST["btn-aceptar"])) {
            $this->asignarRol();
        }
    }


    private function editar()
    {
        $data_form_post = array(
            "legajo" => $_POST["legajo"],
            "dni" => $_POST["dni"],
            "nacimiento" => $_POST["nacimiento"],
            "email" => $_POST["email"],
            "id_rol" => $_POST["id_rol"],
            "id_usuario" => $_POST["id_usuario"]
        );
        if ($this->database->userEdit($data_form_post)) {
            header("location: /usuarios?editar=true");
        }
    }

    private function eliminarUsuario($id_user)
    {
        if ($this->database->deleteUser($id_user)) {
            header("location: /usuarios?borrar=true");
        }
    }

    private function asignarRol()
    {
        if ($this->database->addRol($_POST)) {
            header("location: /usuarios?rol=true");
        }
    }
}
