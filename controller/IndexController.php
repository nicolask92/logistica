<?php

class IndexController
{
    private $render;


    public function __construct($render)
    {
        $this->render = $render;
    }

    public function execute()
    {
      if (isset($_GET["cargado"])){

          $data["viajeCargado"] = true;

      }

      

      echo $this->render->render("view/homeView.php", $data);
    }


}
