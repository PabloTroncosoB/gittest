<?php 
function getPregunta($area,$tipo){
global $inexistentes;

if($tipo=="analitico SN"){
switch ($area){

case 'sap': $num =464; break;
case 'office': $num =463; break;
case 'siagri': $num =462; break;
case 'internet': $num =461; break;
case 'impresora': $num =460; break;
case 'mantencion.equipos': $num =459; break;
case 'mesa.ayuda': $num =458; break;
case 'software': $num =457; break;
case 'email': $num =456; break;
case 'plandedatos': $num =455; break;
case 'telefonia.movil': $num =454; break;
case 'telefona.fija': $num =453; break;
case 'pc/notebook': $num =452; break;


default: $num="N/E"; $inexistentes.="<br>promotores ".$area; break;
}}

if($tipo=="analitico promotores"){
switch ($area){

case 'sap': $num =449; break;
case 'office': $num =446; break;
case 'siagri': $num =443; break;
case 'internet': $num =440; break;
case 'impresora': $num =437; break;
case 'mantencion.equipos': $num =434; break;
case 'mesa.ayuda': $num =431; break;
case 'software': $num =428; break;
case 'email': $num =425; break;
case 'plandedatos': $num =422; break;
case 'telefonia.movil': $num =419; break;
case 'telefona.fija': $num =416; break;
case 'pc/notebook': $num =413; break;

default: $num="N/E"; $inexistentes.="<br>promotores ".$area; break;
}}

if($tipo=="analitico detractores"){
switch ($area){
case 'mantencion.equipos': $num =435; break;
case 'mesa.ayuda': $num =432; break;
case 'software': $num =429; break;
case 'email': $num =426; break;
case 'plandedatos': $num =423; break;
case 'telefonia.movil': $num =420; break;
case 'telefona.fija': $num =417; break;
case 'pc/notebook': $num =414; break;
case 'sap': $num =450; break;
case 'office': $num =447; break;
case 'siagri': $num =444; break;
case 'internet': $num =441; break;
case 'impresora': $num =438; break;
default: $num="N/E"; $inexistentes.="<br>detractores ".$area;break;
}}

if($tipo=="analitico indice"){
switch ($area){

case 'impresora': $num =439; break;
case 'internet': $num =442; break;
case 'siagri': $num =445; break;
case 'mantencion.equipos': $num =436; break;
case 'software': $num =430; break;
case 'plandedatos': $num =424; break;
case 'telefonia.movil': $num =421; break;
case 'pc/notebook': $num =415; break;
case 'telefona.fija': $num =418; break;
case 'email': $num =427; break;
case 'mesa.ayuda': $num =433; break;
case 'office': $num =448; break;
case 'sap': $num =451; break;
default: $num="N/E"; $inexistentes.="<br>INDICE ".$area;break;
}}

if($tipo=="benchmark SN"){
switch ($area){
case "pc/notebook": $num = 387; break;
case "impresora": $num = 395; break;
case "internet": $num = 396; break;
case "telefonia.fija": $num = 388; break;
case "telefonia.movil": $num = 389; break;
case "plandedatos": $num = 390; break;
case "email": $num = 391; break;
case "siagri": $num = 397; break;
case "office": $num = 398; break;
case "sap": $num = 399; break;
case "software": $num = 392; break;
case "mesa.ayuda": $num = 393; break;
case "mantencion.equipos": $num = 394; break;
default: $num="N/E"; $inexistentes.="<br><br>SN ".$area; break;
}
}
if($tipo=="benchmark indice"){
switch ($area){
case "pc/notebook": $num = 400; break;
case "impresora": $num = 408; break;
case "internet": $num = 409; break;
case "telefonia.fija": $num = 401; break;
case "telefonia.movil": $num = 402; break;
case "plandedatos": $num = 403; break;
case "email": $num = 404; break;
case "siagri": $num = 410; break;
case "office": $num = 411; break;
case "sap": $num = 412; break;
case "software": $num = 405; break;
case "mesa.ayuda": $num = 406; break;
case "mantencion.equipos": $num = 407; break;
default: $num="N/E"; $inexistentes.="<br>INDICE ".$area;break;
}}

return $num;
}

function getSubpregunta($servicio){

switch($servicio){
case "Profesionales": $num =474; break;
case "Operaciones": $num =463; break; 
case "Logistica": $num =475; break; 
case "Comercial": $num =460; break;
case "Finanzas": $num =461; break;
case "Administracion": $num =459; break;
case "Marketing": $num =462; break;
case "B/I": $num =543; break;
case "A/E": $num =544; break;
default: $num="N/E";$inexistentes.="<br>Area ".$servicio; break;
}
return $num;
}
echo $inexistentes;
?>