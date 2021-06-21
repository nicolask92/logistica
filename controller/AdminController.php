<?php

class AdminController
{
    private $render;
    private $database;

    public function __construct($database, $render)
    {
        $this->render = $render;
        $this->database = $database;
    }

    public function execute()
    {
        $result = $this->database->get();
        $data["users"] = $result;
        echo $this->render->render("view/adminView.php",$data);
    }
}
