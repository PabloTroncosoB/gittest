<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="Content-Type" content="charset=UTF-8" />
<meta http-equiv="Content-Language" content="es-ES" />
<form action="exportin.php" method="post" target="_blank" id="FormularioExportacion">
<img src="boton.jpg" class="botonExcel" />
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form>
<form method='POST' action='query3.php'>
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
	$columna=utf8_encode( $data->sheets[0]['cells'][1][$j]);
	$columna= explode(".",$columna);
	if (($columna[0] == "A") or ($columna[0] == "B")or ($columna[0] == "C")or ($columna[0] == "D")or ($columna[0] == "E")or ($columna[0] == "F")or ($columna[0] == "G")or ($columna[0] == "H")or ($columna[0] == "I")or ($columna[0] == "J")or ($columna[0] == "K")){
					$columna2=$columna[1].".".$columna[2].".".$columna[3];
					if($columna[3]==""){$columna2=$columna[1].".".$columna[2];}
					if(($columna[3]=="") and ($columna[2]=="")){$columna2=$columna[1];}
					$columna=$columna2;
					

	$nivel=utf8_encode( $data->sheets[0]['cells'][$x][4]);
	$datos[$columna][$nivel]["1"]=0;
	$datos[$columna][$nivel]["2"]=0;
	$datos[$columna][$nivel]["3"]=0;
	$datos[$columna][$nivel]["4"]=0;
	$datos[$columna][$nivel]["5"]=0;
	$datos[$columna][$nivel]["6"]=0;
	$datos[$columna][$nivel]["7"]=0;
	
	
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
								$datos[$columna][$nivel]["1"]++;}
							if($currentcell=="2"){
								$datos[$columna][$nivel]["2"]++;}
							if($currentcell=="3"){
								$datos[$columna][$nivel]["3"]++;}
							if($currentcell=="4") {
								$datos[$columna][$nivel]["4"]++;}
							if($currentcell=="5"){
								$datos[$columna][$nivel]["5"]++;}
							if($currentcell=="6"){
								$datos[$columna][$nivel]["6"]++;}
							if($currentcell=="7"){
								$datos[$columna][$nivel]["7"]++;}
									
					
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

$pb=$datos[$servicio]["Basico"]["6"]+$datos[$servicio]["Basico"]["7"];
$pi=$datos[$servicio]["Intermedio"]["6"]+$datos[$servicio]["Intermedio"]["7"];
$pa=$datos[$servicio]["Avanzado"]["6"]+$datos[$servicio]["Avanzado"]["7"];
$pe=$datos[$servicio]["Experto"]["6"]+$datos[$servicio]["Experto"]["7"];


$db=$datos[$servicio]["Basico"]["1"]+$datos[$servicio]["Basico"]["2"]+$datos[$servicio]["Basico"]["3"]+$datos[$servicio]["Basico"]["4"];
$di=$datos[$servicio]["Intermedio"]["1"]+$datos[$servicio]["Intermedio"]["2"]+$datos[$servicio]["Intermedio"]["3"]+$datos[$servicio]["Intermedio"]["4"];
$da=$datos[$servicio]["Avanzado"]["1"]+$datos[$servicio]["Avanzado"]["2"]+$datos[$servicio]["Avanzado"]["3"]+$datos[$servicio]["Avanzado"]["4"];
$de=$datos[$servicio]["Experto"]["1"]+$datos[$servicio]["Experto"]["2"]+$datos[$servicio]["Experto"]["3"]+$datos[$servicio]["Experto"]["4"];

$tae=$datos[$servicio]["Experto"]["5"]+$datos[$servicio]["Avanzado"]["5"]+$da+$de+$pa+$pe;
$tbi=$datos[$servicio]["Basico"]["5"]+$datos[$servicio]["Intermedio"]["5"]+$db+$di+$pb+$pi;

if ($tbi>0){

//echo "<br><br><b>$area</b><br>";
$pbi=round((($pb+$pi)/$tbi)*100,1);
$dbi=round((($db+$di)/$tbi)*100,1);

$dord[$servicio]["B/I"]["SN"] =$pbi-$dbi;

$dord[$servicio]["B/I"]["indice"] = round((
($datos[$servicio]["Basico"]["1"]+
($datos[$servicio]["Basico"]["2"]*2)+
($datos[$servicio]["Basico"]["3"]*3)+
($datos[$servicio]["Basico"]["4"]*4)+
($datos[$servicio]["Basico"]["5"]*5)+
($datos[$servicio]["Basico"]["6"]*6)+
($datos[$servicio]["Basico"]["7"]*7)+
$datos[$servicio]["Intermedio"]["1"]+
($datos[$servicio]["Intermedio"]["2"]*2)+
($datos[$servicio]["Intermedio"]["3"]*3)+
($datos[$servicio]["Intermedio"]["4"]*4)+
($datos[$servicio]["Intermedio"]["5"]*5)+
($datos[$servicio]["Intermedio"]["6"]*6)+
($datos[$servicio]["Intermedio"]["7"]*7))
/($tbi)),1);

//echo "$servicio promotores basico=".$pb."<br>promotores intermedio=".$pi."<br>";

}
if ($tae>0){
$dae=round((($da+$de)/$tae)*100,1);
$pae=round((($pa+$pe)/$tae)*100,1);
$dord[$servicio]["A/E"]["SN"] =$pae-$dae;

$dord[$servicio]["A/E"]["indice"] = round((
($datos[$servicio]["Avanzado"]["1"]+
($datos[$servicio]["Avanzado"]["2"]*2)+
($datos[$servicio]["Avanzado"]["3"]*3)+
($datos[$servicio]["Avanzado"]["4"]*4)+
($datos[$servicio]["Avanzado"]["5"]*5)+
($datos[$servicio]["Avanzado"]["6"]*6)+
($datos[$servicio]["Avanzado"]["7"]*7)+
$datos[$servicio]["Experto"]["1"]+
($datos[$servicio]["Experto"]["2"]*2)+
($datos[$servicio]["Experto"]["3"]*3)+
($datos[$servicio]["Experto"]["4"]*4)+
($datos[$servicio]["Experto"]["5"]*5)+
($datos[$servicio]["Experto"]["6"]*6)+
($datos[$servicio]["Experto"]["7"]*7))
/($tae)),1);

}
$dord[$servicio]["B/I"]["N"] = $N[$servicio]["B/I"];
$dord[$servicio]["A/E"]["N"] = $N[$servicio]["A/E"];

}

//echo "<pre>".print_r($datos,true)."</pre>";
echo "<div id=tabla>";
foreach($dord as $servicio=>$tralalalal){
echo "<br><table border='1'>";
echo"<th colspan='6'>$servicio</th>
<tr><td>Nivel</td><td>N</td><td>SN</td><td>Índice</td></tr>";
foreach($dord[$servicio]as $nivel =>$kajshfjhgf){
echo "<tr><td>$nivel</td><td>".$dord[$servicio][$nivel]['N']."</td><td>".$dord[$servicio][$nivel]['SN']."</td><td>".$dord[$servicio][$nivel]['indice']."</td></tr>";
}
echo "<table>";}

?>
</div>