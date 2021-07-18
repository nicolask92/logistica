<?php

class ChoferController
{
	private $viajeModel;
	private $render;
	private $costeoModel;

	public function __construct($viajeModel, $costeoModel, $render)
	{
		$this->viajeModel = $viajeModel;
		$this->render = $render;
		$this->costeoModel = $costeoModel;
	}

	public function execute()
	{
		include("third-party/phpqrcode/qrlib.php");

		/*  VERSION VIEJA DE RESPALDO POR SI NO FUNCA LO QUE QUIERO HACER
		$fecha = new DateTime();
		$momentoActual = $fecha->getTimestamp();
		$rutaImagenAGuardar = "view/img/qrs/" . $momentoActual . ".png";
		*/

		$rutaImagenAGuardar = "view/img/qrs/" . $_GET['id'] . ".png";
		$rutaRelativa = "/chofer/reporteDiario?viaje=" . $_GET['id'];
		$rutaTotal = $_SERVER['HTTP_HOST'] . "/chofer/reporteDiario?viaje=" . $_GET['id'];

		if (!file_exists($rutaImagenAGuardar)) {
			QRcode::png($rutaTotal, $rutaImagenAGuardar, QR_ECLEVEL_L, 8);
		}

		$data['urlQr'] = $rutaImagenAGuardar;
		$data['urlViaje'] = $rutaTotal;
		$data['urlViajeRelativa'] = $rutaRelativa;

		echo $this->render->render("view/verQrView.php", $data);
	}

	public function reporteDiario() {
		$data['mapa'] = true;
		echo $this->render->render("view/cargarReporteView.php", $data);
	}

	public function informacionViaje(){
		$coleccionDeViajes = [];
		foreach ($this->viajeModel->getInformacionViaje() as $viaje) {
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

		$id = intval($valoresReporte['idViaje']);
		$litros = intval($valoresReporte['litros']);
		$km = intval($valoresReporte['km']);
		$importe = intval($valoresReporte['importe']);
		$extras = intval($valoresReporte['extras']);
		$peaje = intval($valoresReporte['peaje']);
		$latitud = $valoresReporte['latitud'];
		$longitud = $valoresReporte['longitud'];
		$kmTotalesHastaElMomento = intval($this->costeoModel->getKmsTotalesByIdViaje($id)['km']);
		$tipoReporte = $valoresReporte['tipoReporte'];
		$viatico = intval($valoresReporte['viatico']);
		$pesaje = intval($valoresReporte['pesaje']);

		if (!isset($id) || !isset($litros) || !isset($km) || !isset($importe) || !isset($extras) || !isset($peaje) || !isset($latitud) || !isset($longitud) || !isset($tipoReporte) || !isset($viatico)) {
			// nunca deberia entrar por aca.
			$error = true;
			array_push($errores, 'Error en los datos enviados. Alguno de los campos es nulo.');
		} else {
			if ($litros > 0 && $importe == 0) {
				$error = true;
				array_push($errores, 'El importe no puede ser cero si hay litros cargados.');
			}
			if ($litros == 0 && $importe > 0) {
				$error = true;
				array_push($errores, 'El importe no puede ser mayor a cero si no hay litros cargados.');
			}
			if ($km <= 0) {
				$error = true;
				array_push($errores, 'Los km no pueden ser nulos.');
			}
			if ($kmTotalesHastaElMomento > $km) {
				$error = true;
				array_push($errores, 'Los km recorridos anteriores son mayores a los que ingresaste.');
			}
		}

		if ($error) {
			$valoresAEnviar = array('error' => true, 'errores' => $errores);
			echo json_encode($valoresAEnviar);
		} else {
			$insertadoEnTabla = $this->costeoModel->insertarCosteo($id, $litros, $km, $importe, $extras, $peaje, $viatico, $latitud, $longitud);

			if ($tipoReporte == 'Comienzo') {
				$this->viajeModel->empezarViajeYActualizarEstado($id, $pesaje);
			}

			if ($tipoReporte == 'Finalizar') {
				$costeosTotalesArray = $this->costeoModel->getCosteosTotal($id);

				$extras = 0;
				$peajes = 0;
				$litros = 0;
				$viaticos = 0;
				$importe = 0;

				foreach ($costeosTotalesArray as $costeoIndividual) {
					$extras += $costeoIndividual[5];
					$peajes += $costeoIndividual[4];
					$litros += $costeoIndividual[1];
					$viaticos += $costeoIndividual[3];
					$importe += $costeoIndividual[2];
				}

				$actualizarViaje = $this->viajeModel->actualizarViaje($id, $extras, $peajes, $litros, $km, $viaticos, $importe, $valoresReporte['fee']);

				if ($actualizarViaje) {
					$valoresAEnviar = array('error' => false);
					echo json_encode($valoresAEnviar);
				} else {
					$valoresAEnviar = array('error' => true, 'errores' => 'Problemas al insertar en la bd.');
					echo json_encode($valoresAEnviar);
				}
			} else {
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
}
