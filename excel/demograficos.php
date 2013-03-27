<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="Content-Type" content="charset=UTF-8" />
<meta http-equiv="Content-Language" content="es-ES" />
<form action="exportin.php" method="post" target="_blank" id="FormularioExportacion">
<img src="boton.jpg" class="botonExcel" />
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form>

<form method='POST' action='query7.php'>
<input type='text' value='<?=$_POST["periodo"]?>' name='periodo'>periodo</input><br>
<input type='text' value='<?=$_POST["segmento"]?>' name='segmento'>segmento</input><br>
<input type='submit' value='ver query'>
</form>


<script type="text/javascript" src="jquery.min.js"></script>
<script language="javascript">
$(document).ready(function() {
     $(".botonExcel").click(function(event) {
     $("#datos_a_enviar").val( $("<div>").append( $("#tabla").eq(0).clone()).html());
     $("#FormularioExportacion").submit();
});
});
</script>
<?php
// original example.php from PHPExcel Reader with some major changes by P.
$suma=0;
global $inexistentes;
$inexistentes='';
include 'phun.php';
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
$maleP=$datos["M"]*100/$n;
$femaleP=$datos["F"]*100/$n;

$nai=0;
$nae=0;
foreach($datos['areaexterna'] as $nombre => $valor){
		$nae=$nae+$valor;		
				}
foreach($datos['areainterna'] as $nombree => $valor){
		$nai=$nai+$valor;		
				}

foreach($datos['areaexterna'] as $nombre => $valor){
		$areaeP[$nombre]=$valor*100/$nae;		
				}
foreach($datos['areainterna'] as $nombree => $valor){
		$areaiP[$nombree]=$valor*100/$nai;		
				}

$nedad=$datos["joven"]+$datos["adultoMayor"]+$datos['adulto']+$datos['adultoJoven'];				
$jovenP=$datos["joven"]/$nedad*100;
$adultoMayorP=$datos["adultoMayor"]/$nedad*100;
$adultoP=$datos['adulto']/$nedad*100;
$adultoJovenP=$datos['adultoJoven']/$nedad*100;	

$neducacion=$datos['emom']+$datos['tpcoi']+$datos['ucoi']+$datos['postgrado'];
$emomP=$datos['emom']/$neducacion*100;
$tpcoiP=$datos['tpcoi']/$neducacion*100;
$ucoiP=$datos['ucoi']/$neducacion*100;
$_POSTgradoP=$datos['postgrado']/$neducacion*100;

$nNivel=$datos['Intermedio']+$datos['Basico']+$datos['Avanzado']+$datos['Experto'];
$intermedioP=$datos['Intermedio']/$nNivel*100;
$basicoP=$datos['Basico']/$nNivel*100;
$avanzadoP=$datos['Avanzado']/$nNivel*100;
$expertoP=$datos['Experto']/$nNivel*100;


//echo "<pre>".print_r($datos,true)."</pre>";
//echo "<pre>".print_r($areaiP,true)."</pre>";
//echo "<pre>".print_r($areaeP,true)."</pre>";

//show

echo "<div id=tabla>";
echo "<br><table border='1'>";
echo"<th colspan='5'>Sexo N = $n</th><tr><td>N</td><td>Femenino</td><td>Masculino</td></tr>";
echo "<tr><td>".$n."</td><td>".round($femaleP,3)."%</td><td>".round($maleP,3)."%</td></tr>";
echo "</table>";


echo "<br><table border='1'>";
echo"<th colspan='5'>Area Interna N= ".$nai."</th><tr><td>N</td><td>Area</td><td>%</td></tr>";
foreach($areaiP as $nombre => $valor){
echo "<tr><td>".$datos["areainterna"][$nombre]."</td><td>".$nombre."</td><td>".round($valor,3)."%</td></tr>";
}
echo "</table>";

echo "<br><table border='1'>";
echo"<th colspan='5'>Area Externa N= ".$nae."</th><tr><td>N</td><td>Area</td><td>%</td></tr>";
foreach($areaeP as $nombre => $valor){
echo "<tr><td>".$datos["areaexterna"][$nombre]."</td><td>".$nombre."</td><td>".round($valor,3)."%</td></tr>";
}
echo "</table>";

echo "<br><table border='1'>";
echo"<th colspan='6'>Edad N = $nedad</th><tr><td>N</td><td>Joven</td><td>Adulto</td><td>Adulto Mayor</td></tr>";
echo "<tr><td>".$nedad."</td><td>".round($jovenP,3)."%</td><td>".round($adultoP,3)."%</td><td>".round($adultoMayorP,3)."%</td></tr>";
echo "</table>";

echo "<br><table border='1'>";
echo"<th colspan='6'>Nivel educacional N = $neducacion</th><tr><td>N</td><td>Enseñanza media o menos</td><td>Técnico Profesional completa/incompleta</td><td>Universitaria completa/incompleta</td><td>postgrado</td></tr>";
echo "<tr><td>".$neducacion."</td><td>".round($emomP,3)."%</td><td>".round($tpcoiP,3)."%</td><td>".round($ucoiP,3)."%</td><td>".round($_POSTgradoP,3)."%</td></tr>";
echo "</table>";

echo "<br><table border='1'>";
echo"<th colspan='6'>Nivel educacional N = $nNivel</th><tr><td>N</td><td>Básico</td><td>Intermedio</td><td>Avanzado</td><td>Experto</td></tr>";
echo "<tr><td>".$nNivel."</td><td>".round($basicoP,3)."%</td><td>".round($intermedioP,3)."%</td><td>".round($avanzadoP,3)."%</td><td>".round($expertoP,3)."%</td></tr>";
echo "</table>";

?>


</div>
