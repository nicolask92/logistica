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

        $sql = "SELECT DISTINCT chofer.id, chofer.tipo_licencia, chofer.patente
                FROM usuario 
                INNER JOIN empleado ON empleado.usuario_id = ${id}
                INNER JOIN chofer ON empleado.legajo = chofer.legajo";

        $resultado = $this->database->execute($sql);

        return $resultado;

    }

    public function idChoferActual($id){

        $sql = "SELECT DISTINCT chofer.id
                FROM usuario 
                INNER JOIN empleado ON empleado.usuario_id = ${id}
                INNER JOIN chofer ON empleado.legajo = chofer.legajo";

        $resultado = $this->database->query($sql);

        return $resultado;

    }

    public function actualizarLicencia($idChofer, $licencia, $patente){

        $sql = "UPDATE chofer 
                SET tipo_licencia='$licencia',patente ='$patente'
                WHERE id = ${idChofer}";

        $this->database->execute($sql);

        HEADER ("Location: /perfil");

    }
}