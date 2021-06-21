<?php


class CargarRolesController
{
    private $render;

    public function __construct($render)
    {
        $this->render = $render;
    }

    public function execute()
    {
      if (!isset($_POST["new_user_register"])) {
        $data["mensaje"] = "Hay nuevos usuarios pendientes de asignacion de rol";
        $data["tipo"] = "alert-warning";
      }else{
        $data["mensaje"] = "No hay usuarios pendientes";
        $data["tipo"] = "alert-info";
      }

        echo $this->render->render("view/cargarRolesView.php", $data);
    }

}
