<?php
class AdminModel{
    
    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function obtenerTodosLosUsuarios(){
        $sql = "SELECT * FROM usuario 
                INNER JOIN empleado
                ON usuario.id = empleado.usuario_id";
        return $this->devolverResultadoConsulta($sql);
    }

    private function devolverResultadoConsulta($sql){
        $resultado = $this->ejecutarConsulta($sql);
        return $this->convertirArrayAsociativo($resultado);
    }

    private function ejecutarConsulta($sql){
        return $this->database->execute($sql);
    }

    private function convertirArrayAsociativo($resultado_consulta){
        if($this->existeMasDeUnRegistro($resultado_consulta)){
            $data = array();
            while ($rows = $resultado_consulta->fetch_assoc()) {
                $data[] = $rows;
            }
            return $data;
        }
    }

    private function existeMasDeUnRegistro($resultado_consulta){
        if ($resultado_consulta->num_rows > 0) {
            return true;
        }
            return false;
    }

    public function obtenerUsuarioPorId($id){
        $sql = "SELECT * FROM usuario 
                INNER JOIN empleado
                ON usuario.id = empleado.usuario_id
                WHERE usuario.id =" . $id;
        return $this->devolverResultadoConsulta($sql);
    }

    public function editarUsuario($id = null,$data = array()){
        $sql = "UPDATE empleado 
                SET legajo = '',
                    dni = ,
                    fecha_nacimiento = '', 
                WHERE usuario_id =" . $id;
        return $this->devolverResultadoConsulta($sql);
    }
    
    public function eliminarUsuario($id = null){
            $sql = "DELETE FROM usuario WHERE id =" . $id;
            return $this->devolverResultadoConsulta();
        }
}