<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="Content-Type" content="charset=UTF-8" />
<meta http-equiv="Content-Language" content="es-ES" />

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
					
	$internalarea=utf8_encode( $data->sheets[0]['cells'][$x][2]);
	$externalarea=utf8_encode( $data->sheets[0]['cells'][$x][3]);
	$nivel=utf8_encode( $data->sheets[0]['cells'][$x][4]);
	$datos["interna"][$internalarea][$columna][$nivel]["mDeacuerdo"]=0;
	$datos["interna"][$internalarea][$columna][$nivel]["Deacuerdo"]=0;
	$datos["interna"][$internalarea][$columna][$nivel]["Desacuerdo"]=0;
	$datos["interna"][$internalarea][$columna][$nivel]["mDesacuerdo"]=0;
	$datos["interna"][$internalarea][$columna][$nivel]["niacnidec"]=0;
	$datos["externa"][$externalarea][$columna][$nivel]["mDeacuerdo"]=0;
	$datos["externa"][$externalarea][$columna][$nivel]["Deacuerdo"]=0;
	$datos["externa"][$externalarea][$columna][$nivel]["Desacuerdo"]=0;
	$datos["externa"][$externalarea][$columna][$nivel]["mDesacuerdo"]=0;
	$datos["externa"][$externalarea][$columna][$nivel]["niacnidec"]=0;
	
	
	}
	if($columna[0] == "Filtro"){
		$columna2=$columna[1].".".$columna[2].".".$columna[3];
					if($columna[3]==""){$columna2=$columna[1].".".$columna[2];}
					if(($columna[3]=="") and ($columna[2]=="")){$columna2=$columna[1];}
					$columna=$columna2;
				$nivel=utf8_encode( $data->sheets[0]['cells'][$x][4]);
				$N[$nivel][$columna]=0;
				$N["total"][$columna]=0;	
				
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
							
							if($currentcell=="Muy de acuerdo"){
								$datos["interna"][$internalarea][$columna][$nivel]["mDeacuerdo"]++;
								$datos["externa"][$externalarea][$columna][$nivel]["mDeacuerdo"]++;}
								if(currentcell=="De acuerdo"){
								$datos["interna"][$internalarea][$columna][$nivel]["Deacuerdo"]++;
								$datos["externa"][$externalarea][$columna][$nivel]["Deacuerdo"]++;}
							if($currentcell=="Muy en desacuerdo"){
								$datos["interna"][$internalarea][$columna][$nivel]["mDesacuerdo"]++;
								$datos["externa"][$externalarea][$columna][$nivel]["mDesacuerdo"]++;}
							if($currentcell=="En desacuerdo") {
								$datos["interna"][$internalarea][$columna][$nivel]["Desacuerdo"]++;
								$datos["externa"][$externalarea][$columna][$nivel]["Desacuerdo"]++;}
							if($currentcell=="Ni de acuerdo ni en desacuerdo"){
								$datos["externa"][$externalarea][$columna][$nivel]["niacnidec"]++;
								$datos["interna"][$internalarea][$columna][$nivel]["niacnidec"]++;}
					
					
					
					
				}
				
				if($columna[0] == "Filtro"){
										
						$columna2=$columna[1].".".$columna[2].".".$columna[3];
						if($columna[3]==""){$columna2=$columna[1].".".$columna[2];}
						if(($columna[3]=="") and ($columna[2]=="")){$columna2=$columna[1];}
						$columna=$columna2;
						if ($currentcell != "No"){
						$N[$nivel][$columna]++;
						$N["total"][$columna]++;
							}
				

				}
				
				
			}
		
		}
echo "<pre>".print_r($N,true)."</pre>";
echo "<pre>".print_r($datos,true)."</pre>";

echo "numero de Notebooks = $nNotebook <br>
					numero de PC = $nPC <br>
					numero de fag =$nMac";
?>