<?php
require_once 'third-party/dompdf/autoload.inc.php';
//require_once('third-party/jpgraph/src/jpgraph.php');
//require_once('third-party/jpgraph/src/jpgraph_bar.php');
use Dompdf\Dompdf;

class DetalleController
{
    private $detalleModel;
    private $render;

    public function __construct($detalleModel, $render)
    {
        $this->detalleModel = $detalleModel;
        $this->render = $render;
    }

    public function execute()
    {
       $data= $this->getDatos();

        echo $this->render->render("view/detalleView.php", $data);
    }

    public function PDF()
    {
        $dompdf = new Dompdf();

        ob_start();

        $data=$this->getDatos();

        echo $this->render->render("view/pdfview.php", $data);

        $dompdf->loadHtml(ob_get_clean());

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream("document.pdf", ['Attachment' => 0]);
    }

    public function grafico()
    {
        $id = $_GET["id"];

        $costeo= $this->detalleModel->getCosteo($id);

        $data1y = array($costeo["kilometros_previsto"],$costeo["combustible_previsto"], $costeo["viaticos_previsto"],
                  $costeo["peajes_previsto"],$costeo["pesajes_previsto"], $costeo["extras_previsto"],
                  $costeo["fee_previsto"],$costeo["hazard_precio"],$costeo["reefer_precio"]);
        $data2y = array($costeo["kilometros_real"],$costeo["combustible_real"],$costeo["viaticos_real"],
                  $costeo["peajes_real"],$costeo["pesajes_real"], $costeo["extras_real"],
                  $costeo["fee_real"],$costeo["hazard_precio"],$costeo["reefer_precio"]);

        // Create the graph. These two calls are always required
        $graph = new Graph(700, 500, 'auto');
        $graph->SetMargin(50,50,50,50);
        $graph->SetScale("textint", 0, 100000);

        $theme_class = new UniversalTheme;
        $graph->SetTheme($theme_class);
        $graph->yaxis->SetTickPositions(array(0, 5000, 10000, 50000, 100000), array(2500, 7500, 25000, 75000));
        $graph->SetBox(false);

        $graph->ygrid->SetFill(false);
        $graph->xaxis->SetTickLabels(array('Kilometros', 'Combustible', 'Viaticos', 'Peajes','Pesajes','Extras','Fee','Hazard','Reefer'));
        $graph->yaxis->HideLine(false);
        $graph->yaxis->HideTicks(false, false);

        // Create the bar plots
        $b1plot = new BarPlot($data1y);
        $b2plot = new BarPlot($data2y);


        // Create the grouped bar plot
        $gbplot = new GroupBarPlot(array($b1plot, $b2plot));
        // ...and add it to the graPH
        $graph->Add($gbplot);

        $b1plot->SetColor("white");
        $b1plot->SetFillColor("#575966");
        $b1plot->SetLegend("Previsto");

        $b2plot->SetColor("white");
        $b2plot->SetFillColor("#F94107");
        $b2plot->SetLegend("Real");

        $graph->legend->SetFrameWeight(2);
        $graph->legend->SetColumns(2);
        $graph->legend->SetColor('#575966','#F94107');
        $graph->legend->SetPos(0,0);

        $graph->title->Set("Proforma");

        // Display the graph
        $graph->Stroke();
    }

    public function getDatos(){

        $id = $_GET["id"];
        $data["viaje"] = $this->detalleModel->getViaje($id);
        $data["carga"] = $this->detalleModel->getCarga($id);
        $data["cliente"] = $this->detalleModel->getCliente($id);
        $data["costeo"] = $this->detalleModel->getCosteo($id);

        return $data;
    }

}