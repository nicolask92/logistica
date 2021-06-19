<?php


class LoginModel
{

    private $database;

    public function __construct($database){

        $this->database = $database;
    }

    public function buscarUsuario ($email , $password){

        $sql = "SELECT * FROM usuario WHERE email ='" . $email . "' AND contraseña = '" . $password . "'";

        $resultado = $this->database->execute($sql);

        if ($resultado->num_rows > 0) {

            header("Location: http://localhost/index");

        } else{

            header("Location: http://localhost/login");

        }

    }

}


