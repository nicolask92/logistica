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


}