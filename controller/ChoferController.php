<?php

class ChoferController
{
	private $choferModel;
	private $render;
	private $costeoModel;

	public function __construct($choferModel, $costeoModel, $render)
	{
		$this->choferModel = $choferModel;
		$this->render = $render;
		$this->costeoModel = $costeoModel;
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
		foreach ($this->choferModel->getInformacionViaje() as $viaje) {
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
		$error = false;
		$errores = [];

		$id = $valoresReporte['idViaje'];
		$litros = $valoresReporte['litros'];
		$km = $valoresReporte['km'];
		$importe = $valoresReporte['importe'];
		$extras = $valoresReporte['extras'];
		$peaje = $valoresReporte['peaje'];
		$latitud = $valoresReporte['latitud'];
		$longitud = $valoresReporte['longitud'];
		$kmRecorridosAnterioresEnArray = $this->costeoModel->getKmsTotalesByIdViaje();
		$kmTotalesHastaElMomento = 0;

		foreach ($kmRecorridosAnterioresEnArray as $kmIndividual) {
			$kmTotalesHastaElMomento += $kmIndividual;
		}

		if (!isset($id) || !isset($litros) || !isset($km) || !isset($importe) || !isset($extras) || !isset($peaje) || !isset($latitud) || !isset($longitud)) {
			// nunca deberia entrar por aca.
			$error = true;
			array_push($errores, 'Error en los datos enviados. Alguno de los campos es nulo.');
		} else {
			if ($litros > 0 && $importe == 0) {
				$error = true;
				array_push($errores, 'El importe no puede ser cero si hay litros cargados.');
			}
			if ($km <= 0) {
				$error = true;
				array_push($errores, 'Los km no pueden ser nulos.');
			}
			if ($kmTotalesHastaElMomento > $km) {
				$error = true;
				array_push($errores, 'Los km recorridos actuales son mayores a los que ingresaste.');
			}
		}

		if ($error) {
			$valoresAEnviar = array('error' => true, 'errores' => $errores);
			echo json_encode($valoresAEnviar);
		} else {
			$insertadoEnTabla = $this->costeoModel->insertarCosteo($id, $litros, $kmTotalesHastaElMomento, $importe, $extras, $peaje, $latitud, $longitud);

			if ($insertadoEnTabla) {
				$valoresAEnviar = array('error' => false);
				echo json_encode($valoresAEnviar);
			} else {
				$valoresAEnviar = array('error' => true, 'errores' => 'Problemas al insertar en la bd.');
				echo json_encode($valoresAEnviar);
			}
		}
	}

}
