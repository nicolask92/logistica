<?php
class AdminModel{
    
    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function obtenerTodosLosUsuarios(){
        $sql = "SELECT * FROM usuario";
        $resultado = $this->ejecutarConsulta($sql);
        return $this->convertirArrayAsociativo($resultado);
    }

    private function ejecutarConsulta($sql){
        return $this->database->execute($sql);
    }

    private function convertirArrayAsociativo($resultado_consulta){
        if($this->existeMasDeUnaFila($resultado_consulta)){
            $data = array();
            while ($rows = $resultado_consulta->fetch_assoc()) {
                $data[] = $rows;
            }
            return $data;
        }
    }

    private function existeMasDeUnaFila($resultado_consulta){
        if ($resultado_consulta->num_rows > 0) {
            return true;
        }
            return false;
    }

    public function obtenerUsuarioPorId($id){
        $sql = "SELECT * FROM usuario WHERE id = " . $id;
        $resultado = $this->ejecutarConsulta($sql);
        return $this->convertirArrayAsociativo($resultado);
    }
}