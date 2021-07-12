<?php
class ChoferModel{

	private $database;

    public function __construct($database){
	    $this->database = $database;
    }

	public function getInformacionViaje() {
    	$sql = "
				SELECT id, origen, destino, fecha_carga, estado
    	        FROM viaje
    	";

		return mysqli_fetch_all($this->database->execute($sql));
	}
}