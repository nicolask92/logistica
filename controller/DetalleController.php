<?php


class DetalleController
{
    private $detalleModel;
    private $render;

    public function __construct($detalleModel, $render)
    {
        $this->detalleModelModel= $detalleModel;
        $this->render = $render;
    }

    public function execute(){

        echo $this->render->render("view/detalleView.php");

    }

}