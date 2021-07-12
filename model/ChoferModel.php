<?php
class ChoferModel{

	private $database;

    public function __construct($database){
	    $this->database = $database;
    }

	public function getInformacionViaje($id) {
    	$sql = "
				SELECT id, origen, destino, fecha_carga, estado
    	        FROM viaje
				WHERE id = ${id}
    	";

		return mysqli_fetch_assoc($this->database->execute($sql));
	}
}