<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="Content-Type" content="charset=UTF-8" />
<meta http-equiv="Content-Language" content="es-ES" />
ingresar respuesta maxima +1 de bd mediante ?comienzo=numero
<br><br><br><br>
<?php

// original example.php with some major awesome badass changes
$comienza=$_GET["comienzo"];//id final de respuestas+1
require_once '../reader.php';


// ExcelFile($filename, $encoding);
$data = new Spreadsheet_Excel_Reader();


// Set output Encoding.
$data->setOutputEncoding('CP1251');

/***
* if you want you can change 'iconv' to mb_convert_encoding:
* $data->setUTFEncoder('mb');
*
**/

/***
* By default rows & cols indeces start with 1
* For change initial index use:
* $data->setRowColOffset(0);
*
**/



/***
*  Some function for formatting output.
* $data->setDefaultFormat('%.2f');
* setDefaultFormat - set format for columns with unknown formatting
*
* $data->setColumnFormat(4, '%.3f');
* setColumnFormat - set format for column (apply only to number fields)
*
**/

$data->read('../archivos/temp.xls');

/*


 $data->sheets[0]['numRows'] - count rows
 $data->sheets[0]['numCols'] - count columns
 $data->sheets[0]['cells'][$i][$j] - data from $i-row $j-column

 $data->sheets[0]['cellsInfo'][$i][$j] - extended info about cell
    
    $data->sheets[0]['cellsInfo'][$i][$j]['type'] = "date" | "number" | "unknown"
        if 'type' == "unknown" - use 'raw' value, because  cell contain value with format '0.00';
    $data->sheets[0]['cellsInfo'][$i][$j]['raw'] = value if cell without format 
    $data->sheets[0]['cellsInfo'][$i][$j]['colspan'] 
    $data->sheets[0]['cellsInfo'][$i][$j]['rowspan'] 
*/

error_reporting(E_ALL ^ E_NOTICE);
$elementos=array();
$texto='';
$textobd='id;texto;descripcion;valor;orden';
$index=0;
for ($i = 3; $i <= $data->sheets[0]['numCols']; $i++) {
	for ($j = 3; $j <= $data->sheets[0]['numRows']; $j++) {
			if ($i != 78){
			$elementos[$index]=utf8_encode($data->sheets[0]['cells'][$j][$i]);
			$index++;}			
			}
	}
;

$elementosfiltrados = array_unique($elementos);
for ($i = 0; $i <= count($elementos); $i++) {
if($elementosfiltrados[$i]!=''){
	$texto=$texto.'<br>case "'.$elementosfiltrados[$i].'" : $idrespuesta= '.$comienza."; break;";
	$textobd=$textobd.'<br>'.$comienza.';'.$elementosfiltrados[$i]."; ; ; ";
	$comienza++;
	}
}
echo $texto."<br><br><br><br>".$textobd;

?>