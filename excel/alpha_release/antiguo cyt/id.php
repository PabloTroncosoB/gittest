
<?php
/*
Funcion simple que devuelve de forma separada el artibuto id si es que contiene una letra al finál para formatos como P12A o , ejemplo:
$id=$_GET["id"]; //id = P12B
$cadena =DevuelveLetra($id);
echo "<br>Pregunta: ".$cadena[0]."<br>"; //imprime 12
echo "subpregunta: ".$cadena[1]; //imprime 2
*/

function DevuelveId($id){

$letra = substr($id,-1);
$numero = substr($id, 0, -1);



if (($letra=='1')or ($letra=='2')or ($letra=='3')or ($letra=='4')or ($letra=='5')or ($letra=='6')or ($letra=='7')or ($letra=='8')or ($letra=='9')or ($letra=='0'))
{
	$letra="";
	$numero = $id;
}

switch ($letra) {
    case 'A':
        $letra =1;
        break;
	case 'B':
        $letra =2;
        break;
	case 'C':
        $letra =3;
        break;
	case 'D':
        $letra =4;
        break;
	case 'E':
        $letra =5;
        break;
	case 'F':
        $letra =6;
        break;
	case 'G':
        $letra =7;
        break;
	case 'H':
        $letra =8;
        break;
	case 'I':
        $letra =9;
        break;
	case 'J':
        $letra =10;
        break;
}
$numero = substr($numero, 1);
$arreglo[0] = $numero;
$arreglo[1] = $letra;

return $arreglo;
}
?>