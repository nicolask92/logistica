<?php


class ViajesModel
{
    private $database;

    public function __construct($database){

        $this->database = $database;
    }

    public function getViajes(){

        $sql = "SELECT * FROM viaje";

        $resultado = $this->database->execute($sql);

        return $resultado;
    }

}