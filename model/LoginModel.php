<?php


class LoginModel
{

    private $database;

    public function __construct($database){

        $this->database = $database;
    }

    public function buscarUsuario($email , $password) {

        $sql = "
            SELECT *
            FROM usuario
            WHERE email ='" . $email . "' AND contraseña = '" . $password . "'";

        $resultado = $this->database->execute($sql);
        return $resultado;
    }

    public function buscarRolPorIdUsuario($id) {

        $sqlAdmin = "
            SELECT *
            FROM administrador join empleado on empleado.legajo = administrador.legajo
            WHERE empleado.usuario_id = " .$id;

        $resultado = $this->database->execute($sqlAdmin);

        if ($resultado->num_rows > 0) {
            return "admin";
        }

        $sqlSupervisor = "
            SELECT *
            FROM supervisor join empleado on supervisor.legajo = empleado.legajo
            WHERE empleado.usuario_id =" . $id;

        $resultado = $this->database->execute($sqlSupervisor);

        if ($resultado->num_rows > 0) {
            return "supervisor";
        }

        $sqlChofer = "
            SELECT *
            FROM chofer join empleado on empleado.legajo = chofer.legajo
            WHERE empleado.usuario_id = " .$id;

        $resultado = $this->database->execute($sqlChofer);

        if ($resultado->num_rows > 0) {
            return "chofer";
        }

        $sqlMecanico = "
            SELECT *
            FROM mecanico join empleado on empleado.legajo = mecanico.legajo
            WHERE empleado.usuario_id = " .$id;

        $resultado = $this->database->execute($sqlMecanico);

        if ($resultado->num_rows > 0) {
            return "mecanico";
        }

        return "sinRol";
    }

}


