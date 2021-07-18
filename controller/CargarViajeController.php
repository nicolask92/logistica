<?php


class CargarViajeController
{
    private $cargarViajeModel;
    private $render;

    public function __construct($cargarViajeModel, $render)
    {
        $this->cargarViajeModel= $cargarViajeModel;
        $this->render = $render;
    }

    public function execute()
    {
        $data["choferes"] = $this->cargarViajeModel->buscarChoferes();
        $data["camiones"] = $this->cargarViajeModel->buscarCamiones();
        $data["arrastradores"] = $this->cargarViajeModel->buscarArrastradores();
        $data["supervisores"] = $this->cargarViajeModel->buscarSupervisores();

        if(isset($_GET["errorOrigen"])){
            $data["errorOrigen"] = true;
        }
        if(isset($_GET["origen"])){
            $data["origen"] = $_GET["origen"];
        }
        if(isset($_GET["errorDestino"])){
            $data["errorDestino"] = true;
        }
        if(isset($_GET["destino"])){
            $data["destino"] = $_GET["destino"];
        }

        if(isset($_GET["errorFechaCarga"])){
            $data["errorFechaCarga"] = true;
        }
        if(isset($_GET["fechaCarga"])){
            $data["fechaCarga"] = $_GET["fechaCarga"];
        }

        if(isset($_GET["errorIdSupervisor"])){
            $data["errorIdSupervisor"] = true;
        }
        if(isset($_GET["errorIdChofer"])){
            $data["errorIdChofer"] = true;
        }
        if(isset($_GET["errorIdCamion"])){
            $data["errorIdCamion"] = true;
        }
        if(isset($_GET["errorIdArrastrador"])){
            $data["errorIdArrastrador"] = true;
        }
        if(isset($_GET["errorNombreCliente"])){
            $data["errorNombreCliente"] = true;
        }
        if(isset($_GET["nombreCliente"])){
            $data["nombreCliente"] = $_GET["nombreCliente"];
        }
        if(isset($_GET["errorApellidoCliente"])){
            $data["errorApellidoCliente"] = true;
        }
        if(isset($_GET["apellidoCliente"])){
            $data["apellidoCliente"] = $_GET["apellidoCliente"];
        }
        if(isset($_GET["errorCuitCliente"])){
            $data["errorCuitCliente"] = true;
        }
        if(isset($_GET["cuitCliente"])) {
            $data["cuitCliente"] = $_GET["cuitCliente"];
        }
        if(isset($_GET["errorDomicilioCliente"])){
            $data["errorDomicilioCliente"] = true;
        }
        if(isset($_GET["domicilioCliente"])) {
            $data["domicilioCliente"] = $_GET["domicilioCliente"];
        }
        if(isset($_GET["errorTelCliente"])){
            $data["errorTelCliente"] = true;
        }
        if(isset($_GET["telCliente"])) {
            $data["telCliente"] = $_GET["telCliente"];
        }
        if(isset($_GET["errorEmailCliente"])){
            $data["errorEmailCliente"] = true;
        }
        if(isset($_GET["emailCliente"])) {
            $data["emailCliente"] = $_GET["emailCliente"];
        }
        if(isset($_GET["errorETA"])){
            $data["errorETA"] = true;
        }
        if(isset($_GET["eta"])) {
            $data["eta"] = $_GET["eta"];
        }
        if(isset($_GET["errorETD"])){
            $data["errorETD"] = true;
        }
        if(isset($_GET["etd"])) {
            $data["etd"] = $_GET["etd"];
        }
        if(isset($_GET["errorKmPrevisto"])){
            $data["errorKmPrevisto"] = true;
        }
        if(isset($_GET["kmPrevisto"])) {
            $data["kmPrevisto"] = $_GET["kmPrevisto"];
        }
        if(isset($_GET["errorCombustiblePrevisto"])){
            $data["errorCombustiblePrevisto"] = true;
        }
        if(isset($_GET["combustiblePrevisto"])) {
            $data["combustiblePrevisto"] = $_GET["combustiblePrevisto"];
        }
        if(isset($_GET["errorViaticosPrevisto"])){
            $data["errorViaticosPrevisto"] = true;
        }
        if(isset($_GET["viaticosPrevisto"])) {
            $data["viaticosPrevisto"] = $_GET["viaticosPrevisto"];
        }
        if(isset($_GET["errorPeajesPrevisto"])){
            $data["errorPeajesPrevisto"] = true;
        }
        if(isset($_GET["peajesPrevisto"])) {
            $data["peajesPrevisto"] = $_GET["peajesPrevisto"];
        }
        if(isset($_GET["errorPesajesPrevisto"])){
            $data["errorPesajesPrevisto"] = true;
        }
        if(isset($_GET["pesajesPrevisto"])) {
            $data["pesajesPrevisto"] = $_GET["pesajesPrevisto"];
        }
        if(isset($_GET["errorExtrasPrevisto"])){
            $data["errorExtrasPrevisto"] = true;
        }
        if(isset($_GET["extrasPrevisto"])) {
            $data["extrasPrevisto"] = $_GET["extrasPrevisto"];
        }
        if(isset($_GET["errorFeePrevisto"])){
            $data["errorFeePrevisto"] = true;
        }
        if(isset($_GET["feePrevisto"])) {
            $data["feePrevisto"] = $_GET["feePrevisto"];
        }
	    if(isset($_GET["errorGastosCombustiblePrevisto"])){
		    $data["errorGastosCombustiblePrevisto"] = true;
	    }
	    if(isset($_GET["gastosCombustiblePrevistos"])) {
		    $data["gastosCombustiblePrevistos"] = $_GET["gastosCombustiblePrevistos"];
	    }
        if(isset($_GET["errorHazardCarga"])){
            $data["errorHazardCarga"] = true;
        }
        if(isset($_GET["hazardCarga"])&&$_GET["hazardCarga"]=="Si") {
            if(isset($_GET["errorImoCarga"])){
                $data["errorImoCarga"] = true;
            }

            if(isset($_GET["hazarPrecio"])){
                $data["errorHazardPrecio"] = true;
            }
        }


        if(isset($_GET["errorReeferCarga"])){
            $data["errorReeferCarga"] = true;
        }
        if(isset($_GET["reeferCarga"])&&$_GET["reeferCarga"]=="Si") {
            if(isset($_GET["errorTemperaturaCarga"])){
                $data["errorTemperaturaCarga"] = true;
            }
            if(isset($_GET["reeferPrecio"])){
                $data["errorReeferPrecio"] = true;
            }
        }
        if(isset($_GET["errorPesoCarga"])){
            $data["errorPesoCarga"] = true;
        }
        if(isset($_GET["pesoCarga"])) {
            $data["pesoCarga"] = $_GET["pesoCarga"];
        }
        echo $this->render->render("view/cargarViajeView.php", $data);
    }

