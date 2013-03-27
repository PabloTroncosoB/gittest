<?php
include 'phun.php';
$segmento=$_POST["segmento"];
$periodo=$_POST["periodo"];
$servs=$_POST["servicio"];
global $inexistentes;
$inexistentes='';
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
					

	$nivel=utf8_encode( $data->sheets[0]['cells'][$x][4]);
	$datos[$columna][$nivel]["mDeacuerdo"]=0;
	$datos[$columna][$nivel]["Deacuerdo"]=0;
	$datos[$columna][$nivel]["Desacuerdo"]=0;
	$datos[$columna][$nivel]["mDesacuerdo"]=0;
	$datos[$columna][$nivel]["niacnidec"]=0;
	
	
	}
	if($columna[0] == "Filtro"){
$columna2=$columna[1].".".$columna[2].".".$columna[3];
					if($columna[3]==""){$columna2=$columna[1].".".$columna[2];}
					if(($columna[3]=="") and ($columna[2]=="")){$columna2=$columna[1];}
					$columna=$columna2;
				//$nivel=utf8_encode( $data->sheets[0]['cells'][$x][4]);
				//$N[$nivel][$columna]=0;
				$N[$columna]["B/I"]=0;	
				$N[$columna]["A/E"]=0;
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
								$datos[$columna][$nivel]["mDeacuerdo"]++;}
							if($currentcell=="De acuerdo"){
								$datos[$columna][$nivel]["Deacuerdo"]++;}
							if($currentcell=="Muy en desacuerdo"){
								$datos[$columna][$nivel]["mDesacuerdo"]++;}
							if($currentcell=="En desacuerdo") {
								$datos[$columna][$nivel]["Desacuerdo"]++;}
							if($currentcell=="Ni de acuerdo ni en desacuerdo"){
								$datos[$columna][$nivel]["niacnidec"]++;}
					
					
					
					
				}
				
				if($columna[0] == "Filtro"){
										
						$columna2=$columna[1].".".$columna[2].".".$columna[3];
					if($columna[3]==""){$columna2=$columna[1].".".$columna[2];}
					if(($columna[3]=="") and ($columna[2]=="")){$columna2=$columna[1];}
					$columna=$columna2;
						if ($currentcell != "No"){
						if($nivel=="Basico" or $nivel=="Intermedio"){$N[$columna]["B/I"]++;}
						if($nivel=="Avanzado" or $nivel=="Experto"){$N[$columna]["A/E"]++;}
							}
				

				}
				
				
			}
		
		}

		
//echo "<pre>".print_r($datos,true)."</pre>";		
//calculos ---------------------------------------------------------------------------------------------------------------------

foreach ($datos as $servicio => $vservicio){
//echo "<br><br><br><br><br><b><font size =20>".$servicio."</font></b><br>";

$pb=$datos[$servicio]["Basico"]["mDeacuerdo"]+$datos[$servicio]["Basico"]["Deacuerdo"];
$pi=$datos[$servicio]["Intermedio"]["mDeacuerdo"]+$datos[$servicio]["Intermedio"]["Deacuerdo"];
$pa=$datos[$servicio]["Avanzado"]["mDeacuerdo"]+$datos[$servicio]["Avanzado"]["Deacuerdo"];
$pe=$datos[$servicio]["Experto"]["mDeacuerdo"]+$datos[$servicio]["Experto"]["Deacuerdo"];


$db=$datos[$servicio]["Basico"]["mDesacuerdo"]+$datos[$servicio]["Basico"]["Desacuerdo"];
$di=$datos[$servicio]["Intermedio"]["mDesacuerdo"]+$datos[$servicio]["Intermedio"]["Desacuerdo"];
$da=$datos[$servicio]["Avanzado"]["mDesacuerdo"]+$datos[$servicio]["Avanzado"]["Desacuerdo"];
$de=$datos[$servicio]["Experto"]["mDesacuerdo"]+$datos[$servicio]["Experto"]["Desacuerdo"];

$tae=$datos[$servicio]["Experto"]["niacnidec"]+$datos[$servicio]["Avanzado"]["niacnidec"]+$da+$de+$pa+$pe;
$tbi=$datos[$servicio]["Basico"]["niacnidec"]+$datos[$servicio]["Intermedio"]["niacnidec"]+$db+$di+$pb+$pi;

if ($tbi>0){

//echo "<br><br><b>$area</b><br>";
$pbi=round((($pb+$pi)/$tbi)*100,1);
$dbi=round((($db+$di)/$tbi)*100,1);

$dord[$servicio]["B/I"]["SN"] =$pbi-$dbi;


//echo "$servicio promotores basico=".$pb."<br>promotores intermedio=".$pi."<br>";

}
if ($tae>0){
$dae=round((($da+$de)/$tae)*100,1);
$pae=round((($pa+$pe)/$tae)*100,1);
$dord[$servicio]["A/E"]["SN"] =$pae-$dae;

}
$dord[$servicio]["B/I"]["N"] = $N[$servicio]["B/I"];
$dord[$servicio]["A/E"]["N"] = $N[$servicio]["A/E"];





}
echo "insert into ben_precalculo (periodo_id,pregunta_id,subpregunta_id,opcion_id,estadistico_id,filtro_id,segmento_id,valor)
<br>
values (<br>";
//echo "<pre>".print_r($datos,true)."</pre>";
foreach($dord as $servicio=>$tralalalal){
foreach($dord[$servicio]as $nivel =>$kajshfjhgf){
if(getPregunta($servicio,"analitico SN")!="N/E"){
if(getSubpregunta($nivel)!="N/E"){
if($servs == "todos"){
echo "$periodo,".getPregunta($servicio,"analitico SN").",".getSubpregunta($nivel).",0,4,8,$segmento,".$dord[$servicio][$nivel]["SN"]."),<br>(";

}
if(($servs != "todos") and ($servs == $servicio)){
echo "$periodo,".getPregunta($servicio,"analitico SN").",".getSubpregunta($nivel).",0,4,8,$segmento,".$dord[$servicio][$nivel]["SN"]."),<br>(";
}}}}}
?>