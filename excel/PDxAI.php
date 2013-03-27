<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="Content-Type" content="charset=UTF-8" />
<meta http-equiv="Content-Language" content="es-ES" />

<?php
// original example.php from PHPExcel Reader with some major changes by P.
$suma=0;
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


//seteo	
	for ($j = 5; $j <= $data->sheets[0]['numCols']; $j++) {
	for ($x = 4; $x <= $data->sheets[0]['numRows']; $x++) {
	$columna=utf8_encode( $data->sheets[0]['cells'][1][$j]);
	$columna= explode(".",$columna);
	if (($columna[0] == "A") or ($columna[0] == "B")or ($columna[0] == "C")or ($columna[0] == "D")or ($columna[0] == "E")or ($columna[0] == "F")or ($columna[0] == "G")or ($columna[0] == "H")or ($columna[0] == "I")or ($columna[0] == "J")or ($columna[0] == "K")){
					$columna2=$columna[1].".".$columna[2].".".$columna[3];
					if($columna[3]==""){$columna2=$columna[1].".".$columna[2];}
					if(($columna[3]=="") and ($columna[2]=="")){$columna2=$columna[1];}
					$columna=$columna2;
					
	$internalarea=utf8_encode( $data->sheets[0]['cells'][$x][2]);
	$externalarea=utf8_encode( $data->sheets[0]['cells'][$x][3]);
	$nivel=utf8_encode( $data->sheets[0]['cells'][$x][4]);
	$datos["interna"][$columna][$internalarea][$nivel]["1"]=0;
	$datos["interna"][$columna][$internalarea][$nivel]["2"]=0;
	$datos["interna"][$columna][$internalarea][$nivel]["3"]=0;
	$datos["interna"][$columna][$internalarea][$nivel]["4"]=0;
	$datos["interna"][$columna][$internalarea][$nivel]["5"]=0;
	$datos["interna"][$columna][$internalarea][$nivel]["6"]=0;
	$datos["interna"][$columna][$internalarea][$nivel]["7"]=0;
	$datos["externa"][$columna][$externalarea][$nivel]["1"]=0;
	$datos["externa"][$columna][$externalarea][$nivel]["2"]=0;
	$datos["externa"][$columna][$externalarea][$nivel]["3"]=0;
	$datos["externa"][$columna][$externalarea][$nivel]["4"]=0;
	$datos["externa"][$columna][$externalarea][$nivel]["5"]=0;
	$datos["externa"][$columna][$externalarea][$nivel]["6"]=0;
	$datos["externa"][$columna][$externalarea][$nivel]["7"]=0;
	
	
	}
	if($columna[0] == "Filtro"){
		$columna2=$columna[1].".".$columna[2].".".$columna[3];
					if($columna[3]==""){$columna2=$columna[1].".".$columna[2];}
					if(($columna[3]=="") and ($columna[2]=="")){$columna2=$columna[1];}
					$columna=$columna2;
				$nivel=utf8_encode( $data->sheets[0]['cells'][$x][4]);
				$N[$nivel][$columna]=0;
				$N["total"][$columna]=0;	
				
				}
	}}
	
	
	
	
//llenado
	
	for ($j = 5; $j <= $data->sheets[0]['numCols']; $j++) {
		
			for ($x = 4; $x <= $data->sheets[0]['numRows']; $x++) {
				
				$columna=utf8_encode( $data->sheets[0]['cells'][1][$j]);
				$columna= explode(".",$columna);
				$internalarea=utf8_encode( $data->sheets[0]['cells'][$x][2]);
				$externalarea=utf8_encode( $data->sheets[0]['cells'][$x][3]);
				$nivel=utf8_encode( $data->sheets[0]['cells'][$x][4]);
				$currentcell=utf8_encode( $data->sheets[0]['cells'][$x][$j]);
				
				if (($columna[0] == "A") or ($columna[0] == "B")or ($columna[0] == "C")or ($columna[0] == "D")or ($columna[0] == "E")or ($columna[0] == "F")or ($columna[0] == "G")or ($columna[0] == "H")or ($columna[0] == "I")or ($columna[0] == "J")or ($columna[0] == "K")){
					$columna2=$columna[1].".".$columna[2].".".$columna[3];
					if($columna[3]==""){$columna2=$columna[1].".".$columna[2];}
					if(($columna[3]=="") and ($columna[2]=="")){$columna2=$columna[1];}
					$columna=$columna2;
							
							if($currentcell=="1"){
								$datos["interna"][$columna][$internalarea][$nivel]["1"]++;
								$datos["externa"][$columna][$externalarea][$nivel]["1"]++;}
							if($currentcell=="2"){
								$datos["interna"][$columna][$internalarea][$nivel]["2"]++;
								$datos["externa"][$columna][$externalarea][$nivel]["2"]++;}							
							if($currentcell=="3"){
								$datos["interna"][$columna][$internalarea][$nivel]["3"]++;
								$datos["externa"][$columna][$externalarea][$nivel]["3"]++;}					
							if($currentcell=="4"){
								$datos["interna"][$columna][$internalarea][$nivel]["4"]++;
								$datos["externa"][$columna][$externalarea][$nivel]["4"]++;}					
							if($currentcell=="5"){
								$datos["interna"][$columna][$internalarea][$nivel]["5"]++;
								$datos["externa"][$columna][$externalarea][$nivel]["5"]++;}
							if($currentcell=="6"){
								$datos["interna"][$columna][$internalarea][$nivel]["6"]++;
								$datos["externa"][$columna][$externalarea][$nivel]["6"]++;}
							if($currentcell=="7"){
								$datos["interna"][$columna][$internalarea][$nivel]["7"]++;
								$datos["externa"][$columna][$externalarea][$nivel]["7"]++;}
										
				}
				
				if($columna[0] == "Filtro"){
										
						$columna2=$columna[1].".".$columna[2].".".$columna[3];
						if($columna[3]==""){$columna2=$columna[1].".".$columna[2];}
						if(($columna[3]=="") and ($columna[2]=="")){$columna2=$columna[1];}
						$columna=$columna2;
						if ($currentcell != "No"){
						$N[$nivel][$columna]++;
						$N["total"][$columna]++;
							}
				

				}
				
				
			}
		
		}

		
