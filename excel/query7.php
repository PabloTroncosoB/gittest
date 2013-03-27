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
	
$datos["M"]=0;
$datos["F"]=0;
$datos["N/R"]=0;


for ($x = 4; $x <= $data->sheets[0]['numRows']; $x++) {			
$internalarea=utf8_encode( $data->sheets[0]['cells'][$x][2]);
$externalarea=utf8_encode( $data->sheets[0]['cells'][$x][3]);
$nivel=utf8_encode( $data->sheets[0]['cells'][$x][4]);
$datos['areainterna'][$internalarea]=0;
$datos['areaexterna'][$externalarea]=0;}

$datos['joven']=0;
$datos['adulto']=0;
$datos['adultomayor']=0;
	
$datos['emom']=0;
$datos['tpcoi']=0;
$datos['ucoi']=0;
$datos['postgrado']=0;

$datos['Intermedio']=0;
$datos['Basico']=0;
$datos['Avanzado']=0;
$datos['Experto']=0;

//llenado
	
	for ($j = 0; $j <= $data->sheets[0]['numCols']; $j++) {
		
			for ($x = 4; $x <= $data->sheets[0]['numRows']; $x++) {
				
				$columna=utf8_encode( $data->sheets[0]['cells'][1][$j]);
				$nivel=utf8_encode( $data->sheets[0]['cells'][$x][4]);
				$currentcell=utf8_encode( $data->sheets[0]['cells'][$x][$j]);
				
				if ($columna == "Sexo"){
												
							if($currentcell=="Masculino"){
								$datos["M"]++;}
							if($currentcell=="Femenino"){
								$datos["F"]++;}
							if($currentcell==""){
								$datos["N/R"]++;}			
				}
				if ($columna == "area.generica"){//internal area
				foreach($datos['areainterna'] as $nombre => $valor){
				if($currentcell==$nombre){
						$datos['areainterna'][$nombre]++;}
				}
				}
				if ($columna == "area.homologada"){//external area
				foreach($datos['areaexterna'] as $nombree => $valor){
				if($currentcell==$nombree){
						$datos['areaexterna'][$nombree]++;}
				}
				}
				
				if ($columna == "Edad"){
												
							if($currentcell<25){
								$datos["joven"]++;}
							if(($currentcell >= 25)and($currentcell <= 40 )){
								$datos["adultoJoven"]++;}
							if(($currentcell > 40 )and($currentcell <= 60 )){
								$datos["adulto"]++;}
							if($currentcell > 60 ){
								$datos["adultoMayor"]++;}									
				}
				
if ($columna == "Nivel.educacion"){
												
							if(($currentcell=='Enseñanza Media completa')or($currentcell=='Enseñanza Media incompleta')){
								$datos["emom"]++;}
							if(($currentcell=='Técnico profesional incompleto')or($currentcell=='Técnico profesional completo')){
								$datos["tpcoi"]++;}
							if(($currentcell=='Estudios universitarios incompletos')or($currentcell=='Estudios universitarios completos')){
								$datos["ucoi"]++;}
							if($currentcell=='Postgrado'){
								$datos["postgrado"]++;}	
				}
				
if ($columna == "Nivel.usuario"){
								
			if($currentcell=='Intermedio'){
				$datos["Intermedio"]++;}
			if(($currentcell=='Básico')or ($currentcell=='Basico')){
				$datos["Basico"]++;}
			if($currentcell== 'Avanzado'){
				$datos["Avanzado"]++;}	
			if($currentcell== 'Experto'){
				$datos["Experto"]++;}	}
				
				
				
			}
		}

		
//echo "<pre>".print_r($datos,true)."</pre>";		
//calculos ---------------------------------------------------------------------------------------------------------------------
$n = $datos["F"]+$datos["M"];
$maleP=$datos["M"]/$n;
$femaleP=$datos["F"]/$n;

$nai=0;
$nae=0;
foreach($datos['areaexterna'] as $nombre => $valor){
		$nae=$nae+$valor;		
				}
