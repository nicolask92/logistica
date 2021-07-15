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
}