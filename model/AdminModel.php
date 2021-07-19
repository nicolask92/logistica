<?php
class AdminModel{
    
    private $obj_mysql;

    public function __construct($obj_mysql){
        $this->obj_mysql = $obj_mysql;
    }

    public function getUsersWithOutRol(){
        $sql = "SELECT * FROM usuario u 
                INNER JOIN empleado e ON u.id = e.usuario_id
                INNER JOIN rol ON e.id_rol = rol.id
                WHERE e.id_rol = 5";

        return $this->obj_mysql->execute($sql);
    }

    public function getUsersWithRol(){
        $sql = "SELECT * FROM usuario u 
                INNER JOIN empleado e ON u.id = e.usuario_id
                INNER JOIN rol ON e.id_rol = rol.id
                WHERE NOT e.id_rol = 5";

        return $this->obj_mysql->execute($sql);
    }

    
    public function getUserForId($id_usuario){
        $sql = "SELECT * FROM usuario 
                INNER JOIN empleado
                ON usuario.id = empleado.usuario_id
                INNER JOIN rol ON empleado.id_rol = rol.id
                WHERE usuario.id =" . $id_usuario;

        return $this->obj_mysql->query($sql);
    }
 
    public function userEdit($data){    
       $usuario_original_sin_editar = $this->getUserForId($data["id_usuario"]);
       $usuario_editado = $data;
    
       if ($usuario_original_sin_editar['id_rol'] !== $usuario_editado['id_rol']) {
            $usuario_editado = $this->replaceDataUsers($usuario_original_sin_editar,$usuario_editado);
            $tabla_a_insertar_new_rol = $this->getRolName($usuario_editado['id_rol']);
            $es_borrado = $this->deleteUser($usuario_original_sin_editar['usuario_id']);
            $es_insertado = $this->insertUser($usuario_editado,$tabla_a_insertar_new_rol);
           
            if ($es_borrado && $es_insertado) {
                return true;
            }
            echo "no se borro boludon ni se inserto ";
            die();
       }
       echo "lo hiciste mal boludon";
       die();

        foreach ($data as $key => $value) {
            $$key = $value;
        }
        $sql_empleado = "UPDATE empleado
                SET legajo = $legajo,
                    dni = $dni,
                    fecha_nacimiento = '$nacimiento',
                    id_rol = '$rol'
                WHERE usuario_id = $id_usuario";
        
        $sql_usuario = "UPDATE usuario
                SET email = '$email'
                WHERE id = $id_usuario";
        
        return $this->obj_mysql->execute($sql_empleado) && $this->obj_mysql->execute($sql_usuario);
    }
    
    private function replaceDataUsers($original_user,$edit_user){
        foreach ($original_user as $key => $value) {
            foreach ($edit_user as $key_edit => $value_edit) {
                if($key == $key_edit && $value !== $value_edit){
                    $original_user[$key] = $edit_user[$key_edit];
                }
            }
        }
        return $original_user;
    }



    public function deleteUser($id_user){
        $sql = "DELETE FROM usuario
                WHERE id = " . $id_user;
       return $this->obj_mysql->execute($sql);
    }

    private function insertUser($user,$newRol){
        foreach ($user as $key => $value) {
            $$key = $value;
        }
        $codigo = ($codigo == null)?"NULL":$codigo;
        $dni = ($dni == null)?"NULL":$dni;
        $fecha_nacimiento = ($fecha_nacimiento == null)?"NULL":$fecha_nacimiento;

        $sql_insert_usuario = "INSERT INTO usuario(id,nombre,apellido,usuario,contrasenia,email,estado,codigo) 
                               VALUES($usuario_id,'$nombre','$apellido','$usuario','$contrasenia','$email',$estado,$codigo)";
    
        $sql_insert_empleado = "INSERT INTO empleado(legajo,dni,fecha_nacimiento,usuario_id,id_rol)
                                VALUES($legajo,$dni,'$fecha_nacimiento',$usuario_id,$id_rol)";
    
        $sql_insert_new_rol = "INSERT INTO ${newRol}(legajo,id_rol) VALUES($legajo,$id_rol)";
        
        return $this->obj_mysql->execute($sql_insert_usuario) && $this->obj_mysql->execute($sql_insert_empleado) && $this->obj_mysql->execute($sql_insert_new_rol);
    }

    public function addRol($array){
        foreach ($array as $key => $value) {
            $$key = $value;
        }

        $sql_update_rol = "UPDATE empleado
                         SET id_rol = $idRol
                         WHERE usuario_id = $id_user";

        $nombre_de_tabla_a_insertar = $this->getRolName($array["idRol"]);

        $sql_insert_new_rol= "INSERT INTO ${nombre_de_tabla_a_insertar} (legajo,id_rol) VALUES($legajo,$idRol)";
        
        return $this->obj_mysql->execute($sql_update_rol) && $this->obj_mysql->execute($sql_insert_new_rol);
    }

    private function getRolName($num_rol){
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