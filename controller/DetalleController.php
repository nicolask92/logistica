<?php
require_once 'third-party/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
class DetalleController
{
    private $detalleModel;
    private $render;

    public function __construct($detalleModel, $render)
    {
        $this->detalleModel= $detalleModel;
        $this->render = $render;
    }

    public function execute(){

        $id=$_GET["id"];
        $data["viaje"]= $this->detalleModel->getViaje($id);
        $data["carga"]= $this->detalleModel->getCarga($id);
        $data["cliente"]= $this->detalleModel->getCliente($id);
        $data["costeo"]= $this->detalleModel->getCosteo($id);

        echo $this->render->render("view/detalleView.php", $data);

    }

    public function PDF(){
        $id=$_GET["id"];

        $dompdf = new Dompdf();

        ob_start();
        $data["viaje"]= $this->detalleModel->getViaje($id);
        $data["carga"]= $this->detalleModel->getCarga($id);
        $data["cliente"]= $this->detalleModel->getCliente($id);
        $data["costeo"]= $this->detalleModel->getCosteo($id);

        echo $this->render->render ("view/pdfview.php", $data);

        $dompdf->loadHtml(ob_get_clean());

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream("document.pdf" , ['Attachment' => 0]);
    }

}