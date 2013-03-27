<?php
/*
Funcion simple que devuelve la id de una respuesta tomando la respuesta.

*/

function DevuelveIdRespuesta($respuesta){

switch ($respuesta) {

case "De acuerdo" : $idrespuesta= 210; break;
case "Muy de acuerdo" : $idrespuesta= 211; break;
case "Ni de acuerdo ni en desacuerdo" : $idrespuesta= 212; break;
case "Muy en desacuerdo" : $idrespuesta= 213; break;
case "En desacuerdo" : $idrespuesta= 214; break;
case "NS/NR" : $idrespuesta= 215; break;
case "PC" : $idrespuesta= 216; break;
case "Notebook" : $idrespuesta= 217; break;
case "No utilizo computador" : $idrespuesta= 218; break;
case "." : $idrespuesta= 219; break;
case "Sí" : $idrespuesta= 220; break;
case "No" : $idrespuesta= 221; break;
case "Ninguna de las anteriores" : $idrespuesta= 222; break;
case "Cable de red" : $idrespuesta= 223; break;
case "Wi Fi" : $idrespuesta= 224; break;
case "Teléfono" : $idrespuesta= 225; break;
case "Softphone" : $idrespuesta= 226; break;
case "Ninguna de las Anteriores" : $idrespuesta= 227; break;
case "Si" : $idrespuesta= 228; break;
case "Entre 0 y 9" : $idrespuesta= 229; break;
case "Entre 20 y 39" : $idrespuesta= 230; break;
case "Entre 10 y 19" : $idrespuesta= 231; break;
case "40 o más" : $idrespuesta= 232; break;
case "Una vez" : $idrespuesta= 233; break;
case "Ninguna vez" : $idrespuesta= 234; break;
case "Entre 2 y 4 veces" : $idrespuesta= 235; break;
case "No utilizo PC o Notebook" : $idrespuesta= 236; break;
case "10 veces o más" : $idrespuesta= 237; break;
case "Entre 5 y 9 veces" : $idrespuesta= 238; break;
case "Femenino" : $idrespuesta= 239; break;
case "Masculino" : $idrespuesta= 240; break;
case "Gerencia Enología" : $idrespuesta= 241; break;
case "Cono Sur" : $idrespuesta= 242; break;
case "Gerencia de Operaciones" : $idrespuesta= 243; break;
case "Gerencia Agrícola" : $idrespuesta= 244; break;
case "Administración y Finanzas" : $idrespuesta= 245; break;
case "Área Comercial" : $idrespuesta= 246; break;
case "Marketing Marcas Globales" : $idrespuesta= 247; break;
case "Zona Asia" : $idrespuesta= 248; break;
case "Filiales Extranjeras" : $idrespuesta= 249; break;
case "Gerencia de Marketing" : $idrespuesta= 250; break;
case "Auditoría General Corporativa Control Interno" : $idrespuesta= 251; break;
case "Ingeniería y Proyectos" : $idrespuesta= 252; break;
case "Ventas Diageo" : $idrespuesta= 253; break;
case "Exportaciones Zona Sur" : $idrespuesta= 254; break;
case "Canepa/Maycas" : $idrespuesta= 255; break;
case "Trivento" : $idrespuesta= 256; break;
case "Negociaciones y nuevos negocios internos" : $idrespuesta= 257; break;
case "Viña Maipo Palo Alto" : $idrespuesta= 258; break;
case "Gerencia General y Presidencia" : $idrespuesta= 259; break;
case "Exportaciones" : $idrespuesta= 260; break;
case "Compra UVa y Vinos" : $idrespuesta= 261; break;
case "Marketing Vinos de Origen" : $idrespuesta= 262; break;
case "Técnico profesional completo" : $idrespuesta= 263; break;
case "Estudios Universitarios Completos" : $idrespuesta= 264; break;
case "Enseñanza Media completa" : $idrespuesta= 265; break;
case "Estudios Universitarios Incompletos" : $idrespuesta= 266; break;
case "Postgrado" : $idrespuesta= 267; break;
case "Técnico profesional incompleto" : $idrespuesta= 268; break;
case "Entre 4 y 6" : $idrespuesta= 269; break;
case "Entre 1 y 3" : $idrespuesta= 270; break;
case "Más de 20" : $idrespuesta= 271; break;
case "7 horas o más" : $idrespuesta= 272; break;
case "Entre 4 y 6 horas" : $idrespuesta= 273; break;
case "Entre 1 y 3 horas" : $idrespuesta= 274; break;
case "Menos de 1 hora" : $idrespuesta= 275; break;
case "Intermedio" : $idrespuesta= 276; break;
case "Avanzado" : $idrespuesta= 277; break;
case "Básico" : $idrespuesta= 278; break;
case "Experto" : $idrespuesta= 279; break;
case "Básico-Intermedio" : $idrespuesta= 280; break;
case "Avanzado-Experto" : $idrespuesta= 281; break;

}

return $idrespuesta;
}
?>