    public function procesarCargaViaje()
    {

        $origen = $_POST["origenViaje"];
        $destino = $_POST["destinoViaje"];
        $fecha_carga = $_POST["fechaCarga"];
        $id_supervisor = $_POST["supervisorViaje"];
        $id_chofer = $_POST["choferViaje"];
        $id_camion = $_POST["camionViaje"];
        $id_arrastrador = $_POST["arrastradorViaje"];
        $estado = "PENDIENTE";


        $nombre_cliente = $_POST["nombreCliente"];
        $apellido_cliente = $_POST["apellidoCliente"];
        $cuit_cliente = $_POST["cuitCliente"];
        $domicilio_cliente = $_POST["domicilioCliente"];
        $tel_cliente = $_POST["telefonoCliente"];
        $email_cliente = $_POST["emailCliente"];


        $eta = $_POST["eta"];
        $etd = $_POST["etd"];
        $km_p = $_POST["kmPrevisto"];
        $combustible_p = $_POST["combustiblePrevisto"];
        $viaticos_p = $_POST["viaticosPrevisto"];
        $peajes_p = $_POST["peajesPrevisto"];
        $pesajes_p = $_POST["pesajesPrevisto"];
        $extras_p = $_POST["extrasPrevisto"];
        $fee_p = $_POST["feePrevisto"];
        $gastosCombustibles_p = $_POST["gastosCombustiblePrevistos"];

        $hazard = $_POST["hazardCarga"];
        $imo = $_POST["imoCarga"];
        $reefer = $_POST["reeferCarga"];
        $temperatura = $_POST["temperaturaCarga"];
        $peso_neto = $_POST["pesoCarga"];
        $hazard_precio = $_POST["hazardPrecio"];
        $reefer_precio = $_POST["reeferPrecio"];


        $errores="";
        $campos="";
        if (empty($origen)) {
            $errores = $errores."errorOrigen=true&";
        } else {
            $campos= $campos. 'origen='.$origen.'&';
        }
        if (empty($destino)) {
            $errores = $errores. "errorDestino=true&";
        } else {
            $campos= $campos. 'destino=' . $destino . '&';
        }
        if (empty($fecha_carga)) {
            $errores = $errores. "errorFechaCarga=true&";
        } else {
            $campos= $campos. "fechaCarga=".$fecha_carga."&";
        }
        if (empty($id_supervisor)) {
            $errores = $errores. "errorIdSupervisor=true&";
        }
        if (empty($id_chofer)) {
            $errores = $errores. "errorIdChofer=true&";
        }
        if (empty($id_camion)) {
            $errores = $errores. "errorIdCamion=true&";
        }
        if (empty($id_arrastrador)) {
            $errores = $errores."errorIdArrastrador=true&";
        }

        if (empty($nombre_cliente)) {
            $errores = $errores. "errorNombreCliente=true&";
        }else{
            $campos= $campos."nombreCliente=".$nombre_cliente."&";
        }
        if (empty($apellido_cliente)) {
            $errores = $errores."errorApellidoCliente=true&";
        }else{
            $campos= $campos."apellidoCliente=".$apellido_cliente."&";
        }
        if (empty($cuit_cliente)) {
            $errores = $errores."errorCuitCliente=true&";
        }else {
            $campos= $campos. "cuitCliente=" . $cuit_cliente . "&";
        }

        if (empty($domicilio_cliente)) {
            $errores = $errores. "errorDomicilioCliente=true&";
        }else {
            $campos= $campos. "domicilioCliente=" . $domicilio_cliente . "&";
        }
        if (empty($tel_cliente)) {
            $errores = $errores. "errorTelCliente=true&";
        }else {
            $campos= $campos. "telCliente=" . $tel_cliente . "&";
        }
        if (empty($email_cliente)) {
            $errores = $errores. "errorEmailCliente=true&";
        }else{
            $campos = $campos . "emailCliente=". $email_cliente. "&";
        }
        if (empty($eta)) {
            $errores = $errores. "errorETA=true&";
        }else{
            $campos = $campos . "eta=". $eta. "&";
        }
        if (empty($etd)) {
            $errores = $errores. "errorETD=true&";
        }else{
            $campos = $campos . "etd=". $etd. "&";
        }
        if (empty($km_p)) {
            $errores = $errores. "errorKmPrevisto=true&";
        }else{
            $campos = $campos . "kmPrevisto=". $km_p. "&";
        }
        if (empty($combustible_p)) {
            $errores = $errores. "errorCombustiblePrevisto=true&";
        }else{
            $campos = $campos . "combustiblePrevisto=". $combustible_p. "&";
        }
        if (empty($viaticos_p)) {
            $errores = $errores. "errorViaticosPrevisto=true&";
        }else{
            $campos = $campos . "viaticosPrevisto=". $viaticos_p. "&";
        }
        if (empty($peajes_p)) {
            $errores = $errores. "errorPeajesPrevisto=true&";
        }else{
            $campos = $campos . "peajesPrevisto=". $peajes_p. "&";
        }
        if (empty($pesajes_p)) {
            $errores = $errores. "errorPesajesPrevisto=true&";
        }else{
            $campos = $campos . "pesajesPrevisto=". $pesajes_p. "&";
        }
        if (empty($extras_p)) {
            $errores = $errores. "errorExtrasPrevisto=true&";
        }else{
            $campos = $campos . "extrasPrevisto=". $extras_p. "&";
        }
        if (empty($fee_p)) {
            $errores = $errores. "errorFeePrevisto=true&";
        }else{
            $campos = $campos . "feePrevisto=". $fee_p. "&";
        }
        if (empty($gastosCombustibles_p)) {
            $errores = $errores. "errorGastosCombustiblePrevisto=true&";
        }else{
            $campos = $campos . "feePrevisto=". $fee_p. "&";
        }
        if (!isset($hazard)) {
            $errores = $errores. "errorHazardCarga=true&";
        }else{
            $campos = $campos . "hazardCarga=". $hazard. "&";
        }

        if ($hazard == "Si"){

            if (empty($imo)) {
                $errores = $errores. "errorImoCarga=true&";
            }else{
                $campos = $campos . "imoCarga=". $imo. "&";
            }

            if (empty($hazard_precio)){
                $errores = $errores ."errorHazardPrecio=true&";
            }else{
                $campos = $campos . "hazardPrecio=" . $hazard_precio . "&";
            }

        }


        if (!isset($reefer)) {
            $errores = $errores. "errorReeferCarga=true&";
        }else{
            $campos = $campos . "reeferCarga=". $reefer. "&";
        }

        if ($reefer == "Si"){

            if (empty($temperatura)) {
                $errores = $errores. "errorTemperaturaCarga=true&";
            }else{
                $campos = $campos . "temperaturaCarga=". $temperatura. "&";
            }

            if (empty($reefer_precio)){
                $errores = $errores ."errorReeferPrecio=true&";
            }else{
                $campos = $campos . "reeferPrecio=" . $reefer_precio . "&";
            }
        }

        if (empty($peso_neto)) {
            $errores = $errores. "errorPesoCarga=true&";
        }else{
            $campos = $campos . "pesoCarga=". $peso_neto. "&";
        }

        if (!empty($errores)) {
            header("Location: /cargarViaje?".$errores.$campos);
        } else {

            $this->cargarViajeModel->insertViaje($origen, $destino, $fecha_carga, $estado, $id_supervisor,
                $id_chofer, $id_camion, $id_arrastrador, $eta, $etd, $combustible_p, $km_p, $viaticos_p, $peajes_p,
	            $pesajes_p, $extras_p, $fee_p, $hazard_precio, $reefer_precio, $gastosCombustibles_p);

	        $id_viaje = $this->cargarViajeModel->ultimoId();

            $this->cargarViajeModel->insertCliente($nombre_cliente, $apellido_cliente, $cuit_cliente, $domicilio_cliente,
                $tel_cliente, $email_cliente, $id_viaje["id"]);

            $tipo_carga = $this->cargarViajeModel->getTipoCarga($id_arrastrador);

            $this->cargarViajeModel->insertCarga($tipo_carga["tipo"], $hazard, $imo, $reefer, $temperatura, $peso_neto, $id_viaje["id"]);

            header('Location: /home?cargado=true');
        }
    }

}