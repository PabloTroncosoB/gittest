<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="Content-Type" content="charset=UTF-8" />
<meta http-equiv="Content-Language" content="es-ES" />
<form action="exportin.php" method="post" target="_blank" id="FormularioExportacion">
<img src="boton.jpg" class="botonExcel" />
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form>

<input type='text' id='periodo' value='<?=$_POST["periodo"]?>' name='periodo'> periodo</input><br>
<input type='text' id='segmento' value='<?=$_POST["segmento"]?>' name='segmento'> segmento</input><br>
<input type='submit' value='ver query' onclick='QueryMe()'>

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
include 'phun.php';
global $inexistentes;
$inexistentes = '';
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
$Ntotal = $data->sheets[0]['numRows'] -3;
	for ($x = 4; $x <= $data->sheets[0]['numRows']; $x++) {
	$columna=utf8_encode( $data->sheets[0]['cells'][1][4]);


	if($columna == "Nivel.usuario"){

				$nivel=utf8_encode( $data->sheets[0]['cells'][$x][4]);
				$N[$nivel]=0;
				
				}
	}
	
	
	
	
//llenado
	
	
		for ($x = 4; $x <= $data->sheets[0]['numRows']; $x++) {
	$columna=utf8_encode( $data->sheets[0]['cells'][1][4]);


	if($columna == "Nivel.usuario"){
				$nivel=utf8_encode( $data->sheets[0]['cells'][$x][4]);
				$N[$nivel]++;
				}
	}

		

		
//echo "<pre>".print_r($total,true)."</pre>";		


echo "<div id=tabla>";
echo "<br><table border='1'>";
echo"<tr><td>Nivel</td><td>N=$Ntotal</td></tr>";
foreach($N as $servicio=>$tralalalal){



//echo "<tr><td>$area</td><td> n= N </td><td>".$area." SN</td><td>".$area." indice</td></tr>";
echo "<tr><td>$servicio</td><td>".$N[$servicio]."</td>";
}
echo "<table>";

?>
</div><br><br>
<a id="queryta"></a>
<script type="text/javascript">
function QueryMe(){
	var perioDo = document.getElementById('periodo');
	var segmenTo = document.getElementById('segmento');
	document.getElementById('queryta').innerHTML='insert into ben_precalculo <br>(periodo_id,pregunta_id,subpregunta_id,opcion_id,estadistico_id,filtro_id,segmento_id,valor)<br> values ';
	document.getElementById('queryta').innerHTML=document.getElementById('queryta').innerHTML+'<br>('+ perioDo.value +',469,621,0,4,8,' + segmenTo.value +','+<?=$Ntotal?>+'),';
	<?php foreach ($N as $servicio => $vserv){?>
	document.getElementById('queryta').innerHTML=document.getElementById('queryta').innerHTML+'<br>('+ perioDo.value +',469,<?=getPregunta($servicio,"N")?>,0,4,8,' + segmenTo.value +','+<?=$vserv?>+'),';		
	<?php }?>
	
}
</script>
<br><br>
<?=$inexistentes?>