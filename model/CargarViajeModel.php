<?php


class CargarViajeModel
{
    private $database;

    public function __construct($database){

        $this->database = $database;
    }

    public function buscarChoferes(){

        $sql = "SELECT * 
                FROM usuario 
                JOIN empleado ON empleado.usuario_id = usuario.id
                JOIN chofer ON empleado.legajo = chofer.legajo";

        $resultado = $this->database->execute($sql);

        return $resultado;

    }

    public function buscarCamiones(){

        $sql = "SELECT patente, marca, modelo FROM camiones";

        $resultado = $this->database->execute($sql);

        return $resultado;

    }

    public function buscarArrastradores()
    {

        $sql = "SELECT patente, tipo FROM arrastrador";

        $resultado = $this->database->execute($sql);

        return $resultado;

    }

    public function buscarSupervisores(){

        $sql = "SELECT * 
                FROM usuario 
                JOIN empleado ON empleado.usuario_id = usuario.id
                JOIN supervisor ON empleado.legajo = supervisor.legajo";

        $resultado = $this->database->execute($sql);

        return $resultado;

    }

}