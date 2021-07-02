<?php
class AdminModel{
    
    private $database;

    public function __construct($obj_mysql){
        $this->database = $obj_mysql;
    }

    public function obtenerTodosLosUsuarios(){
        $sql = "SELECT * FROM empleado e INNER JOIN usuario u ON e.usuario_id = u.id
                INNER JOIN rol ON e.id_rol = rol.id";
        $result = $this->ejecutarConsulta($sql);
        $result = $this->convertiraArrayAsociativo($result);
        return $result;
    }       

    private function ejecutarConsulta($sql){
        return $this->database->execute($sql);
    }

    private function convertiraArrayAsociativo($result = array()){
        if ($this->validarQueTengaMasDeUnaFila($result)) {
            $data = array();
            while ($rows = $result->fetch_assoc()) {
                $data[] = $rows;
            }
            return $data;
        }
    }

    private function validarQueTengaMasDeUnaFila($result){
        if ($result->num_rows > 0) {
            return true;
        }
    }


    public function obtenerUsuarioPorId($id_usuario){
        $sql = "SELECT * FROM usuario 
                INNER JOIN empleado
                ON usuario.id = empleado.usuario_id
                INNER JOIN rol ON empleado.id_rol = rol.id
                WHERE usuario.id =" . $id_usuario;
        $result = $this->ejecutarConsulta($sql);
        $result = $this->convertiraArrayAsociativo($result);
        return $result;
    }

    public function editarUsuario($data = array()){
        foreach ($data as $key => $value) {
                $$key = $value;
        }
        $sql = "UPDATE empleado
                SET empleado.legajo = '$legajo',
                    empleado.dni = '$dni',
                    empleado.fecha_nacimiento = '$nacimiento',
                    empleado.email = '$email',
                    empleado.id_rol = '$rol'
                WHERE empleado.usuario_id = '$id'";
        $this->ejecutarConsulta($sql);
    }
    
    public function eliminarUsuario($id_user){
        $sql = "DELETE FROM usuario
                WHERE id = " . $id_user;
        $this->ejecutarConsulta($sql);
    }
}