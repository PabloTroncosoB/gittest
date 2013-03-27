ingresar id maxima en bd mediante ?maxid=numeroidmaxima
<br><br><br><br>
<?php 
$maxid = intval($_GET["maxid"]);
$apellido="Concha y Toro";
$email="(NULL)";
$empresa_contacto_id=0;
$periodo_id=0;
require_once '../reader.php';
$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');
$data->read('../archivos/temp.xls');
$total = intval(utf8_encode($data->sheets[0]['cells'][$data->sheets[0]['numRows']][1]));
$texto='id;nombre;apellido;email;empresa_contacto_id;periodo_id<br>';
$ids='case derivados id: <br>';
for($nombre = 1;$nombre <= $total;$nombre++){
$id=$maxid+$nombre;
$texto=$texto.$id.";".$nombre.";".$apellido.";".$email.";".$empresa_contacto_id.";".$periodo_id."<br>";	
$ids=$ids.'<br>case '.$nombre.' : $idrespuesta= '.$id."; break;";
}
echo $texto."<br><br><br><br><br>".$ids;
?>