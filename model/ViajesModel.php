<?php


class ViajesModel
{
    public $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function getViajes(){
	    $idChofer = $this->getIdChoferByIdUsuario();

    	$filtrarPorChofer = "";
	    if (!empty($idChofer)) {
	    	$filtrarPorChofer = " WHERE viaje.id_chofer = ${idChofer}";
	    }

        $sql = "SELECT u.nombre as 'nombreSupervisor', u.apellido as 'apellidoSupervisor', viaje.id, viaje.origen, viaje.destino, viaje.fecha_carga, viaje.estado, u2.nombre as 'nombreChofer', u2.apellido as 'apellidoChofer' 
                FROM viaje
                join chofer ch on viaje.id_chofer = ch.id 
                join supervisor on viaje.id_supervisor = supervisor.id 
                join empleado e on supervisor.legajo = e.legajo 
                join usuario u on e.usuario_id = u.id
                join empleado e2 on ch.legajo = e2.legajo 
                join usuario u2 on e2.usuario_id = u2.id";
	    $sql = $sql . $filtrarPorChofer;

	    return $this->database->execute($sql);
    }

    public function getMantenimiento(){
        $sql= "SELECT usuario.nombre as 'nombreMecanico', usuario.apellido as 'apellidoMecanico', mantenimiento.id, mantenimiento.fecha, mantenimiento.costo, mantenimiento.tipo, mantenimiento.repuesto_cam, camiones.patente
                FROM mantenimiento
                join mecanico on mantenimiento.id_mecanico = mecanico.id 
                join empleado on mecanico.legajo = empleado.legajo 
                join usuario on empleado.usuario_id = usuario.id
                join camiones on mantenimiento.id_camion = camiones.id";

        $resultado = $this->database->execute($sql);

        return $resultado;
    }

	public function getInformacionViaje() {
    	$idChofer = $this->getIdChoferByIdUsuario();

		$sql = "
			SELECT id, origen, destino, fecha_carga, estado
            FROM viaje
			WHERE id_chofer = ${idChofer}
    	";

		return mysqli_fetch_all($this->database->execute($sql));
	}

	public function getIdChoferByIdUsuario() {
		$idUsuario = intval($_SESSION['idUsuarioActual']);

		$getChoferById = "
    	SELECT ch.id
    	FROM usuario us join empleado em on us.id = em.usuario_id
    					join chofer ch on ch.legajo = em.legajo
		WHERE us.id = ${idUsuario}
    	";

		return isset($this->database->query($getChoferById)['id']) ? intval($this->database->query($getChoferById)['id']) : null;
	}

	public function actualizarViaje($id, $extras, $peajes, $litros, $kmTotales, $viaticos, $importe, $fee, $gastoTotal) {

    	$sql = "
			UPDATE viaje
			SET kilometros_real = ${kmTotales}, fecha_llegada_real = now(), combustible_real = ${litros}, importe_combustible_real = ${importe}, peajes_real = ${peajes}, viaticos_real = ${viaticos} , extras_real = ${extras}, fee_real = ${fee}, estado = 'FINALIZADO', gasto_total = ${gastoTotal}
			WHERE id = ${id}
    	";

		return $this->database->execute($sql);
	}

	public function empezarViajeYActualizarEstado($idViaje, $pesaje) {
    	$sql = "
    	    UPDATE viaje
    	    SET estado = 'ACTIVO', fecha_salida_real = now(), pesajes_real = ${pesaje}
			WHERE id = ${idViaje}
    	";

		return $this->database->execute($sql);
	}

	public function getViajePorChoferId($idChofer) {
		$sql = "
			SELECT *
			FROM viaje
			WHERE id_chofer = ${idChofer}
		";

		$resultado = $this->database->query($sql);

		return (isset($resultado) ? $this->database->query($sql) : null);
	}

	public function getViajeById($id) {
		$sql = "
			SELECT *
			FROM viaje
			WHERE id = ${id}
		";

		$resultado = $this->database->query($sql);

		return (isset($resultado) ? $this->database->query($sql) : null);
	}
}