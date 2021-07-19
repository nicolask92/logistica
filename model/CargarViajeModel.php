<?php


class CargarViajeModel
{
    private $database;

    public function __construct($database){

        $this->database = $database;
    }

    public function buscarChoferes(){

        $sql = "SELECT chofer.id , usuario.nombre, usuario.apellido 
                FROM usuario 
                JOIN empleado ON empleado.usuario_id = usuario.id
                JOIN chofer ON empleado.legajo = chofer.legajo";

        $resultado = $this->database->execute($sql);

        return $resultado;

    }

    public function buscarSupervisores(){

        $sql = "SELECT supervisor.id , usuario.nombre, usuario.apellido 
                FROM usuario 
                JOIN empleado ON empleado.usuario_id = usuario.id
                JOIN supervisor ON empleado.legajo = supervisor.legajo";

        $resultado = $this->database->execute($sql);

        return $resultado;

    }


    public function buscarCamiones(){

        $sql = "SELECT id, marca, modelo, patente FROM camiones";

        $resultado = $this->database->execute($sql);

        return $resultado;

    }

    public function buscarArrastradores()
    {

        $sql = "SELECT id, tipo, patente FROM arrastrador";

        $resultado = $this->database->execute($sql);

        return $resultado;

    }

    public function insertViaje(
    	$origen,
	    $destino,
	    $fecha_carga,
	    $estado,
	    $id_supervisor,
	    $id_chofer,
	    $id_camion,
	    $id_arrastrador,
	    $eta,
	    $etd,
	    $combustible_p,
	    $km_p,
	    $viaticos_p,
	    $peajes_p,
	    $pesajes_p,
	    $extras_p,
	    $fee_p,
	    $hazard_precio,
	    $reefer_precio,
	    $gastoCombustiblePreviso) {

        $sql = "INSERT INTO viaje 	(origen, destino, fecha_carga, estado, id_supervisor, id_chofer,id_camion, id_arrastrador, fecha_llegada_previsto, fecha_salida_previsto, combustible_previsto,kilometros_previsto, viaticos_previsto, peajes_previsto, pesajes_previsto, extras_previsto, fee_previsto, hazard_precio, reefer_precio, importe_combustible_previsto)
                VALUES 				('$origen', '$destino', '$fecha_carga','$estado','$id_supervisor', '$id_chofer','$id_camion','$id_arrastrador','$eta','$etd','$combustible_p','$km_p','$viaticos_p','$peajes_p', '$pesajes_p','$extras_p','$fee_p', '$hazard_precio','$reefer_precio', '$gastoCombustiblePreviso')";

       $this->database->execute($sql);
    }

    public function ultimoId(){

        $sql = "SELECT MAX(id) AS id FROM viaje";

        $resultado = $this->database->query($sql);

        return $resultado;

    }

    public function insertCliente($nombre_cliente, $apellido_cliente, $cuit_cliente, $domicilio_cliente,
                                  $tel_cliente, $email_cliente, $id_viaje){

        $sql = "INSERT INTO cliente( `nombre`, `apellido`, `telefono`, `cuit`, `direccion`, `email`, `id_viaje`) 
                VALUES ('$nombre_cliente','$apellido_cliente','$tel_cliente','$cuit_cliente','$domicilio_cliente',
                        ' $email_cliente','$id_viaje')";

        $this->database->execute($sql);

    }

    public function getTipoCarga($id_arrastrador){

        $sql ="SELECT tipo FROM arrastrador WHERE id=". $id_arrastrador;

        $resultado = $this->database->query($sql);

        return $resultado;

    }

    public function insertCarga ($tipo_carga, $hazard, $imo, $reefer, $temperatura, $peso_neto, $id_viaje){

        $sql ="INSERT INTO `carga`(`tipo_carga`, `hazard`, `imo_class`, `reefer`, `temperatura`, `peso_neto`, `id_viaje`) 
            VALUES ('$tipo_carga','$hazard','$imo','$reefer','$temperatura','$peso_neto','$id_viaje')";

        $resultado =$this->database->execute($sql);



    }

}