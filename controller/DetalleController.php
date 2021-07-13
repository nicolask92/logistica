<?php
require_once 'third-party/dompdf/autoload.inc.php';
require_once('third-party/jpgraph/src/jpgraph.php');
require_once('third-party/jpgraph/src/jpgraph_line.php');
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

    public function grafico(){

        $id=$_GET["id"];
        $costeo= $this->detalleModel->getCosteo($id);
        $datay1 = array($costeo=>"kilometros_previsto", $costeo=>"combustible_previsto", $costeo["viaticos_previsto"], $costeo["peajes_previsto"]);
        $datay2 = array($costeo["kilometros_real"], $costeo["combustible_real"], $costeo["viaticos_real"], $costeo["peajes_real"]);
        $datay3 = array(5, 17, 32, 24);

// Setup the graph
        $graph = new Graph(300, 250);
        $graph->SetScale("textlin");

        $theme_class = new UniversalTheme;

        $graph->SetTheme($theme_class);
        $graph->img->SetAntiAliasing(false);
        $graph->title->Set('Filled Y-grid');
        $graph->SetBox(false);

        $graph->SetMargin(40, 20, 36, 63);

        $graph->img->SetAntiAliasing();

        $graph->yaxis->HideZeroLabel();
        $graph->yaxis->HideLine(false);
        $graph->yaxis->HideTicks(false, false);

        $graph->xgrid->Show();
        $graph->xgrid->SetLineStyle("solid");
        $graph->xaxis->SetTickLabels(array('A', 'B', 'C', 'D'));
        $graph->xgrid->SetColor('#E3E3E3');

// Create the first line
        $p1 = new LinePlot($datay1);
        $graph->Add($p1);
        $p1->SetColor("#6495ED");
        $p1->SetLegend('Line 1');

// Create the second line
        $p2 = new LinePlot($datay2);
        $graph->Add($p2);
        $p2->SetColor("#B22222");
        $p2->SetLegend('Line 2');

// Create the third line
        $p3 = new LinePlot($datay3);
        $graph->Add($p3);
        $p3->SetColor("#FF1493");
        $p3->SetLegend('Line 3');

        $graph->legend->SetFrameWeight(1);

// Output line
        $graph->Stroke();

    }

}