<?php

class MysqlDatabase{
    private $connection;

    public function __construct($servername, $username, $password, $dbname){
        $conn = mysqli_connect(
            $servername,
            $username,
            $password,
            $dbname,
            3306
        );

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $this->connection = $conn;
    }

    public function query($sql){qwdqwdq
        $result = mysqli_query($this->connection, $sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    public function execute($sql){
        mysqli_query($this->connection, $sql);
    }
}