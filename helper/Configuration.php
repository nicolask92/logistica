<?php
include_once("helper/MysqlDatabase.php");
include_once("helper/Render.php");
include_once("helper/UrlHelper.php");

include_once("model/TourModel.php");
include_once("model/SongModel.php");
include_once("model/LoginModel.php");
include_once ("model/AdminModel.php");

include_once("controller/SongController.php");
include_once("controller/TourController.php");
include_once("controller/QuieroSerParteController.php");
include_once("controller/IndexController.php");
include_once("controller/CargarViajeController.php");
include_once("controller/AdminController.php");


include_once("controller/LoginController.php");

include_once('third-party/mustache/src/Mustache/Autoloader.php');
include_once("Router.php");

class Configuration{
    public function getPresentacionModel(){
        $database = $this->getDatabase();
        return new TourModel($database);
    }

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

    public function getCancionModel(){
        $database = $this->getDatabase();
        return new SongModel($database);
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

    public function getTourController(){
        $presentacionModel = $this->getPresentacionModel();
        return new TourController($presentacionModel, $this->getRender());
    }

    public function getSongController(){
        $cancionesModel = $this->getCancionModel();
        return new SongController($cancionesModel, $this->getRender());
    }

    public function getQuieroSerParteController(){
        return new QuieroSerParteController($this->getRender());
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
