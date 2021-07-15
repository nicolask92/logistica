<?php


class PerfilModel
{
    private $database;

    public function __construct($database){

        $this->database = $database;
    }

    public function getUsuarioActual($id){

        $sql = "SELECT `nombre`,`apellido`,`email` FROM `usuario` WHERE id =". $id;

        $resultado = $this->database->execute($sql);

        return $resultado;

    }


    public function getEmpleadoActual($id){

        $sql = "SELECT `legajo`,`dni`,`fecha_nacimiento` FROM `empleado` WHERE usuario_id =". $id;

        $resultado = $this->database->execute($sql);

        return $resultado;

    }

    public function getChoferActual($id){

        $sql = "SELECT c.tipo_licencia, c.patente 
                FROM usuario   
                JOIN empleado ON empleado.usuario_id =".$id." 
                JOIN chofer ON empleado.legajo = chofer.legajo";

        $resultado = $this->database->execute($sql);

        return $resultado;

    }
}