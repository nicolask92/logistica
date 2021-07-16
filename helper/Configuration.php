<?php
include_once("helper/MysqlDatabase.php");
include_once("helper/Render.php");
include_once("helper/UrlHelper.php");

include_once("model/LoginModel.php");
include_once("model/AdminModel.php");
include_once("model/CargarViajeModel.php");
include_once("model/RegistroModel.php");
include_once("model/mecanicoModel.php");
include_once("model/ViajesModel.php");
include_once("model/DetalleModel.php");
include_once("model/ChoferModel.php");
include_once("model/PerfilModel.php");


include_once("controller/IndexController.php");
include_once("controller/CargarViajeController.php");
include_once("controller/AdminController.php");
include_once("controller/LoginController.php");
include_once("controller/MecanicoController.php");
include_once("controller/RegistroController.php");
include_once("controller/ChoferController.php");
include_once("controller/AccessDeniedY404Controller.php");
include_once("controller/DetalleController.php");
include_once("controller/PerfilController.php");
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
        $obj_mysqlDatabase = $this->getDatabase();
        return new AdminModel($obj_mysqlDatabase);
    }

    public function getCargarViajeModel(){
        $database = $this->getDatabase();
        return new CargarViajeModel($database);
    }

    public function getDetalleModel(){
        $database = $this->getDatabase();
        return new DetalleModel($database);
    }

    public function getPerfilModel(){
            $database = $this->getDatabase();
            return new PerfilModel($database);
        }


    public function getViajesModel(){
            $database = $this->getDatabase();
            return new ViajesModel($database);
        }

	public function getRegisterModel(){
		$database = $this->getDatabase();
		return new RegistroModel($database);
	}

    public function getMecanicoModel(){
		$database = $this->getDatabase();
		return new MecanicoModel($database);
	}

	public function getChoferModel(){
		$database = $this->getDatabase();
		return new ChoferModel($database);
	}

    public function getRender(){
        return new Render('view/partial');
    }

    public function getIndexController(){
        $viajesModel = $this->getViajesModel();
        return new IndexController($viajesModel, $this->getRender());
    }

    public function getCargarViajeController(){
            $cargarViajeModel = $this->getCargarViajeModel();
            return new CargarViajeController($cargarViajeModel, $this->getRender());
    }

    public function getDetalleController(){
            $detalleModel = $this->getDetalleModel();
            return new DetalleController($detalleModel, $this->getRender());
    }

     public function getPerfilController(){
                $perfilModel = $this->getPerfilModel();
                return new PerfilController($perfilModel, $this->getRender());
        }

    public function getLoginController(){
           $loginModel = $this->getLogearseModel();
           return new LoginController($loginModel, $this->getRender());
    }


    public function getMecanicoController(){
        $mecanicoModel = $this->getmecanicoModel();
        return new MecanicoController($mecanicoModel, $this->getRender());
    }

    public function getRegistroController(){
	    $registerModel = $this->getRegisterModel();
        return new RegistroController($registerModel, $this->getRender());
    }

	public function getChoferController(){
		$choferModel = $this->getChoferModel();
		return new ChoferController($choferModel, $this->getRender());
	}

     public function getUsuariosController()
     {
        $adminModel = $this->getAdminModel();
        return new AdminController($adminModel, $this->getRender());
     }

    public function getAccessDeniedY404Controller()
    {
        return new AccessDeniedY404Controller($this->getRender());
    }

    public function getRouter(){
        return new Router($this);
    }

    public function getUrlHelper(){
        return new UrlHelper();
    }
}
