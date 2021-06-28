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

    public function procesarCargaViaje(){

        $origen = $_POST["origenViaje"];
        $destino= $_POST["destinoViaje"];
        $fecha_carga= $_POST["fechaCarga"];
        $id_supervisor= $_POST["supervisorViaje"];
        $legajo_chofer= $_POST["choferViaje"];
        $id_camion= $_POST["camionViaje"];
        $id_arrastrador = $_POST["arrastradorViaje"];

        $this->cargarViajeModel->insertViaje($origen, $destino, $fecha_carga, $id_supervisor,
                                                        $legajo_chofer,$id_camion,$id_arrastrador);

        $id_viaje = $this->cargarViajeModel->ultimoId();
        $nombre_cliente = $_POST["nombreCliente"];
        $apellido_cliente = $_POST["apellidoCliente"];
        $cuit_cliente = $_POST["cuitCliente"];
        $domicilio_cliente =$_POST["domicilioCliente"];
        $tel_cliente = $_POST["telefonoCliente"];
        $email_cliente = $_POST["emailCliente"];

        $this->cargarViajeModel->insertCliente($nombre_cliente, $apellido_cliente, $cuit_cliente, $domicilio_cliente,
                                                $tel_cliente, $email_cliente, $id_viaje);

        $eta=$_POST["eta"];
        $etd=$_POST["etd"];
        $km_p=$_POST["kmPrevisto"];
        $combustible_p =$_POST["combustiblePrevisto"];
        $viaticos_p=$_POST["viaticosPrevisto"];
        $peajes_p=$_POST["peajesPrevisto"];
        $pesajes_p=$_POST["pesajesPrevisto"];
        $extras_p=$_POST["extrasPrevisto"];
        $fee_p=$_POST["feePrevisto"];

        $this->cargarViajeModel->insertCosteoPrevisto($id_viaje,$eta, $etd, $combustible_p, $km_p,$viaticos_p,$peajes_p,
                                                        $pesajes_p, $extras_p, $fee_p);

        $tipo_carga = $this->cargarViajeModel->getTipoCarga($id_arrastrador);

        $hazard = $_POST["hazardCarga"];
        $imo = $_POST["imoCarga"];
        $reefer = $_POST["reeferCarga"];
        $temperatura = $_POST["temperaturaCarga"];
        $peso_neto = $_POST["pesoCarga"];

        $this->cargarViajeModel->insertCarga($tipo_carga, $hazard, $imo, $reefer, $temperatura, $peso_neto, $id_viaje);


    }



}