//echo "<pre>".print_r($datos,true)."</pre>";

//calculos ---------------------------------------------------------------------------------------------------------------------

foreach ($datos["interna"] as $servicio => $vservicio){
echo "<br><br><br><br><br><b><font size =20>".$servicio."</font></b><br>";
foreach ($datos["interna"][$servicio] as $area => $varea){
$pb=$datos["interna"][$servicio][$area]["Basico"]["6"]+$datos["interna"][$servicio][$area]["Basico"]["7"];
$pi=$datos["interna"][$servicio][$area]["Intermedio"]["6"]+$datos["interna"][$servicio][$area]["Intermedio"]["7"];
$pa=$datos["interna"][$servicio][$area]["Avanzado"]["6"]+$datos["interna"][$servicio][$area]["Avanzado"]["7"];
$pe=$datos["interna"][$servicio][$area]["Experto"]["6"]+$datos["interna"][$servicio][$area]["Experto"]["7"];


$db=$datos["interna"][$servicio][$area]["Basico"]["1"]+$datos["interna"][$servicio][$area]["Basico"]["2"]+$datos["interna"][$servicio][$area]["Basico"]["3"]+$datos["interna"][$servicio][$area]["Basico"]["4"];
$di=$datos["interna"][$servicio][$area]["Intermedio"]["1"]+$datos["interna"][$servicio][$area]["Intermedio"]["2"]+$datos["interna"][$servicio][$area]["Intermedio"]["3"]+$datos["interna"][$servicio][$area]["Intermedio"]["4"];
$da=$datos["interna"][$servicio][$area]["Avanzado"]["1"]+$datos["interna"][$servicio][$area]["Avanzado"]["2"]+$datos["interna"][$servicio][$area]["Avanzado"]["3"]+$datos["interna"][$servicio][$area]["Avanzado"]["4"];
$de=$datos["interna"][$servicio][$area]["Experto"]["1"]+$datos["interna"][$servicio][$area]["Experto"]["2"]+$datos["interna"][$servicio][$area]["Experto"]["3"]+$datos["interna"][$servicio][$area]["Experto"]["4"];

$tae=$datos["interna"][$servicio][$area]["Experto"]["5"]+$datos["interna"][$servicio][$area]["Avanzado"]["5"]+$db+$di+$pb+$pi;
$tbi=$datos["interna"][$servicio][$area]["Basico"]["5"]+$datos["interna"][$servicio][$area]["Intermedio"]["5"]+$da+$de+$pa+$pe;

if (($tae+$tbi)>0){

echo "<br><br><b>$area</b><br>";

echo "promotores =".round((($pb+$pi+$pa+$pe)/($tae+$tbi))*100,1)."<br>detractores =".round((($db+$di+$da+$de)/($tae+$tbi))*100,1)."<br>";
echo "indice = ".round((
($datos["interna"][$servicio][$area]["Basico"]["1"]+
($datos["interna"][$servicio][$area]["Basico"]["2"]*2)+
($datos["interna"][$servicio][$area]["Basico"]["3"]*3)+
($datos["interna"][$servicio][$area]["Basico"]["4"]*4)+
($datos["interna"][$servicio][$area]["Basico"]["5"]*5)+
($datos["interna"][$servicio][$area]["Basico"]["6"]*6)+
($datos["interna"][$servicio][$area]["Basico"]["7"]*7)+
$datos["interna"][$servicio][$area]["Intermedio"]["1"]+
($datos["interna"][$servicio][$area]["Intermedio"]["2"]*2)+
($datos["interna"][$servicio][$area]["Intermedio"]["3"]*3)+
($datos["interna"][$servicio][$area]["Intermedio"]["4"]*4)+
($datos["interna"][$servicio][$area]["Intermedio"]["5"]*5)+
($datos["interna"][$servicio][$area]["Intermedio"]["6"]*6)+
($datos["interna"][$servicio][$area]["Intermedio"]["7"]*7)+
$datos["interna"][$servicio][$area]["Avanzado"]["1"]+
($datos["interna"][$servicio][$area]["Avanzado"]["2"]*2)+
($datos["interna"][$servicio][$area]["Avanzado"]["3"]*3)+
($datos["interna"][$servicio][$area]["Avanzado"]["4"]*4)+
($datos["interna"][$servicio][$area]["Avanzado"]["5"]*5)+
($datos["interna"][$servicio][$area]["Avanzado"]["6"]*6)+
($datos["interna"][$servicio][$area]["Avanzado"]["7"]*7)+
$datos["interna"][$servicio][$area]["Experto"]["1"]+
($datos["interna"][$servicio][$area]["Experto"]["2"]*2)+
($datos["interna"][$servicio][$area]["Experto"]["3"]*3)+
($datos["interna"][$servicio][$area]["Experto"]["4"]*4)+
($datos["interna"][$servicio][$area]["Experto"]["5"]*5)+
($datos["interna"][$servicio][$area]["Experto"]["6"]*6)+
($datos["interna"][$servicio][$area]["Experto"]["7"]*7))
/($tae+$tbi)),1);


}

}

}

?>