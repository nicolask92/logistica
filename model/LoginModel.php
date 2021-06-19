<?php


class LoginModel
{

    private $database;

    public function __construct($database)
    {

        $this->database = $database;
    }

    public function buscarUsuario($email, $password)
    {
        $sql = "SELECT * FROM usuario WHERE email =" . $email . " AND contraseña = " . $password;

        return $this->database->query($sql);


    }

}


