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
        $data["empleadoActual"] = $this->perfilModel->getEmpleadoActual($id);
        $data["choferActual"] = $this->perfilModel->getChoferActual($id);

        echo $this->render->render("view/perfilView.php" , $data);

    }

    public function actualizarPerfil()
    {
        $id= $_SESSION["idUsuarioActual"];
        $idChofer = $this->perfilModel->idChoferActual($id);
        
        $licencia = $_POST["licencia"];
        $patente = $_POST["patente"];

        $this->perfilModel->actualizarLicencia($idChofer["id"], $licencia, $patente);


    }

}