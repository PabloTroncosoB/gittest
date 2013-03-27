<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="Content-Type" content="charset=UTF-8" />
<meta http-equiv="Content-Language" content="es-ES" />

<?php

$sumapregunta=107; 
$suma=108;
$sumasubpregunta=166;
require_once 'reader.php';


$data = new Spreadsheet_Excel_Reader();


$data->setOutputEncoding('CP1251');

$data->read('archivos/temp.xls');

error_reporting(E_ALL ^ E_NOTICE);

$texto ="pregunta_id;subpregunta_id;respuesta<br>";
include("id.php");
include("idrespuesta.php");
$cuenta=0;
$comparapreguntas = null;
		for ($j = 3; $j <= $data->sheets[0]['numCols']-3; $j++) {
		
			$cadena=utf8_encode( $data->sheets[0]['cells'][2][$j]); 
			$cadena=DevuelveId($cadena);
			$cadena[0]=intval($cadena[0]+$suma);
			$cadena[1]=intval($cadena[1]);
		

			$pregunta=utf8_encode( $data->sheets[0]['cells'][1][$j]); 
			$pregunta = explode(":",$pregunta);
			$p2=explode(".",$pregunta[0]);
			if($p2[1]!=false){$pregunta[0] = $p2[1].".";}//.$p2[2].".".$p2[3].".".$p2[4];}


		if(($pregunta[1]==FALSE) and ($cadena[1] >= 1)){
			$pregunta[1]=$pregunta[0]; 
			$pregunta[0]='';
			
}	
		
		if($cadena[0] != $comparapreguntas)
		{	$id=$cadena[0]+$cuenta;
						
			if($cadena[1]==FALSE){
			$sumapregunta++;	
			$preguntasubpregunta=$sumapregunta.";0";
			}else{
			$sumapregunta++;}
		}
		if($cadena[1] != false ){
			$id2=$cadena[0]+$cuenta+1;
			$preguntasubpregunta=$sumapregunta.";".$sumasubpregunta;
			$sumasubpregunta++;
			$cuenta++;
			
			}
			
		$comparapreguntas = $cadena[0];

		for($i = 3; $i <= $data->sheets[0]['numRows']; $i++) {
		$respuesta=DevuelveIdRespuesta(utf8_encode( $data->sheets[0]['cells'][$i][$j]));
		$texto=$texto.$preguntasubpregunta.";".$respuesta."<br>";
}
			
	}
echo $texto;
	  
?>