foreach($datos['areainterna'] as $nombree => $valore){
		$nai=$nai+$valore;		
				}

foreach($datos['areaexterna'] as $nombre => $valor){
		$areaeP[$nombre]=$valor/$nae;		
				}
foreach($datos['areainterna'] as $nombree => $valore){
		$areaiP[$nombree]=$valore/$nai;		
				}

$nedad=$datos["joven"]+$datos["adultoMayor"]+$datos['adulto']+$datos['adultoJoven'];				
$jovenP=$datos["joven"]/$nedad;
$adultoMayorP=$datos["adultoMayor"]/$nedad;
$adultoP=$datos['adulto']/$nedad;
$adultoJovenP=$datos['adultoJoven']/$nedad;	

$neducacion=$datos['emom']+$datos['tpcoi']+$datos['ucoi']+$datos['postgrado'];
$emomP=$datos['emom']/$neducacion;
$tpcoiP=$datos['tpcoi']/$neducacion;
$ucoiP=$datos['ucoi']/$neducacion;
$_POSTgradoP=$datos['postgrado']/$neducacion;

$nNivel=$datos['Intermedio']+$datos['Basico']+$datos['Avanzado']+$datos['Experto'];
$intermedioP=$datos['Intermedio']/$nNivel;
$basicoP=$datos['Basico']/$nNivel;
$avanzadoP=$datos['Avanzado']/$nNivel;
$expertoP=$datos['Experto']/$nNivel;
	

echo "<div id=tabla>";
echo "insert into ben_precalculo (periodo_id,pregunta_id,subpregunta_id,opcion_id,estadistico_id,filtro_id,segmento_id,valor)
<br>
values<br>(";
echo "$periodo,150,449,0,4,8,$segmento,".round($femaleP,4)."),<br>(";
echo "$periodo,150,450,0,4,8,$segmento,".round($maleP,4)."),<br>(";
echo "$periodo,151,451,0,4,8,$segmento,".round($jovenP,4)."),<br>(";
echo "$periodo,151,452,0,4,8,$segmento,".round($adultoJovenP,4)."),<br>(";
echo "$periodo,151,453,0,4,8,$segmento,".round($adultoP,4)."),<br>(";
echo "$periodo,151,454,0,4,8,$segmento,".round($adultoMayorP,4)."),<br>(";
echo "$periodo,153,455,0,4,8,$segmento,".round($emomP,4)."),<br>(";
echo "$periodo,153,456,0,4,8,$segmento,".round($tpcoiP,4)."),<br>(";
echo "$periodo,153,457,0,4,8,$segmento,".round($ucoiP,4)."),<br>(";
echo "$periodo,153,458,0,4,8,$segmento,".round($_POSTgradoP,4)."),<br>";


foreach($areaeP as $nombre => $valor){

echo "($periodo,152,".getSubpregunta($nombre).",0,4,8,$segmento,".round($valor,4)."),<br>";
	} 
foreach($areaiP as $nombre => $valor){
echo "($periodo,468,".getSubpregunta($nombre).",0,4,8,$segmento,".round($valor,4)."),<br>";
 }
echo "($periodo,156,465,0,4,8,$segmento,".round($basicoP,4)."),<br>(";
echo "$periodo,156,466,0,4,8,$segmento,".round($intermedioP,4)."),<br>(";
echo "$periodo,156,467,0,4,8,$segmento,".round($avanzadoP,4)."),<br>(";
echo "$periodo,156,468,0,4,8,$segmento,".round($expertoP,4)."),<br>(";

echo "$periodo,386,612,0,4,8,$segmento,".$nedad."),<br>(";
echo "$periodo,386,613,0,4,8,$segmento,".$n."),<br>(";
echo "$periodo,386,614,0,4,8,$segmento,".$neducacion."),<br>(";
echo "$periodo,386,615,0,4,8,$segmento,".$nai."),<br>(";
echo "$periodo,386,616,0,4,8,$segmento,".$nNivel."),<br>(";
echo "$periodo,386,617,0,4,8,$segmento,".$nae.")";
echo $inexistentes;

?>

</div>
