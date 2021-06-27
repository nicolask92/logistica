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

        $resultado = $this->database->query($sql);

        return $resultado;

    }
}