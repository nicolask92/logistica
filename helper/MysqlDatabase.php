<?php

class MysqlDatabase{
    private $connection;

    public function __construct($servername, $username, $password, $dbname){
	    @$conn = new mysqli(
            $servername,
            $username,
            $password,
            $dbname,
            3306
        );

        if ($conn->connect_errno) {
	        $conn = new mysqli(
		        $servername,
		        $username,
		        $password,
		        $dbname,
		        3307
	        );
	        if ($conn->connect_errno) {
		        die("Connection failed: " . $conn->connect_error);
	        }
        }
        $this->connection = $conn;
    }

    public function query($sql){
        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
    }

    public function execute($sql){
	    return $this->connection->query($sql);
    }
}