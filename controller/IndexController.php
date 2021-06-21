<?php

class IndexController
{
    private $render;
    private $configController;

    public function __construct($render)
    {
        $this->render = $render;
        $this->configController = new Configuration();
    }

    public function execute() {
        if ( $_SESSION["usuario"] == "admin"){
            return $this->configController->getAdminController()->execute();
        }
        if ($_SESSION["usuario"] == "chofer"){
            return $this->configController->getChoferController()->execute();
        }
    }


}