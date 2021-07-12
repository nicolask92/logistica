<?php
class AdminModel{
    
    private $obj_mysql;

    public function __construct($obj_mysql){
        $this->obj_mysql = $obj_mysql;
    }

    public function obtenerTodosLosUsuarios(){
        $sql = "SELECT * FROM usuario u INNER JOIN empleado e ON u.id = e.usuario_id
                INNER JOIN rol ON e.id_rol = rol.id";

        $result = $this->ejecutarConsulta($sql);
        $result = $this->convertiraArrayAsociativo($result);
        
        return $result;
    }       

    private function ejecutarConsulta($sql){
        return $this->obj_mysql->execute($sql);
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

    public function userEdit($data){
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        $sql = "UPDATE empleado
                SET legajo = $legacy,
                    dni = $dni,
                    fecha_nacimiento = '$nacimiento',
                    id_rol = '$rol'
                WHERE usuario_id = $id_usuario";
        $this->ejecutarConsulta($sql);
        
        $sql = "UPDATE usuario
                SET email = '$email'
                WHERE id = $id_usuario";
        $this->ejecutarConsulta($sql);
    }
    
    public function eliminarUsuario($id_user){
        $sql = "DELETE FROM usuario
                WHERE id = " . $id_user;
        $this->ejecutarConsulta($sql);
    }

    public function actualizarRol($array){
        foreach ($array as $key => $value) {
            $$key = $value;
        }
        $sql = "UPDATE empleado
                SET id_rol = $idRol
                WHERE usuario_id = $id_user";
        $this->ejecutarConsulta($sql);
        $rol = $this->tipoDeRol($array["idRol"]);
        $sql = "INSERT INTO ${rol} (legajo,id_rol) VALUES($legajo,$idRol)";
        $result = $this->obj_mysql->execute($sql);       
    }

    private function tipoDeRol($num_rol){
        if ($num_rol == 1) {
            return "administrador";
        }
        if ($num_rol == 2) {
            return "supervisor";
        }
        if ($num_rol == 3) {
            return "mecanico";
        }
        if ($num_rol == 4) {
            return "chofer";
        }
    }
}