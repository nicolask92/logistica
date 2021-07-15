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
		$coleccionDeViajes = [];
		foreach ($this->model->getInformacionViaje() as $viaje) {
			array_push($coleccionDeViajes, [
				'id' => $viaje[0],
				'origen' => $viaje[1],
				'destino' => $viaje[2],
				'fecha_carga' => $viaje[3],
				'estado' => $viaje[4]
			]);
		}
		$viajes = $coleccionDeViajes;

		echo json_encode($viajes);
	}

	public function procesarReporteDiario() {

		$valoresReporte = $_POST['datos'];

		echo json_encode($valoresReporte);
	}

}
