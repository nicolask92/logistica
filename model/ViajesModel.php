<?php


class ViajesModel
{
    private $database;

    public function __construct($database){

        $this->database = $database;
    }

    public function getViajes(){

        $sql = "SELECT u.nombre as 'nombreSupervisor', u.apellido as 'apellidoSupervisor', viaje.id, viaje.origen, viaje.destino, viaje.fecha_carga, viaje.estado, u2.nombre as 'nombreChofer', u2.apellido as 'apellidoChofer' 
                FROM viaje
                join chofer ch on viaje.id_chofer = ch.id 
                join supervisor on viaje.id_supervisor = supervisor.id 
                join empleado e on supervisor.legajo = e.legajo 
                join usuario u on e.usuario_id = u.id
                join empleado e2 on ch.legajo = e2.legajo 
                join usuario u2 on e2.usuario_id = u2.id";

        $resultado = $this->database->execute($sql);

        return $resultado;
    }

}