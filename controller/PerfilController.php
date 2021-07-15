<?php


class PerfilController
{
    private $perfilModel;
    private $render;

    public function __construct($perfilModel, $render)
    {
        $this->perfilModel = $perfilModel;
        $this->render = $render;

    }

    public function execute()
    {

        echo $this->render->render("view/perfilView.php");

    }

}