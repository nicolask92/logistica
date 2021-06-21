<?php
include_once("helper/SessionManager.php");

class UrlHelper {

    public function getModuleFromRequestOr($default){
        $sm = new SessionManager();
        return (isset($_GET["module"]) && $sm->chequearSesion()) ? $_GET["module"] : $default;
    }

    public function getActionFromRequestOr($default){
        return (isset($_GET["action"])) ? $_GET["action"] : $default;
    }
}