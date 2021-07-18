<?php

class MecanicoController
{
    private $render;
    private $mecanicoModel;

    public function __construct($mecanicoModel, $render)
    {
        $this->mecanicoModel = $mecanicoModel;
        $this->render = $render;
    }

    public function execute()
    {
        $data["datosMecanico"] = $this->mecanicoModel->buscarMecanico();
        $data["seleccionarVehiculo"] = $this->mecanicoModel->buscarVehiculos();

        if(isset($_GET["mensaje"])){
            $array["alerta"]= "alert alert-success";
            $array["mensaje"]= "Los datos se cargaron correctamente"; 
        }
        
        echo $this->render->render("view/mecanicoView.php", $data);
        
        if(isset($_GET["errorDatosMecanico"])){
            $data["errorDatosMecanico"] = true;
        }
        if(isset($_GET["errorSeleccionarVehiculo"])){
            $data["errorSeleccionarVehiculo"] = true;
        }
        if(isset($_GET["errorTipoService"])){
            $data["errorTipoService"] = true;
        }
        if(isset($_GET["tipoService"])){
            $data["tipoService"] =$_GET["tipoService"];
        }
        if(isset($_GET["errorFechaService"])){
            $data["errorFechaService"] = true;
        }
        if(isset($_GET["fechaService"])){
            $data["fechaService"] = $_GET["fechaService"];
        }
        if(isset($_GET["errorRepuestoCambiado"])){
            $data["errorRepuestoCambiado"] = true;
        }
        if(isset($_GET["repuestoCambiado"])){
            $data["repuestoCambiado"] = $_GET["repuestoCambiado"];
        }
        if(isset($_GET["errorCostoVehiculo"])){
            $data["errorCostoVehiculo"] = true;
        }
        if(isset($_GET["costoVehiculo"])){
            $data["costoVehiculo"] = $_GET["costoVehiculo"];
        }
    }
    

    public function procesarMantenimiento(){

        $idMecanico= $_POST["datosMecanico"];
        $idVehiculo= $_POST["seleccionarVehiculo"];
        $serviceInternoExterno= $_POST["tipoService"];
        $fechaService= $_POST["fechaService"];
        $repuestoCambiado= $_POST["repuestoCambiado"];
        $costoVehiculo= $_POST["costoVehiculo"];
    
        $errores="";
        $campos="";
        if (empty($idMecanico)) {
            $errores = $errores."errorDatosMecanico=true&";
        }
        if (empty($idVehiculo)) {
            $errores = $errores. "errorSeleccionarVehiculo=true&";
        } 
        if (empty($serviceInternoExterno)) {
            $errores = $errores. "errorTipoService=true&";
        } else {
            $campos= $campos. "tipoService=".$serviceInternoExterno."&";
        }
        if (empty($fechaService)) {
            $errores = $errores. "errorFechaService=true&";
        }
        if (empty($repuestoCambiado)) {
            $errores = $errores. "errorRepuestoCambiado=true&";
        } else {
            $campos= $campos. 'repuestoCambiado=' . $destino . '&';
        }
        if (empty($costoVehiculo)) {
            $errores = $errores. "errorCostoVehiculo=true&";
        } else {
            $campos= $campos. "costoVehiculo=".$fecha_carga."&";
        }
        if (!empty($errores)) {
            header("Location: /mecanico?".$errores.$campos);
        } else {


        $this->mecanicoModel->insertMantenimiento($idVehiculo, $fechaService, $costoVehiculo, 
                        $serviceInternoExterno, $repuestoCambiado, $IDvehiculo, $idMecanico);

         header("location:/mecanico?mensaje=true");  
        }
    }
}                                      
