<?php

class mecanicoModel{

    private $database;

    public function __construct($database){

        $this->database = $database;
    }

 public function insertMantenimiento($idVehiculo, $fechaService, $costoVehiculo, $serviceInternoExterno, $repuestoCambiado, $IDvehiculo, $idMecanico){   


    $sql= "INSERT INTO mantenimiento (fecha, costo, tipo, repuesto_cam, id_camion, id_mecanico)
           VALUES ('${fechaService}', '${costoVehiculo}', '${serviceInternoExterno}', '${repuestoCambiado}', '${IDvehiculo}', '${idMecanico}')";

    $var= $this->database->execute($sql);    

 }
}