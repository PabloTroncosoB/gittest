<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="Content-Type" content="charset=UTF-8" />
<meta http-equiv="Content-Language" content="es-ES" />

<?php
$indexcolumna=21; //buscar una persona que respondiera toda la encuesta, con este dato se saca el tipo de pregunta mediante la respuesta.
$suma=0;
require_once 'reader.php';



$data = new Spreadsheet_Excel_Reader();


$data->setOutputEncoding('CP1251');



$data->read('archivos/temp.xls');


error_reporting(E_ALL ^ E_NOTICE);


include("id.php");
include("tipopregunta.php");
$sumapreguntas=108;
$preguntas='id;padre_id;tipo_pregunta_id;texto;descripcion;otro;minimo;maximo;decimales';
$padre_id = 'NULL';
$descripcion = '';
$otro='';
$minimo='NULL';
$maximo='NULL';
$decimales=0;
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
			$pregunta[1]=$pregunta[0]; $pregunta[0]='';
			}	
		
		if($cadena[0] != $comparapreguntas)
		{	//$cadena[0]=$cadena[0]+$cuenta;
			//echo "<br><br>Pregunta: ".$cadena[0]." ".$pregunta[0];
			$textorespuesta=utf8_encode( $data->sheets[0]['cells'][$indexcolumna][$j]); 
			$tipo_pregunta_id=TipoPregunta($textorespuesta);
			$preguntas=$preguntas."<br>".$sumapreguntas.";".$padre_id.";".$tipo_pregunta_id.";".$pregunta[0].";".$descripcion.";".$otro.";".$minimo.";".$maximo.";".$decimales;	
			$sumapreguntas++;
		}
		if($cadena[1] != false ){
			$id=$cadena[0]+$cadena[1];
			//echo "<br>Subpregunta: ".$cadena[1]." ".$pregunta[1];
			$cuenta++;
			}
			
		$comparapreguntas = $cadena[0];
		//id;padre_id;tipo_pregunta_id;texto;descripcion;otro;minimo;maximo;decimales

	
	}

echo $preguntas;



?>