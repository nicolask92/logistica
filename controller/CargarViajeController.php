<?php


class CargarViajeController
{
    private $cargarViajeModel;
    private $render;

    public function __construct($cargarViajeModel, $render)
    {
        $this->cargarViajeModel= $cargarViajeModel;
        $this->render = $render;
    }

    public function execute()
    {
        $data["choferes"] = $this->cargarViajeModel->buscarChoferes();
        $data["camiones"] = $this->cargarViajeModel->buscarCamiones();
        $data["arrastradores"] = $this->cargarViajeModel->buscarArrastradores();
        $data["supervisores"] = $this->cargarViajeModel->buscarSupervisores();
        echo $this->render->render("view/cargarViajeView.php", $data);
    }

    public function procesarCargaViaje(){

        $origen = $_POST["origenViaje"];
        $destino= $_POST["destinoViaje"];
        $fecha_carga= $_POST["fechaCarga"];
        $id_supervisor= $_POST["supervisorViaje"];
        $legajo_chofer= $_POST["choferViaje"];
        $id_camion= $_POST["camionViaje"];
        $id_arrastrador= $_POST["arrastradorViaje"];
        $destino= $_POST[""];
        $destino= $_POST[""];
        $destino= $_POST[""];
        $destino= $_POST[""];
        $destino= $_POST[""];

    }
}