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


        $hazard = $_POST["hazardCarga"];
        $imo = $_POST["imoCarga"];
        $reefer = $_POST["reeferCarga"];
        $temperatura = $_POST["temperaturaCarga"];
        $peso_neto = $_POST["pesoCarga"];

        $errores = array();

        if (empty($origen)) {
            $errores['errorOrigen'] = true;
        }
        if (empty($destino)) {
            $errores['errorDestino'] = true;
        }
        if (empty($fecha_carga)) {
            $errores['errorFechaCarga'] = true;
        }
        if (empty($id_supervisor)) {
            $errores['errorIdSupervisor'] = true;
        }
        if (empty($id_chofer)) {
            $errores['errorIdChofer'] = true;
        }
        if (empty($id_camion)) {
            $errores['errorIdCamion'] = true;
        }
        if (empty($id_arrastrador)) {
            $errores['errorIdArrastrador'] = true;
        }

        if (empty($nombre_cliente)) {
            $errores['errorNombreCliente'] = true;
        }
        if (empty($apellido_cliente)) {
            $errores['errorApellidoCliente'] = true;
        }
        if (empty($cuit_cliente)) {
            $errores['errorCuitCliente'] = true;
        } else {
            if (!is_numeric($cuit_cliente)) {
                $errores["errorCuitNumero"] = true;
            }
        }
        if (empty($domicilio_cliente)) {
            $errores['errorDomicilioCliente'] = true;
        }
        if (empty($tel_cliente)) {
            $errores['errorTelCliente'] = true;
        }
        if (empty($email_cliente)) {
            $errores['errorEmailCliente'] = true;
        }
            if (!empty($errores)) {

                $errores["error"] = true;
                $errores["origen"] = $origen;
                $errores["choferes"] = $this->cargarViajeModel->buscarChoferes();
                $errores["camiones"] = $this->cargarViajeModel->buscarCamiones();
                $errores["arrastradores"] = $this->cargarViajeModel->buscarArrastradores();
                $errores["supervisores"] = $this->cargarViajeModel->buscarSupervisores();
                echo $this->render->render("cargarViajeView", $errores);
            } else {


                $this->cargarViajeModel->insertViaje($origen, $destino, $fecha_carga, $estado, $id_supervisor,
                    $id_chofer, $id_camion, $id_arrastrador);


                $id_viaje = $this->cargarViajeModel->ultimoId();

                $this->cargarViajeModel->insertCliente($nombre_cliente, $apellido_cliente, $cuit_cliente, $domicilio_cliente,
                    $tel_cliente, $email_cliente, $id_viaje["id"]);

                $this->cargarViajeModel->insertCosteoPrevisto($id_viaje["id"], $eta, $etd, $combustible_p, $km_p, $viaticos_p, $peajes_p,
                    $pesajes_p, $extras_p, $fee_p);


                $tipo_carga = $this->cargarViajeModel->getTipoCarga($id_arrastrador);


                $this->cargarViajeModel->insertCarga($tipo_carga["tipo"], $hazard, $imo, $reefer, $temperatura, $peso_neto, $id_viaje["id"]);

                header('Location: /cargarViaje');

            }

        }

}