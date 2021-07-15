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
        $id= $_SESSION["idUsuarioActual"];

        $data["usuarioActual"] = $this->perfilModel->getUsuarioActual($id);

        echo $this->render->render("view/perfilView.php" , $data);

    }

}