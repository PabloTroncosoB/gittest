<?php
/*
Funcion simple que devuelve el tipo de pregunta en base a las respuestas.
***ayuda
id;descripcion
1;Selección única simple
2;Selección única compuesta
3;Selección múltiple simple
4;Selección múltiple compuesta
5;Entrada numérica simple
6;Entrada numérica compuesta
7;Entrada numérica suma 100
8;Selección jerárquica simple
9;Selección jerárquica compuesta
10;Entrada texto simple
11;Selección única simple lista
12;Entrada numérica simple moneda
14;Fecha
*/

function TipoPregunta($respuesta){

switch ($respuesta) {
case "Sí" :
case "No" : 
case "Si" :
case "Femenino" : 
case "Masculino" : 
	$idrespuesta= 1; 
	break;
case "De acuerdo" : 
case "Muy de acuerdo" : 
case "Ni de acuerdo ni en desacuerdo" :
case "Muy en desacuerdo" :
case "En desacuerdo" :
case "NS/NR" :
case "PC" :
case "Notebook" :
case "No utilizo computador" :
case "Ninguna de las anteriores" :
case "Cable de red" :
case "Wi Fi" :
case "Teléfono" :
case "Softphone" :
case "Ninguna de las Anteriores" :
case "Entre 0 y 9" :
case "Entre 20 y 39" :
case "Entre 10 y 19" :
case "40 o más" :
case "Una vez" :
case "Ninguna vez" :
case "Entre 2 y 4 veces" :
case "No utilizo PC o Notebook" :
case "10 veces o más" :
case "Entre 5 y 9 veces" :
case "Gerencia Enología" :
case "Cono Sur" :
case "Gerencia de Operaciones":
case "Gerencia Agrícola" :
case "Administración y Finanzas" :
case "Área Comercial" :
case "Marketing Marcas Globales" :
case "Zona Asia" :
case "Filiales Extranjeras" :
case "Gerencia de Marketing" :
case "Auditoría General Corporativa Control Interno" :
case "Ingeniería y Proyectos" :
case "Ventas Diageo" :
case "Exportaciones Zona Sur" :
case "Canepa/Maycas" :
case "Trivento" :
case "Negociaciones y nuevos negocios internos" :
case "Viña Maipo Palo Alto" :
case "Gerencia General y Presidencia" :
case "Exportaciones" :
case "Compra UVa y Vinos" :
case "Marketing Vinos de Origen" :
case "Técnico profesional completo" :
case "Estudios Universitarios Completos" :
case "Enseñanza Media completa" :
case "Estudios Universitarios Incompletos" :
case "Postgrado" :
case "Técnico profesional incompleto" :
case "Entre 4 y 6" :
case "Entre 1 y 3" :
case "Más de 20" :
case "7 horas o más" :
case "Entre 4 y 6 horas" :
case "Entre 1 y 3 horas" :
case "Menos de 1 hora" :
case "Intermedio" :
case "Avanzado" :
case "Básico" :
case "Experto" :
case "Básico-Intermedio" :
case "Avanzado-Experto" : 
	$idrespuesta= 2;
	break;
case "." : 
	$idrespuesta ="imposible calcular tipos, usuario omitió respuestas";
	break;
default:
	$idrespuesta = 5;
	break;
}

return $idrespuesta;
}
?>