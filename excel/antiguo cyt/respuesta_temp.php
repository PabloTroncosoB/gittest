<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="Content-Type" content="charset=UTF-8" />
<meta http-equiv="Content-Language" content="es-ES" />

<?php

// original example.php with some major awesome badass changes
$sumapregunta=107; //comienza en la ultima pregunta actual
$suma=108;
$sumasubpregunta=166;//comienza en la ultima subpregunta actual+1
require_once 'reader.php';

$data = new Spreadsheet_Excel_Reader();

$data->setOutputEncoding('CP1251');



$data->read('archivos/temp.xls');


error_reporting(E_ALL ^ E_NOTICE);
$empresacontacto = '71e0564bd6234fb3bf9849cbafcc9780';
$periodo_id=1001;
$subencuesta_id=1000;
//$pregunta_id;
//$subpregunta_id;
//$opcion_id;
$proveedor_id=0;
//$derivado_id;
$referencia_id=0;
$respuesta=0;
$respuesta_texto=0;

$texto ="empresa_contacto_id	;periodo_id;subencuesta_id;pregunta_id;subpregunta_id;opcion_id;proveedor_id;derivado_id;referencia_id;respuesta;respuesta_texto<br>";
include("id.php");
include("idrespuesta.php");
include("idderivado.php");
$cuenta=0;
$comparapreguntas = null;
		for ($j = 3; $j <= $data->sheets[0]['numCols']; $j++) {
		
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
			//$texto =$texto.$id.",'','".$pregunta[0]."',11),";
			
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
		//excepciones <--------------------------------------------------------------------------------
		if($sumapregunta == 137) {
			$opcion_id=0; 
			$respuesta=utf8_encode( $data->sheets[0]['cells'][$i][$j]);
				}else{
			$opcion_id=DevuelveIdRespuesta(utf8_encode( $data->sheets[0]['cells'][$i][$j]));
				}
		$derivado_id=DevuelveIdDerivado($i-2);
		$texto=$texto.$empresacontacto.";".$periodo_id.";".$subencuesta_id.";".$preguntasubpregunta.";".$opcion_id.";".$proveedor_id.";".$derivado_id.";".$referencia_id.";".$respuesta.";".$respuesta_texto."<br>";
}		$respuesta=0;
			
	}
echo $texto;
	 

?>