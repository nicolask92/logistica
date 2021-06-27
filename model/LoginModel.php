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
            FROM administrador join empleado on administrador.legajo = empleado.legajo
            WHERE administrador.id =" . $id;

        $resultado = $this->database->execute($sqlAdmin);

        if ($resultado->num_rows > 0) {
            return "Administrativo";
        }

        $sqlSupervisor = "
            SELECT *
            FROM supervisor join empleado on supervisor.legajo = empleado.legajo
            WHERE supervisor.id =" . $id;

        $resultado = $this->database->execute($sqlSupervisor);

        if ($resultado->num_rows > 0) {
            return "Supervisor";
        }

        $sqlChofer = "
            SELECT *
            FROM chofer join empleado on chofer.legajo = empleado.legajo
            WHERE chofer.id =" . $id;

        $resultado = $this->database->execute($sqlChofer);

        if ($resultado->num_rows > 0) {
            return "Chofer";
        }

        $sqlMecanico = "
            SELECT *
            FROM mecanico join empleado on mecanico.legajo = empleado.legajo
            WHERE mecanico.id =" . $id;

        $resultado = $this->database->execute($sqlMecanico);

        if ($resultado->num_rows > 0) {
            return "Mecanico";
        }

        return "sinRol";
    }

}