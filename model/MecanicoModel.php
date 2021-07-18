<?php

class MecanicoModel{

    private $database;

    public function __construct($database){

        $this->database = $database;
    }

    public function insertMantenimiento($idVehiculo, $fechaService, $costoVehiculo, $serviceInternoExterno, $repuestoCambiado, $IDvehiculo, $idMecanico){   


        $sql= "INSERT INTO mantenimiento (fecha, costo, tipo, repuesto_cam, id_camion, id_mecanico)
           VALUES ('${fechaService}', '${costoVehiculo}', '${serviceInternoExterno}', '${repuestoCambiado}', '${IDvehiculo}', '${idMecanico}')";

        $var= $this->database->execute($sql);    

    }

    public function buscarMecanico(){

        $sql = "SELECT mecanico.id, usuario.nombre, usuario.apellido 
                FROM usuario 
                JOIN empleado ON empleado.usuario_id = usuario.id
                JOIN mecanico ON empleado.legajo = mecanico.legajo";

        $resultado = $this->database->execute($sql);

        return $resultado;
    }

    public function buscarVehiculos(){

        $sql = "SELECT id, marca, modelo FROM camiones";

        $resultado = $this->database->query($sql);
        
        return $resultado;

    }

}