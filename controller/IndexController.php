<?php

class IndexController
{
    private $viajesModel;
    private $render;


    public function __construct($viajesModel, $render)
    {
        $this->viajesModel= $viajesModel;
        $this->render = $render;
    }

    public function execute()
    {

        if (isset($_GET["cargado"])) {

            $data["viajeCargado"] = true;
        }

        $data["viajes"] = $this->viajesModel->getViajes();
        $data["mantenimiento"] = $this->viajesModel->getMantenimiento();

        echo $this->render->render("view/homeView.php", $data);
    }

}
