<?php

class MecanicoController
{
    private $render;

    public function __construct($render)
    {
        $this->render = $render;
    }

    public function execute()
    {
        echo $this->render->render("view/mecanicoView.php");
    }



    $connect= mysql_connect("localhost","root","");
    if(!$connect){
        echo "No se pudo conectar con el servidor";
    }else{
        $g7=mysql_select_db("g7");
        if(!$g7){
            echo "No se encontro la base de datos";
        }
    }

    $idMecanico= $_POST["idMecanico"];
    $idVehiculo= $_POST["idVehiculo"];
    $serviceInternoExterno= $_POST["serviceInternoExterno"];
    $fechaService= $_POST["fechaService"];
    $repuestoCambiado= $_POST["repuestoCambiado"];
    $IDvehiculo= $_POST["IDvehiculo"];
    $costoVehiculo= $_POST["costoVehiculo"];

    $sql= "INSERT INTO mantenimiento VALUES ("idVehiculo",
                                              "fechaService",
                                              "costoVehiculo",
                                              "serviceInternoExterno",
                                              "repuestoCambiado",
                                              "IDvehiculo",
                                              "idMecanico")";
    $ejecutar=mysql_query($sql);
    if(!$ejecutar){
        echo "Hubo un error";
    }else{
        echo "Datos guardados correctamente";
    }                                         
}