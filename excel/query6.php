<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="Content-Type" content="charset=UTF-8" />
<meta http-equiv="Content-Language" content="es-ES" />

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
//seteo	
	
for ($j = 5; $j <= $data->sheets[0]['numCols']; $j++) {
	for ($x = 4; $x <= $data->sheets[0]['numRows']; $x++) {
	$columnaentera=utf8_encode( $data->sheets[0]['cells'][1][$j]);
	$columna= explode(".",$columnaentera);
	if (($columna[0] == "A") or ($columna[0] == "B")or ($columna[0] == "C")or ($columna[0] == "D")or ($columna[0] == "E")or ($columna[0] == "F")or ($columna[0] == "G")or ($columna[0] == "H")or ($columna[0] == "I")or ($columna[0] == "J")or ($columna[0] == "K")){
					$columna2=$columna[1].".".$columna[2].".".$columna[3];
					if($columna[3]==""){$columna2=$columna[1].".".$columna[2];}
					if(($columna[3]=="") and ($columna[2]=="")){$columna2=$columna[1];}
					$columna=$columna2;
					if($columna=="equipo.telefon�a.fija" or $columna=="servicio.telefon�a.fija"){$columna="telefon�a.fija";}
						if($columna=="equipo.telefon�a.movil" or $columna=="servicio.telefon�a.movil"){$columna="telefon�a.movil";}
						if($columna=="servicio.mesa.ayuda" or $columna=="atenci�n.mesa.ayuda"){$columna="mesa.ayuda";}
	$internalarea=utf8_encode( $data->sheets[0]['cells'][$x][2]);
	$externalarea=utf8_encode( $data->sheets[0]['cells'][$x][3]);
	$nivel=utf8_encode( $data->sheets[0]['cells'][$x][4]);
	$datos[$columna][$columnaentera]["1"]=0;
	$datos[$columna][$columnaentera]["2"]=0;
	$datos[$columna][$columnaentera]["3"]=0;
	$datos[$columna][$columnaentera]["4"]=0;
	$datos[$columna][$columnaentera]["5"]=0;
	$datos[$columna][$columnaentera]["6"]=0;
	$datos[$columna][$columnaentera]["7"]=0;
	
	
	
	}
	if($columna[0] == "Filtro"){
$columna2=$columna[1].".".$columna[2].".".$columna[3];
					if($columna[3]==""){$columna2=$columna[1].".".$columna[2];}
					if(($columna[3]=="") and ($columna[2]=="")){$columna2=$columna[1];}
					$columna=$columna2;
				//$nivel=utf8_encode( $data->sheets[0]['cells'][$x][4]);
				//$N[$nivel][$columna]=0;
				$N[$columna]=0;	
				
				}
	}}
	
	
	
	
//llenado
	
	for ($j = 5; $j <= $data->sheets[0]['numCols']; $j++) {
		
			for ($x = 4; $x <= $data->sheets[0]['numRows']; $x++) {
				
				$columnaentera=utf8_encode( $data->sheets[0]['cells'][1][$j]);
				$columna= explode(".",$columnaentera);
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
								$datos[$columna][$columnaentera]["1"]++;}
							if($currentcell=="2"){
								$datos[$columna][$columnaentera]["2"]++;}							
							if($currentcell=="3"){
								$datos[$columna][$columnaentera]["3"]++;}					
							if($currentcell=="4"){
								$datos[$columna][$columnaentera]["4"]++;}					
							if($currentcell=="5"){
								$datos[$columna][$columnaentera]["5"]++;}
							if($currentcell=="6"){
								$datos[$columna][$columnaentera]["6"]++;}
							if($currentcell=="7"){
								$datos[$columna][$columnaentera]["7"]++;}
					
					
					
					
				}
				
				if($columna[0] == "Filtro"){
										
						$columna2=$columna[1].".".$columna[2].".".$columna[3];
					if($columna[3]==""){$columna2=$columna[1].".".$columna[2];}
					if(($columna[3]=="") and ($columna[2]=="")){$columna2=$columna[1];}
					$columna=$columna2;
						if ($currentcell != "No"){
						//$N[$nivel][$columna]++;
						$N[$columna]++;
							}
				

				}
				
				
			}
		
		}

		
