<?php


class DetalleController
{
    private $detalleModel;
    private $render;

    public function __construct($detalleModel, $render)
    {
        $this->detalleModel= $detalleModel;
        $this->render = $render;
    }

    public function execute(){

        $id=$_GET["id"];
        $data["viaje"]= $this->detalleModel->getViaje($id);
        $data["carga"]= $this->detalleModel->getCarga($id);
        $data["cliente"]= $this->detalleModel->getCliente($id);
        $data["costeo"]= $this->detalleModel->getCosteo($id);

        echo $this->render->render("view/detalleView.php", $data);

    }

}