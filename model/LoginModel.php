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
            FROM administrador
            WHERE id =" . $id;

        $resultado = $this->database->execute($sqlAdmin);

        if ($resultado->num_rows > 0) {
            return "admin";
        }

        $sqlSupervisor = "
            SELECT *
            FROM supervisor
            WHERE id =" . $id;

        $resultado = $this->database->execute($sqlSupervisor);

        if ($resultado->num_rows > 0) {
            return "supervisor";
        }

        $sqlChofer = "
            SELECT *
            FROM chofer
            WHERE id =" . $id;

        $resultado = $this->database->execute($sqlChofer);

        if ($resultado->num_rows > 0) {
            return "chofer";
        }

        $sqlMecanico = "
            SELECT *
            FROM chofer
            WHERE id =" . $id;

        $resultado = $this->database->execute($sqlMecanico);

        if ($resultado->num_rows > 0) {
            return "mecanico";
        }

        return "sinRol";
    }

}


