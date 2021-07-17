<?php


class CosteoModel {

	private $database;

	public function __construct($database){
		$this->database = $database;
	}

	public function getKmsTotalesByIdViaje($id) {
		$sql = "SELECT km FROM costeo WHERE id_viaje = ${id} ORDER BY id DESC LIMIT 1";

		return mysqli_fetch_assoc($this->database->execute($sql));
	}

	public function insertarCosteo($id, $litros, $km, $importe, $extras, $peaje, $viatico, $latitud, $longitud) {
		$sql = "INSERT INTO costeo(id_viaje, litros, km, importe, extras, peaje, viatico, latitud, longitud)
				values(${id}, ${litros}, ${km}, ${importe}, ${extras}, ${peaje}, ${viatico}, ${latitud}, ${longitud})";

		return $this->database->execute($sql);
	}

	public function getCosteosTotal($idViaje) {
		$sql = "SELECT * FROM costeo WHERE id_viaje = ${idViaje}";

		return mysqli_fetch_all($this->database->execute($sql));
	}
}