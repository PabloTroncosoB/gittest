<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="Content-Type" content="charset=UTF-8" />
<meta http-equiv="Content-Language" content="es-ES" />

<?php

// original example.php with some major awesome badass changes
$sumapregunta=107; //comienza en la ultima pregunta actual
$suma=108;
$sumasubpregunta=166;//comienza en la ultima subpregunta actual+1
$periodo_id=1001;
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

$data->read('archivos/temp.xls');

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
$texto ="pregunta_id;subpregunta_id;periodo_id";
include("id.php");
$cuenta=0;
$comparapreguntas = null;
		for ($j = 3; $j <= $data->sheets[0]['numCols']; $j++) {
		
			$cadena=utf8_encode( $data->sheets[0]['cells'][2][$j]); 
			$cadena=DevuelveId($cadena);
			$cadena[0]=intval($cadena[0]+$suma);
			$cadena[1]=intval($cadena[1]);
		

			$pregunta=utf8_encode( $data->sheets[0]['cells'][1][$j]); 
			$pregunta = explode(":",$pregunta);
			$p2=explode(".",$pregunta[0]);
			if($p2[1]!=false){$pregunta[0] = $p2[1].".";}//.$p2[2].".".$p2[3].".".$p2[4];}


		if(($pregunta[1]==FALSE) and ($cadena[1] >= 1)){
			$pregunta[1]=$pregunta[0]; 
			$pregunta[0]='';
			
}	
		
		if($cadena[0] != $comparapreguntas)
		{	$id=$cadena[0]+$cuenta;
			//$texto =$texto.$id.",'','".$pregunta[0]."',11),";
			
			if($cadena[1]==FALSE){
			$sumapregunta++;
			$texto=$texto."<br>".$sumapregunta.";0;".$periodo_id;
			}else{
			$sumapregunta++;}
		}
		if($cadena[1] != false ){
			$id2=$cadena[0]+$cuenta+1;
			$texto =$texto."<br>".$sumapregunta.";".$sumasubpregunta.";".$periodo_id;
			$sumasubpregunta++;
			$cuenta++;
			
			}
			
		$comparapreguntas = $cadena[0];
		//$suma=$cuenta+$suma;

	
	}
echo $texto;
	   /*



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