<?php

include_once 'helper/SessionManager.php';

class RegistroController
{
    private $render;
    private $model;

    public function __construct($model, $render)
    {
    	$this->model = $model;
        $this->render = $render;
    }

    public function execute()
    {
	    $sm = new SessionManager();
	    if ($sm->chequearSesion()) {
		    header('location: /');
	    } else {
		    echo $this->render->render("view/registroView.php");
	    }
    }

    public function procesarRegistro()
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $contrasenia = md5($_POST['password']);
        $nacimiento = $_POST["fechaNac"];
        $dni = $_POST["dni"];
        $errores = array();

        if (empty($nombre)) {
            $errores['errorNombre'] = true;
        }

        if (empty($apellido)) {
            $errores['errorApellido'] = true;
        }

        if (empty($email)) {
            $errores['errorEmail'] = true;
        }

        if (empty($contrasenia)) {
            $errores['errorContrasenia'] = true;
        }
        if (empty($nacimiento)) {
            $errores['errorFechaNac'] = true;
        }
        if (empty($dni)) {
            $errores['errorDni'] = true;
        }
        if (!empty($errores)) {
            $errores['error'] = true;
            $errores['nombre'] = $nombre;
            $errores['apellido'] = $apellido;
            $errores['email'] = $email;
            $errores['dni'] = $dni;
            $errores['fechaDeNacimiento'] = $nacimiento;
            echo $this->render->render("view/registroView.php", $errores);
        } else {
        	// genero el codigo
        	$codigo = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
        	$urlActivacion = $_SERVER['HTTP_HOST'] . "/registro/procesarCodigo?codigo=" . $codigo . "&email=" . $email;
	        $headers  = 'MIME-Version: 1.0' . "\r\n";
	        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

			// cuerpo del msj
	        $textoConElCodigo = "El codigo es ${codigo}. Si quiere activarlo directamente haga click <a href='" . $urlActivacion . "' target=_blank" .">aquì</a>";

	        // envio el correo.
	        $correo = mail($email,"Codigo de activacion - Logistica", $textoConElCodigo, $headers);

	        if ($correo) {
		        // guardo en la bd
		        $this->model->crearUsuario($nombre, $apellido, $email, $contrasenia, $codigo,$dni,$nacimiento);

		        $errores['seEnvioCorrectamente'] = true;
		        header('location: /registro/codigo?seEnvioCorrectamente=true');
	        } else {
		        $errores['errorEnviando'] = true;
		        echo $this->render->render("view/registroView.php", $errores);
	        }
        }
    }

    public function codigo()
    {
		$data = null;
    	if (isset($_GET['seEnvioCorrectamente'])) {
    		$data['seEnvioCorrectamente'] = true;
	    }
        echo $this->render->render("view/registroSegundoPasoView.php", $data);
    }

    public function procesarCodigo() {
    	$email = null;
    	$codigo = null;
	    if (isset($_GET['codigo']) && isset($_GET['email'])) {
		    $email = $_GET['email'];
		    $codigo = $_GET['codigo'];
	    } else if (isset($_POST['codigo']) && isset($_POST['email'])) {
		    $email = $_POST['email'];
		    $codigo = $_POST['codigo'];
	    }

        $errores = array();

        if (empty($email)) {
            $errores['errorEmail'] = true;
        }

        if (empty($codigo)) {
            $errores['errorCodigo'] = true;
        }

        if (!empty($errores)) {
	        $errores['error'] = true;
            $errores['email'] = $email;
            $errores['codigo'] = $codigo;
            echo $this->render->render("view/registroSegundoPasoView.php", $errores);
        } else {
	        $seActivo = $this->model->activarCuenta($email, intval($codigo));
	        if ($seActivo) {
				header('location: /login?cuentaActivada=true');
	        } else {
		        $errores['error'] = true;
		        $errores['errorEnConsulta'] = true;
		        echo $this->render->render("view/registroSegundoPasoView.php", $errores);
	        }
        }
    }
}

