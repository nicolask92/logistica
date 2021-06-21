<?php
include_once("helper/MysqlDatabase.php");
include_once("helper/Render.php");
include_once("helper/UrlHelper.php");

include_once("model/LoginModel.php");
include_once("model/AdminModel.php");

include_once("controller/IndexController.php");
include_once("controller/CargarViajeController.php");
include_once("controller/AdminController.php");
include_once("controller/LoginController.php");

include_once('third-party/mustache/src/Mustache/Autoloader.php');
include_once("Router.php");

class Configuration{

    private function getDatabase(){
        $config = $this->getConfig();
        return new MysqlDatabase(
            $config["servername"],
            $config["username"],
            $config["password"],
            $config["dbname"]
        );
    }

    private function getConfig(){
        return parse_ini_file("config/config.ini");
    }

    public function getLogearseModel(){
        $database = $this->getDatabase();
        return new LoginModel($database);
    }

    public function getAdminModel(){
        $database = $this->getDatabase();
        return new AdminModel($database);
    }

    public function getRender(){
        return new Render('view/partial');
    }

    public function getIndexController(){
        return new IndexController($this->getRender());
    }

    public function getCargarViajeController(){
            return new CargarViajeController($this->getRender());
    }

    public function getLoginController(){
           $loginModel = $this->getLogearseModel();
           return new LoginController($loginModel, $this->getRender());
    }

     public function getAdminController()
     {
            $adminModel = $this->getAdminModel();
            return new AdminController($adminModel, $this->getRender());
     }


    public function getRouter(){
        return new Router($this);
    }

    public function getUrlHelper(){
        return new UrlHelper();
    }
}
