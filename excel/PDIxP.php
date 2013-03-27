<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="Content-Type" content="charset=UTF-8" />
<meta http-equiv="Content-Language" content="es-ES" />
<form action="exportin.php" method="post" target="_blank" id="FormularioExportacion">
<img src="boton.jpg" class="botonExcel" />
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form>
<form method='POST' action='query6.php'>
<input type='text' value='<?=$_POST["periodo"]?>' name='periodo'>periodo</input><br>
<input type='text' value='<?=$_POST["segmento"]?>' name='segmento'>segmento</input><br>
<input type='text' value='todos' name='servicio'>servicio</input><br>
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
	$columnaentera=utf8_encode( $data->sheets[0]['cells'][1][$j]);
	$columna= explode(".",$columnaentera);
	if (($columna[0] == "A") or ($columna[0] == "B")or ($columna[0] == "C")or ($columna[0] == "D")or ($columna[0] == "E")or ($columna[0] == "F")or ($columna[0] == "G")or ($columna[0] == "H")or ($columna[0] == "I")or ($columna[0] == "J")or ($columna[0] == "K")){
					$columna2=$columna[1].".".$columna[2].".".$columna[3];
					if($columna[3]==""){$columna2=$columna[1].".".$columna[2];}
					if(($columna[3]=="") and ($columna[2]=="")){$columna2=$columna[1];}
					$columna=$columna2;
					if($columna=="equipo.telefonía.fija" or $columna=="servicio.telefonía.fija"){$columna="telefonía.fija";}
						if($columna=="equipo.telefonía.movil" or $columna=="servicio.telefonía.movil"){$columna="telefonía.movil";}
						if($columna=="servicio.mesa.ayuda" or $columna=="atención.mesa.ayuda"){$columna="mesa.ayuda";}
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
foreach($dord as $servicio=>$tralalalal){
echo "<br><table border='1'>";
echo"<th colspan='5'>$servicio</th><tr><td>pregunta</td><td>N</td><td>promotores</td><td>detractores</td><td>indice</td>";
foreach($dord[$servicio]as $pregunta =>$kajshfjhgf){
//echo "<tr><td>$area</td><td> n= N </td><td>".$area." SN</td><td>".$area." indice</td></tr>";
echo "<tr><td>$pregunta</td><td>".$dord[$servicio][$pregunta]['N']."</td><td>".$dord[$servicio][$pregunta]['promotores']."</td><td>".$dord[$servicio][$pregunta]['detractores']."</td><td>".$dord[$servicio][$pregunta]['indice']."</td>";
}
echo "<table>";}

?>
</div>