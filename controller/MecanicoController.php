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
        $data["mecanico"] = $this->mecanicoModel->buscarMecanico();


         if(isset($_GET["mensaje"])){
            $array["alerta"]= "alert alert-success";
            $array["mensaje"]= "Los datos se cargaron correctamente"; 
        }
        
        
        echo $this->render->render("view/mecanicoView.php", $array, $data);
        
        var_dump($data);
    }
    

    public function procesarMantenimiento(){

        $idMecanico= $_POST["idMecanico"];
        $idVehiculo= $_POST["idVehiculo"];
        $serviceInternoExterno= $_POST["serviceInternoExterno"];
        $fechaService= $_POST["fechaService"];
        $repuestoCambiado= $_POST["repuestoCambiado"];
        $IDvehiculo= $_POST["IDvehiculo"];
        $costoVehiculo= $_POST["costoVehiculo"];
    
        $this->mecanicoModel->insertMantenimiento($idVehiculo, $fechaService, $costoVehiculo, 
                        $serviceInternoExterno, $repuestoCambiado, $IDvehiculo, $idMecanico);

         header("location:/mecanico?mensaje=true");  

       
    }
                                         
}