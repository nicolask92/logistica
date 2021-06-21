<?php


class AdminModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function get(){
        $sql = "SELECT * FROM usuario";
        $result = $this->database->execute($sql);
        $data  = array();
        while ($fila = $result->fetch_assoc()){
            $data[] = $fila;
        }
        return $data;

    }

}
