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
        $sqlAdmin = "
            SELECT *
            FROM administrador join empleado on administrador.legajo = empleado.legajo
            WHERE empleado.usuario_id =" . $id;

        $resultado = $this->database->execute($sqlAdmin);

        if ($resultado->num_rows > 0) {
            return "admin";
        }

        $sqlSupervisor = "
            SELECT *
            FROM supervisor join empleado on supervisor.legajo = empleado.legajo
            WHERE empleado.usuario_id =" . $id;

        $resultado = $this->database->execute($sqlSupervisor);

        if ($resultado->num_rows > 0) {
            return "supervisor";
        }

        $sqlChofer = "
            SELECT *
            FROM chofer join empleado on chofer.legajo = empleado.legajo
            WHERE empleado.usuario_id =" . $id;

        $resultado = $this->database->execute($sqlChofer);

        if ($resultado->num_rows > 0) {
            return "chofer";
        }

        $sqlMecanico = "
            SELECT *
            FROM mecanico join empleado on mecanico.legajo = empleado.legajo
            WHERE empleado.usuario_id =" . $id;

        $resultado = $this->database->execute($sqlMecanico);

        if ($resultado->num_rows > 0) {
            return "mecanico";
        }

        return "sinRol";
    }

    public function editarUsuario($id = null,$data = array()){
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        $sql = "UPDATE empleado 
                SET legajo =$legajo,
                    dni = $dni,
                    fecha_nacimiento = '$fecha_nacimiento', 
                WHERE usuario_id =" . $id;

        return $this->devolverResultadoConsulta($sql);
    }
    
    public function eliminarUsuario($id = null){
            $sql = "DELETE FROM usuario WHERE id =" . $id;
            return $this->devolverResultadoConsulta();
        }
}