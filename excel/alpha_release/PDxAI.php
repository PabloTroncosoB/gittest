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
	$datos["interna"][$columna][$internalarea][$nivel]["mDeacuerdo"]=0;
	$datos["interna"][$columna][$internalarea][$nivel]["Deacuerdo"]=0;
	$datos["interna"][$columna][$internalarea][$nivel]["Desacuerdo"]=0;
	$datos["interna"][$columna][$internalarea][$nivel]["mDesacuerdo"]=0;
	$datos["interna"][$columna][$internalarea][$nivel]["niacnidec"]=0;
	$datos["externa"][$columna][$externalarea][$nivel]["mDeacuerdo"]=0;
	$datos["externa"][$columna][$externalarea][$nivel]["Deacuerdo"]=0;
	$datos["externa"][$columna][$externalarea][$nivel]["Desacuerdo"]=0;
	$datos["externa"][$columna][$externalarea][$nivel]["mDesacuerdo"]=0;
	$datos["externa"][$columna][$externalarea][$nivel]["niacnidec"]=0;
	
	
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
	
	for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
		
			for ($x = 1; $x <= $data->sheets[0]['numRows']; $x++) {
				
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
							
							if($currentcell=="Muy de acuerdo"){
								$datos["interna"][$columna][$internalarea][$nivel]["mDeacuerdo"]++;
								$datos["externa"][$columna][$externalarea][$nivel]["mDeacuerdo"]++;}
								if($currentcell=="De acuerdo"){
								$datos["interna"][$columna][$internalarea][$nivel]["Deacuerdo"]++;
								$datos["externa"][$columna][$externalarea][$nivel]["Deacuerdo"]++;}
							if($currentcell=="Muy en desacuerdo"){
								$datos["interna"][$columna][$internalarea][$nivel]["mDesacuerdo"]++;
								$datos["externa"][$columna][$externalarea][$nivel]["mDesacuerdo"]++;}
							if($currentcell=="En desacuerdo") {
								$datos["interna"][$columna][$internalarea][$nivel]["Desacuerdo"]++;
								$datos["externa"][$columna][$externalarea][$nivel]["Desacuerdo"]++;}
							if($currentcell=="Ni de acuerdo ni en desacuerdo"){
								$datos["externa"][$columna][$externalarea][$nivel]["niacnidec"]++;
								$datos["interna"][$columna][$internalarea][$nivel]["niacnidec"]++;}
					
					
					
					
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
$pb=$datos["interna"][$servicio][$area]["Basico"]["mDeacuerdo"]+$datos["interna"][$servicio][$area]["Basico"]["Deacuerdo"];
$pi=$datos["interna"][$servicio][$area]["Intermedio"]["mDeacuerdo"]+$datos["interna"][$servicio][$area]["Intermedio"]["Deacuerdo"];
$pa=$datos["interna"][$servicio][$area]["Avanzado"]["mDeacuerdo"]+$datos["interna"][$servicio][$area]["Avanzado"]["Deacuerdo"];
$pe=$datos["interna"][$servicio][$area]["Experto"]["mDeacuerdo"]+$datos["interna"][$servicio][$area]["Experto"]["Deacuerdo"];


$db=$datos["interna"][$servicio][$area]["Basico"]["mDesacuerdo"]+$datos["interna"][$servicio][$area]["Basico"]["Desacuerdo"];
$di=$datos["interna"][$servicio][$area]["Intermedio"]["mDesacuerdo"]+$datos["interna"][$servicio][$area]["Intermedio"]["Desacuerdo"];
$da=$datos["interna"][$servicio][$area]["Avanzado"]["mDesacuerdo"]+$datos["interna"][$servicio][$area]["Avanzado"]["Desacuerdo"];
$de=$datos["interna"][$servicio][$area]["Experto"]["mDesacuerdo"]+$datos["interna"][$servicio][$area]["Experto"]["Desacuerdo"];
$tae=$datos["interna"][$servicio][$area]["Experto"]["niacnidec"]+$datos["interna"][$servicio][$area]["Avanzado"]["niacnidec"]+$db+$di+$pb+$pi;
$tbi=$datos["interna"][$servicio][$area]["Basico"]["niacnidec"]+$datos["interna"][$servicio][$area]["Intermedio"]["niacnidec"]+$da+$de+$pa+$pe;

if (($tae+$tbi)>0){

echo "<br><br><b>$area</b><br>";

echo "promotores =".round((($pb+$pi+$pa+$pe)/($tae+$tbi))*100,1)."<br>detractores =".round((($db+$di+$da+$de)/($tae+$tbi))*100,1)."<br>";
echo "indice = ".
($datos["interna"][$servicio][$area]["Basico"]["mDesacuerdo"]+
($datos["interna"][$servicio][$area]["Basico"]["Desacuerdo"]*2)+
($datos["interna"][$servicio][$area]["Basico"]["niacnidec"]*3)+
($datos["interna"][$servicio][$area]["Basico"]["Deacuerdo"]*4)+(
$datos["interna"][$servicio][$area]["Basico"]["mDeacuerdo"]*5)+
$datos["interna"][$servicio][$area]["Intermedio"]["mDesacuerdo"]+
($datos["interna"][$servicio][$area]["Intermedio"]["Desacuerdo"]*2)+
($datos["interna"][$servicio][$area]["Intermedio"]["niacnidec"]*3)+
($datos["interna"][$servicio][$area]["Intermedio"]["Deacuerdo"]*4)+(
$datos["interna"][$servicio][$area]["Intermedio"]["mDeacuerdo"]*5)+
$datos["interna"][$servicio][$area]["Avanzado"]["mDesacuerdo"]+
($datos["interna"][$servicio][$area]["Avanzado"]["Desacuerdo"]*2)+
($datos["interna"][$servicio][$area]["Avanzado"]["niacnidec"]*3)+
($datos["interna"][$servicio][$area]["Avanzado"]["Deacuerdo"]*4)+(
$datos["interna"][$servicio][$area]["Avanzado"]["mDeacuerdo"]*5)+
$datos["interna"][$servicio][$area]["Experto"]["mDesacuerdo"]+
($datos["interna"][$servicio][$area]["Experto"]["Desacuerdo"]*2)+
($datos["interna"][$servicio][$area]["Experto"]["niacnidec"]*3)+
($datos["interna"][$servicio][$area]["Experto"]["Deacuerdo"]*4)+(
$datos["interna"][$servicio][$area]["Experto"]["mDeacuerdo"]*5))
/($tae+$tbi)*20;


}

}

}

?>