<?php

class ChoferController
{
	private $model;
	private $render;

	public function __construct($model, $render)
	{
		$this->model = $model;
		$this->render = $render;
	}

	public function execute()
	{
		include("third-party/phpqrcode/qrlib.php");
		$fecha = new DateTime();
		$momentoActual = $fecha->getTimestamp();
		$rutaImagenAGuardar = "view/img/qrs/" . $momentoActual . ".png";

		$rutaTotal = $_SERVER['HTTP_HOST'] . "/reporteDiario/" . $_GET['id'];

		QRcode::png($rutaTotal, $rutaImagenAGuardar, QR_ECLEVEL_L, 8);

		$data['urlQr'] = $rutaImagenAGuardar;
		$data['urlViaje'] = $rutaTotal;

		echo $this->render->render("view/verQrView.php", $data);
	}

	public function reporteDiario() {
		$data['mapa'] = true;
		echo $this->render->render("view/cargarReporteView.php", $data);
	}

	public function informacionViaje(){

		$viajes = $this->model->getInformacionViaje();

		echo json_encode($viajes);
	}

	public function procesarReporteDiario() {

		$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

		echo json_encode($arr);
	}

}
