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
	for ($j = 5; $j <= $data->sheets[0]['numCols']; $j++) {
	for ($x = 3; $x <= $data->sheets[0]['numRows']; $x++) {
	$columna=utf8_encode( $data->sheets[0]['cells'][1][$j]);
	$columna= explode(".",$columna);
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
	$datos["interna"][$columna]["1"]=0;
	$datos["interna"][$columna]["2"]=0;
	$datos["interna"][$columna]["3"]=0;
	$datos["interna"][$columna]["4"]=0;
	$datos["interna"][$columna]["5"]=0;
	$datos["interna"][$columna]["6"]=0;
	$datos["interna"][$columna]["7"]=0;
	
	
	
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
							
							if($currentcell=="1"){
								$datos["interna"][$columna]["1"]++;
							}
							if($currentcell=="2"){
								$datos["interna"][$columna]["2"]++;
							}							
							if($currentcell=="3"){
								$datos["interna"][$columna]["3"]++;
							}					
							if($currentcell=="4"){
								$datos["interna"][$columna]["4"]++;
							}					
							if($currentcell=="5"){
								$datos["interna"][$columna]["5"]++;
							}
							if($currentcell=="6"){
								$datos["interna"][$columna]["6"]++;
							}
							if($currentcell=="7"){
								$datos["interna"][$columna]["7"]++;
							}
					
					
					
					
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

foreach ($datos["interna"] as $servicio => $vservicio){
//echo "<br><br><br><br><br><b><font size =20>".$servicio."</font></b><br>";
foreach ($datos["interna"][$servicio] as $area => $varea){
$p=$datos["interna"][$servicio]["6"]+$datos["interna"][$servicio]["7"];
$d=$datos["interna"][$servicio]["1"]+$datos["interna"][$servicio]["2"]+$datos["interna"][$servicio]["3"]+$datos["interna"][$servicio]["4"];

$t=$datos["interna"][$servicio]["5"]+$d+$p;
//echo "<pre>".print_r($datos,true)."</pre>";
if (($t)>0){

//echo "<br><br><b>$area</b><br>";
$promotores=round(($p/$t)*100,1);
$detractores =round(($d/$t)*100,1);
$dord[$servicio]["SN"]= $promotores-$detractores;
$dord[$servicio]["promotores"]= $promotores;
$dord[$servicio]["detractores"]= $detractores;
//echo "promotores =".$promotores."<br>detractores =".$detractores."<br>";
$dord[$servicio]["indice"] = round((
($datos["interna"][$servicio]["1"]+
($datos["interna"][$servicio]["2"]*2)+
($datos["interna"][$servicio]["3"]*3)+
($datos["interna"][$servicio]["4"]*4)+
($datos["interna"][$servicio]["5"]*5)+
($datos["interna"][$servicio]["6"]*6)+
($datos["interna"][$servicio]["7"]*7))
/($t)),1);

$dord[$servicio]["N"] = $N[$servicio];

}

}

}
echo "<div id=tabla>";
echo "insert into ben_precalculo (periodo_id,pregunta_id,subpregunta_id,opcion_id,estadistico_id,filtro_id,segmento_id,valor)
<br>
values (<br>
";
foreach($dord as $servicio=>$vlor){
if (getSubpregunta($servicio)!='N/E'){
if($servs == "todos"){
echo "$periodo,159,".getSubpregunta($servicio).",0,4,8,$segmento,".$dord[$servicio]["SN"]."),<br>(";
echo "$periodo,160,".getSubpregunta($servicio).",0,4,8,$segmento,".$dord[$servicio]["indice"]."),<br>(";
echo "$periodo,499,".getSubpregunta($servicio).",0,4,8,$segmento,".$dord[$servicio]["promotores"]."),<br>(";
echo "$periodo,500,".getSubpregunta($servicio).",0,4,8,$segmento,".$dord[$servicio]["detractores"]."),<br>(";
}
if(($servs != "todos") and ($servs == $servicio)){
echo "$periodo,159,".getSubpregunta($servicio).",0,4,8,$segmento,".$dord[$servicio]["SN"]."),<br>(";
echo "$periodo,160,".getSubpregunta($servicio).",0,4,8,$segmento,".$dord[$servicio]["indice"]."),<br>(";
echo "$periodo,499,".getSubpregunta($servicio).",0,4,8,$segmento,".$dord[$servicio]["promotores"]."),<br>(";
echo "$periodo,500,".getSubpregunta($servicio).",0,4,8,$segmento,".$dord[$servicio]["detractores"]."),<br>(";
}
}}


echo $inexistentes;


?>

</div>
