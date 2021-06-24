<?php


class AdminModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function get($id = 0){
        if ($id !== 0){
            $sql = "SELECT * FROM usuario WHERE id = " .$id;
            $result = $this->database->execute($sql);
            $data  = array();
            while ($fila = $result->fetch_assoc()){
                $data[] = $fila;
            }
            return $data;
        }
        else {
            $sql = "SELECT * FROM usuario";
            $result = $this->database->execute($sql);
            $data = array();
            while ($fila = $result->fetch_assoc()) {
                $data[] = $fila;
            }
            return $data;
        }
    }

}
