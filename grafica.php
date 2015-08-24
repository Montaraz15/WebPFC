<?php
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');


$fh = fopen('../eegs/'.$_GET["path"].'.txt','r');//test1
while ($line = fgets($fh)) {
  // <... Do your work with the line ...>
  $claves = preg_split("/[,\[\])]+/",$line);
  // echo "+".$claves[0]."+";
  if($claves[0]=="Concetracion: "){
    $concetracion=$claves;
    // print_r($concetracion);
    unset($concetracion[0]);//quita el primer elemento ("Concentración: ")

  }
  if($claves[0]=="Meditacion: "){
    $meditacion=$claves;
    // print_r($meditacion);
    unset($meditacion[0]);//quita el primer elemento ("Meditacion: ")

  }
  // echo($line);
  // print_r($claves);
}
fclose($fh);
// echo "con: ";
// print_r($concetracion);
// echo "med: ";
// print_r($meditacion);
 // Some (random) data
// $ydata   = array(11, 3, 8, 12, 5, 1, 9, 13, 5, 7);
// $ydata2  = array(1, 19, 15, 7, 22, 14, 5, 9, 21, 13 );
$ydata   = array();
$ydata2  = array();
for ($i=0; $i < sizeof($concetracion) ; $i++) {
  # code...
  $ydata   []= $concetracion[$i];
  $ydata2  []= $meditacion[$i];
}

//
// Size of the overall graph
$width=1000;
$height=350;
//
// // Create the graph and set a scale.
// // These two calls are always required
$graph = new Graph($width,$height);
$graph->SetScale('intlin');
$graph->SetShadow();

// Setup margin and titles
$graph->SetMargin(40,20,20,40);
$graph->title->Set('Session '.$_GET["ses"]);
$mes=date("F",$_GET["ts"]/1000);
$año=date("Y",$_GET["ts"]/1000);
$dia=date("j",$_GET["ts"]/1000);
$graph->subtitle->Set('(Fecha '.$mes.' '.$dia.', '.$año.')');
$graph->xaxis->title->Set('Segundos');
$graph->yaxis->title->Set('# Nivel en %');
//
$graph->yaxis->title->SetFont( FF_FONT1 , FS_BOLD );
$graph->xaxis->title->SetFont( FF_FONT1 , FS_BOLD );
//
// Create the first data series
$lineplot=new LinePlot($ydata);
$lineplot->SetLegend("Concentracion");
$lineplot->SetWeight( 2 );   // Two pixel wide
//
// Add the plot to the graph
$graph->Add($lineplot);
//
// // Create the second data series
$lineplot2=new LinePlot($ydata2);
$lineplot2->SetLegend("Meditacion");
$lineplot2->SetWeight( 2 );   // Two pixel wide
//
// Add the second plot to the graph
$graph->Add($lineplot2);
//
// // Display the graph
$graph->Stroke();

 ?>
