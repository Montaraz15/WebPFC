<?php
// $concetracion=array();
$fh = fopen('../eegs/test1.txt','r');
while ($line = fgets($fh)) {
  // <... Do your work with the line ...>
  $claves = preg_split("/[,\[\])]+/",$line);
  // echo "+".$claves[0]."+";
  if($claves[0]=="Concetracion: "){
    $concetracion=$claves;
    // print_r($concetracion);
    unset($concetracion[0]);

  }
  if($claves[0]=="Meditacion: "){
    $meditacion=$claves;
    // print_r($meditacion);
    unset($meditacion[0]);

  }
  // echo($line);
  // print_r($claves);
}
fclose($fh);
echo "con: ";
print_r($concetracion);
echo "med: ";
print_r($meditacion);
echo "len: ".sizeof($meditacion);
$ydata   = array();
$ydata2  = array();
for ($i=0; $i <sizeof($concetracion) ; $i++) {
  # code...
  $ydata   []= $concetracion[$i];
  $ydata2  []= $meditacion[$i];
}
print_r($ydata);
print_r($ydata2);
?>
