<?php

class AccessDeniedY404Controller {
    private $render;

    public function __construct($render)
    {
        $this->render = $render;
    }

    public function paginaNoExiste()
    {
        echo $this->render->render("view/404View.php");
    }

    public function accesoDenegado() {
        echo $this->render->render("view/accesoDenegadoView.php");
    }
}