//echo "<pre>".print_r($N,true)."</pre>";		
//calculos ---------------------------------------------------------------------------------------------------------------------

foreach ($datos as $servicio => $vservicio){
//echo "<br><br><br><br><br><b><font size =20>".$servicio."</font></b><br>";
foreach ($datos[$servicio] as $pregunta => $vpregunta){
$p=$datos[$servicio][$pregunta]["6"]+$datos[$servicio][$pregunta]["7"];
$d=$datos[$servicio][$pregunta]["1"]+$datos[$servicio][$pregunta]["2"]+$datos[$servicio][$pregunta]["3"]+$datos[$servicio][$pregunta]["4"];

$t=$datos[$servicio][$pregunta]["5"]+$d+$p;
//echo "<pre>".print_r($datos,true)."</pre>";
if (($t)>0){

//echo "<br><br><b>$pregunta</b><br>";
$promotores=round(($p/$t)*100,1);
$detractores =round(($d/$t)*100,1);
$dord[$servicio][$pregunta]["promotores"]= $promotores;
$dord[$servicio][$pregunta]["detractores"]=$detractores;
//echo "promotores =".$promotores."<br>detractores =".$detractores."<br>";
$dord[$servicio][$pregunta]["indice"] = round((
($datos[$servicio][$pregunta]["1"]+
($datos[$servicio][$pregunta]["2"]*2)+
($datos[$servicio][$pregunta]["3"]*3)+
($datos[$servicio][$pregunta]["4"]*4)+
($datos[$servicio][$pregunta]["5"]*5)+
($datos[$servicio][$pregunta]["6"]*6)+
($datos[$servicio][$pregunta]["7"]*7))
/($t)),1);

$dord[$servicio][$pregunta]["N"] = $N[$servicio];

}

}

}

echo "<div id=tabla>";
echo "insert into ben_precalculo (periodo_id,pregunta_id,subpregunta_id,opcion_id,estadistico_id,filtro_id,segmento_id,valor)
<br>
values (<br>
";
foreach($dord as $servicio=>$tralalalal){
foreach($dord[$servicio]as $nivel =>$kajshfjhgf){
if(getPregunta($servicio,"satiuc promotores")!="N/E"){
if(getSubpregunta($nivel)!="N/E"){
if($servs == "todos"){
echo "$periodo,".getPregunta($servicio,"satiuc promotores").",".getSubpregunta($nivel).",".getOpcion($servicio).",4,2,$segmento,".$dord[$servicio][$nivel]["promotores"]."),<br>(";
echo "$periodo,".getPregunta($servicio,"satiuc detractores").",".getSubpregunta($nivel).",".getOpcion($servicio).",4,2,$segmento,".$dord[$servicio][$nivel]["detractores"]."),<br>(";
echo "$periodo,".getPregunta($servicio,"satiuc indice").",".getSubpregunta($nivel).",".getOpcion($servicio).",4,2,$segmento,".$dord[$servicio][$nivel]["indice"]."),<br>(";}
}
if(($servs != "todos") and ($servs == $servicio)){
echo "$periodo,".getPregunta($servicio,"satiuc promotores").",".getSubpregunta($nivel).",".getOpcion($servicio).",4,2,$segmento,".$dord[$servicio][$nivel]["promotores"]."),<br>(";
echo "$periodo,".getPregunta($servicio,"satiuc detractores").",".getSubpregunta($nivel).",".getOpcion($servicio).",4,2,$segmento,".$dord[$servicio][$nivel]["detractores"]."),<br>(";
echo "$periodo,".getPregunta($servicio,"satiuc indice").",".getSubpregunta($nivel).",".getOpcion($servicio).",4,2,$segmento,".$dord[$servicio][$nivel]["indice"]."),<br>(";}
}}}

echo $inexistentes;

?>

</div>
