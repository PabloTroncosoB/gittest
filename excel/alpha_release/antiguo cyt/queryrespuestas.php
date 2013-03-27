<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="Content-Type" content="charset=UTF-8" />
<meta http-equiv="Content-Language" content="es-ES" />

<?php
// original example.php with some major changes
$suma=89;
require_once 'reader.php';


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

$data->read('temp.xls');

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
/*
for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
	for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
		echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";
	}
	echo "\n";

}*/
//echo "\"".$data->sheets[0]['cells'][2][3]."\",";
//echo "insert into prueba values ('id','algo','otra cosa','blablabla','etc') set (";
//$texto ="insert into enc_pregunta values (id,padre_id,texto,tipo_pregunta_id) values (";
include("id.php");
$cuenta=0;
$comparapreguntas = null;

for ($i = 3; $i <= $data->sheets[0]['numRows']; $i++) {

echo "<br><br>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------";
$id=$suma+1;
		for ($j = 3; $j <= $data->sheets[0]['numCols'] -3; $j++) {
		$respuesta= utf8_encode( $data->sheets[0]['cells'][$i][$j]); 
echo " idpregunta: ".$id." respuesta: ".$respuesta;
	$id++;		
		//$suma=$cuenta+$suma;

	echo $texto;
	}}
	   /*
	$conexion = mysql_connect("lauca.ing.puc.cl", "CETIUC_DB", "TRAbu4aT");
    mysql_select_db("CETIUC_DB_cetidev", $conexion);
	mysql_query($texto);
	mysql_close();*/


/*for ($i = 1; $i <= 2; $i++) {
echo'(';
	for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
		
		$cadena=utf8_encode( "\"".$data->sheets[0]['cells'][$i][$j]."\""); 
		echo $cadena;
		//if(j<5){echo ",";}

		
	}
	echo ")";
	if(j<30){echo ",";} 
	echo "<br>";
	}
	echo")";*/


//print_r($data);
//print_r($data->formatRecords);

?>