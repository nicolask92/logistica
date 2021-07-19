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
    //original
    // { ["id"]=> string(1) "4" 
    // ["nombre"]=> string(6) "chofer" 
    // ["apellido"]=> string(6) "chofer" 
    // ["usuario"]=> string(6) "chofer" 
    // ["contrasenia"]=> string(32) "85b164d9c8eb210ae8a1a4679275b26a" 
    // ["email"]=> string(13) "chofer@g7.com" 
    // ["estado"]=> string(1) "1" ["codigo"]=> NULL 
    // ["legajo"]=> string(1) "8" ["dni"]=> string(8) "23053568" 
    // ["fecha_nacimiento"]=> string(19) "2016-03-07 00:00:00" 
    // ["usuario_id"]=> string(1) "4" 
    // ["id_rol"]=> string(1) "4" 
    // ["rol"]=> string(6) "Chofer" }
    //editado
    // { ["legajo"]=> string(1) "9" 
    //     ["dni"]=> string(8) "23053569" 
    //     ["nacimiento"]=> string(10) "2016-03-07" 
    //     ["email"]=> string(13) "chofer@g7.com" 
    //     ["rol"]=> string(1) "2" 
    //     ["id_usuario"]=> string(1) "4" }
    public function userEdit($data){    
       $usuario_original_sin_editar = $this->getUserForId($data["id_usuario"]);
       $usuario_editado = $data;
    
       if ($usuario_original_sin_editar['id_rol'] !== $usuario_editado['id_rol']) {
            
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
    
    public function deleteUser($id_user){
        $sql = "DELETE FROM usuario
                WHERE id = " . $id_user;
       return $this->obj_mysql->execute($sql);
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