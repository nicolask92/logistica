<?php
include_once("helper/SessionManager.php");

class UrlHelper {

    public function getModuleFromRequestOr($default){
        $sm = new SessionManager();
        $isSetModulo = isset($_GET['module']);

        if ($isSetModulo && ($sm->chequearSesion($_GET["module"]))) {
            return $_GET["module"];
        } else {
            return $default;
        }
    }

    public function getActionFromRequestOr($default){
        return isset($_GET["action"]) ? $_GET["action"] : $default;
    }
}