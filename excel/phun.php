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
case 'telefonia.fija': $num =453; break;
case 'pc/notebook': $num =452; break;


default: $num="N/E"; $inexistentes.="<br>promotores ".$area; break;
}}
/*
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
case 'telefonia.fija': $num =416; break;
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
case 'telefonia.fija': $num =417; break;
case 'pc/notebook': $num =414; break;
case 'sap': $num =450; break;
case 'office': $num =447; break;
case 'siagri': $num =444; break;
case 'internet': $num =441; break;
case 'impresora': $num =438; break;
default: $num="N/E"; $inexistentes.="<br>detractores ".$area;break;
}}
*/
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
case 'telefonia.fija': $num =418; break;
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


if($tipo=="satiuc promotores"){
switch ($area){
case 'pc/notebook' : $num= 163; break;
case 'impresora' : $num= 166; break;
case 'satisfaccion.telefono' : $num= 169; break;
case 'telefonia.fija' : $num= 172; break;
case 'serviciotelefonia.fija' : $num= 172; break;
case 'equipotelefonia.fija' : $num= 172; break;
case 'equipotelefonia.movil' : $num= 322; break;
case 'telefonia.movil' : $num= 322; break;
case 'serviciotelefonia.movil' : $num= 322; break;
case 'internet': $num= 175; break;
case 'internet.wifi' : $num= 178; break;
case 'email' : $num= 181; break;
case 'mesa.ayuda' : $num= 184; break;
case 'mantencion.equipos' : $num= 187; break;
case 'mantencion' : $num= 187; break;
case 'software' : $num= 192; break;
case 'plandedatos' : $num=465 ; break;
case 'videoconferencia' : $num=470 ; break;
case 'elipse' : $num=340 ; break;
case 'siagri' : $num=340 ; break;
case 'office' : $num=340 ; break;
case 'sap' : $num=340 ; break;
case 'soporteterreno' : $num=473 ; break;
default: $num="N/E"; $inexistentes.="<br>promotores ".$area;break;
}}

if($tipo=="satiuc SN"){
switch ($area){
case 'pc/notebook' : $num= 163; break;
case 'impresora' : $num= 166; break;
case 'satisfaccion.telefono' : $num= 169; break;
case 'telefonia.fija' : $num= 172; break;
case 'internet': $num= 175; break;
case 'internet.wifi' : $num= 178; break;
case 'email' : $num= 181; break;
case 'mesa.ayuda' : $num= 184; break;
case 'mantencion.equipos' : $num= 187; break;
case 'mantencion' : $num= 187; break;
case 'software' : $num= 192; break;
case 'plandedatos' : $num=465 ; break;
default: $num="N/E"; $inexistentes.="<br>sn".$area;break;
}}

if($tipo=="satiuc detractores"){
switch ($area){
case 'pc/notebook' : $num= 164; break;
case 'satisfaccion.telefono' : $num= 170; break;
case 'impresora' : $num= 167; break;
case 'telefonia.fija' : $num= 173; break;
case 'serviciotelefonia.fija' : $num= 173; break;
case 'equipotelefonia.fija' : $num= 173; break;
case 'equipotelefonia.movil' : $num= 323; break;
case 'telefonia.movil' : $num= 323; break;
case 'serviciotelefonia.movil' : $num= 323; break;
case 'internet' : $num= 176; break;
case 'internet.wifi' : $num= 179; break;
case 'email' : $num= 182; break;
case 'mesa.ayuda' : $num= 185; break;
case 'mantencion.equipos' : $num= 188; break;
case 'mantencion' : $num= 188; break;
case 'software' : $num= 193; break;
case 'plandedatos' : $num=466 ; break;
case 'videoconferencia' : $num=471 ; break;
case 'elipse' : $num=341 ; break;
case 'siagri' : $num=341 ; break;
case 'office' : $num=341 ; break;
case 'sap' : $num=341 ; break;
case 'soporteterreno' : $num=474 ; break;
default: $num="N/E"; $inexistentes.="<br>detractores ".$area;break;
}}


if($tipo=="satiuc indice"){
switch ($area){
case 'pc/notebook' : $num= 165; break;
case 'impresora' : $num= 168; break;
case 'satisfaccion.telefono' : $num= 171; break;
case 'telefonia.fija' : $num= 174; break;
case 'serviciotelefonia.fija' : $num= 174; break;
case 'equipotelefonia.fija' : $num= 174; break;
case 'equipotelefonia.movil' : $num= 324; break;
case 'telefonia.movil' : $num= 324; break;
case 'serviciotelefonia.movil' : $num= 324; break;
case 'internet': $num= 177; break;
case 'internet.wifi' : $num= 180; break;
case 'email' : $num= 183; break;
case 'mesa.ayuda' : $num= 186; break;
case 'mantencion.equipos' : $num= 189; break;
case 'mantencion' : $num= 189; break;
case 'software' : $num= 194; break;
case 'plandedatos' : $num= 467; break;
case 'videoconferencia' : $num=472 ; break;
case 'elipse' : $num=342 ; break;
case 'siagri' : $num=342 ; break;
case 'office' : $num=342 ; break;
case 'sap' : $num=342 ; break;
case 'soporteterreno' : $num=475 ; break;
default: $num="N/E"; $inexistentes.="<br>indice ".$area;break;
}}

if($tipo=="N"){

switch ($area){
case 'pc/notebook' : $num= 528; break;
case 'impresora' : $num= 529; break;
case 'telefonia.fija' : $num= 618; break;
case 'internet': $num= 531; break;
case 'internet.wifi' : $num= 532; break;
case 'email' : $num= 533; break;
case 'mesa.ayuda' : $num= 534; break;
case 'mantencion.equipos' : $num= 535; break;
case 'mantencion' : $num= 535; break;
case 'software' : $num= 536; break;
case 'plandedatos' : $num= 554; break;
case 'Basico' : $num= 465; break;
case 'Básico' : $num= 465; break;
case 'Intermedio' : $num= 466; break;
case 'Avanzado' : $num= 467; break;
case 'Experto' : $num= 468; break;
case 'Total de usuarios por expertise' : $num= 621; break;
case 'elipse' : $num= 620; break;
case 'videoconferencia' : $num= 631; break;
case 'soporteterreno' : $num= 635; break;




case 'servicio.email' : $num= 533; break;
case 'satisfaccion.telefono' : $num= 530; break;
case 'telefonia.movil' : $num= 553; break;
case 'serviciotelefonia.movil' : $num= 537; break;

default: $num="N/E"; $inexistentes.="<br>N ".$area;break;}
}

return $num;
}

function getSubpregunta($servicio){
global $inexistentes;
switch($servicio){
case "Profesionales": $num =474; break;
case "Operaciones": $num =463; break; 
case "Logistica": $num =475; break; 
case "Comercial": $num =460; break;
case "Finanzas": $num =461; break;
case "Administracion": $num =459; break;
case "Administración": $num =459; break;
case "Marketing": $num =462; break;
case "MINA": $num =622; break;
case "PERSONAS": $num =623; break;
case "CASS": $num =624; break;
case "ADMINISTRACION Y FINANZAS": $num = 268; break;
case "PLANTA": $num =625; break;
case "PROYECTO OPERACIONAL": $num =626; break;
case "GESTION ESTRATEGICA": $num =627; break;
case "OPERACIONES": $num =463; break;
case "GERENCIA GENERAL": $num =628; break;
case "ADC": $num =629; break;
case "ASUNTOS EXTERNOS": $num =630; break;
case "B/I": $num =543; break;
case "A/E": $num =544; break;
case 'Back Office': $num =508; break;
case 'Atención a público': $num =509; break;
case 'Directivos y jefaturas': $num =510; break;
case "impresora" : $num =154; break;
case "servicio.email" : $num =251; break;
case "software" : $num =252; break;
case "mesa.ayuda" : $num =253; break;
case "servicio.redes" : $num =255; break;
case "PC" : $num =256; break;
case "telefonia.fija" : $num =257; break;
case "Servicio de telefonía" : $num =258; break;
case "mantencion" : $num =551; break;
case "Telefonía Movil" : $num =335; break;
case "plandedatos" : $num =336; break;
case "internet.wifi" : $num =337; break;
case "internet.cable" : $num =338; break;
case "sap" : $num =367; break;
case "office" : $num =421; break;
case "pc/notebook" : $num =422; break;
case "internet" : $num =423; break;
case "siagri" : $num =424; break;
case "email" : $num =281; break;
case "equipotelefonia.fija" : $num =426; break;
case "telefonia.fija" : $num =426; break;
case "equipotelefonia.movil" : $num =427; break;
case "telefonia.movil" : $num =427; break;
case "serviciotelefonia.fija" : $num =428; break;
case "serviciotelefonia.movil" : $num =429; break;
case "mantencion.equipos": $num =551; break;
case "A.pc/notebook" : $num =555; break;
case "B.pc/notebook" : $num =556; break;
case "C.pc/notebook" : $num =557; break;
case "D.pc/notebook" : $num =558; break;
case "E.pc/notebook" : $num =559; break;
case "A.impresora" : $num =565; break;
case "B.impresora" : $num =556; break;
case "C.impresora" : $num =560; break;
case "D.impresora" : $num =558; break;
case "E.impresora" : $num =559; break;
case "A.internet" : $num =561; break;
case "B.internet" : $num =562; break;
case "C.internet" : $num =563; break;
case "D.internet" : $num =564; break;
case "A.equipotelefonia.fija" : $num =565; break;
case "B.equipotelefonia.fija" : $num =566; break;
case "C.equipotelefonia.fija" : $num =567; break;
case "D.equipotelefonia.fija" : $num =558; break;
case "E.equipotelefonia.fija" : $num =559; break;
case "F.equipotelefonia.fija" : $num =568; break;
case "G.equipotelefonia.fija" : $num =558; break;
case "H.equipotelefonia.fija" : $num =569; break;
case "I.equipotelefonia.fija" : $num =570; break;
case "A.equipotelefonia.movil" : $num =571; break;
case "B.equipotelefonia.movil" : $num =572; break;
case "C.equipotelefonia.movil" : $num =567; break;
case "D.equipotelefonia.movil" : $num =558; break;
case "E.equipotelefonia.movil" : $num =559; break;
case "F.equipotelefonia.movil" : $num =573; break;
case "G.equipotelefonia.movil" : $num =574; break;
case "H.equipotelefonia.movil" : $num =569; break;
case "I.equipotelefonia.movil" : $num =575; break;
case "A.telefonia.fija" : $num =565; break;
case "B.telefonia.fija" : $num =566; break;
case "C.telefonia.fija" : $num =567; break;
case "D.telefonia.fija" : $num =558; break;
case "E.telefonia.fija" : $num =559; break;
case "F.telefonia.fija" : $num =568; break;
case "G.telefonia.fija" : $num =558; break;
case "H.telefonia.fija" : $num =569; break;
case "I.telefonia.fija" : $num =570; break;
case "A.telefonia.movil" : $num =571; break;
case "B.telefonia.movil" : $num =572; break;
case "C.telefonia.movil" : $num =567; break;
case "D.telefonia.movil" : $num =558; break;
case "E.telefonia.movil" : $num =559; break;
case "F.telefonia.movil" : $num =573; break;
case "G.telefonia.movil" : $num =574; break;
case "H.telefonia.movil" : $num =569; break;
case "I.telefonia.movil" : $num =575; break;
case "A.equipo.telefonia" : $num =555; break;
case "B.equipo.telefonia" : $num =556; break;
case "C.equipo.telefonia" : $num =567; break;
case "D.equipo.telefonia" : $num =574; break;
case "E.equipo.telefonia" : $num =559; break;
case "F.equipo.telefonia" : $num =576; break;
case "G.equipo.telefonia" : $num =574; break;
case "H.equipo.telefonia" : $num =577; break;
case "I.equipo.telefonia" : $num =575; break;
case "A.plandedatos" : $num =573; break;
case "B.plandedatos" : $num =574; break;
case "C.plandedatos" : $num =569; break;
case "D.plandedatos" : $num =575; break;
case "A.email" : $num =578; break;
case "B.email" : $num =573; break;
case "C.email" : $num =574; break;
case "D.email" : $num =579; break;
case "E.email" : $num =580; break;
case "F.email" : $num =581; break;
case "A.siagri" : $num =582; break;
case "B.siagri" : $num =556; break;
case "C.siagri" : $num =583; break;
case "D.siagri" : $num =584; break;
case "E.siagri" : $num =585; break;
case "F.siagri" : $num =586; break;
case "G.siagri" : $num =587; break;
case "A.office" : $num =582; break;
case "B.office" : $num =556; break;
case "C.office" : $num =583; break;
case "D.office" : $num =584; break;
case "E.office" : $num =585; break;
case "F.office" : $num =586; break;
case "G.office" : $num =587; break;
case "A.sap" : $num =582; break;
case "B.sap" : $num =556; break;
case "C.sap" : $num =583; break;
case "D.sap" : $num =584; break;
case "E.sap" : $num =585; break;
case "F.sap" : $num =586; break;
case "G.sap" : $num =587; break;
case "A.elipse" : $num =582; break;
case "B.elipse" : $num =556; break;
case "C.elipse" : $num =583; break;
case "D.elipse" : $num =584; break;
case "E.elipse" : $num =585; break;
case "F.elipse" : $num =586; break;
case "G.elipse" : $num =587; break;
case "A.software" : $num =582; break;
case "B.software" : $num =556; break;
case "C.software" : $num =583; break;
case "D.software" : $num =584; break;
case "E.software" : $num =585; break;
case "F.software" : $num =586; break;
case "G.software" : $num =587; break;
case "A.mesa.ayuda" : $num =588; break;
case "B.mesa.ayuda" : $num =589; break;
case "C.mesa.ayuda" : $num =590; break;
case "D.mesa.ayuda" : $num =591; break;
case "E.mesa.ayuda" : $num =592; break;
case "F.mesa.ayuda" : $num =593; break;
case "G.mesa.ayuda" : $num =594; break;
case "H.mesa.ayuda" : $num =595; break;
case "I.mesa.ayuda" : $num =596; break;
case "J.mesa.ayuda" : $num =597; break;
case "A.soporteterreno" : $num =588; break;
case "B.soporteterreno" : $num =589; break;
case "C.soporteterreno" : $num =590; break;
case "D.soporteterreno" : $num =591; break;
case "E.soporteterreno" : $num =592; break;
case "F.soporteterreno" : $num =593; break;
case "G.soporteterreno" : $num =594; break;
case "H.soporteterreno" : $num =595; break;
case "I.soporteterreno" : $num =596; break;
case "J.soporteterreno" : $num =597; break;
case "A.mantencion.equipos" : $num =598; break;
case "B.mantencion.equipos" : $num =599; break;
case "C.mantencion.equipos" : $num =600; break;
case "D.mantencion.equipos" : $num =601; break;
case "A.mantencion.telefonia" : $num =598; break;
case "B.mantencion.telefonia" : $num =602; break;
case "C.mantencion.telefonia" : $num =600; break;
case "D.mantencion.telefonia" : $num =601; break;
case "A.mantencion.software" : $num =598; break;
case "B.mantencion.software" : $num =603; break;
case "C.mantencion.software" : $num =604; break;
case "D.mantencion.software" : $num =605; break;
case "A.mantencion.internet" : $num =606; break;
case "B.mantencion.internet" : $num =602; break;
case "C.mantencion.internet" : $num =600; break;
case "D.Mantencion.internet" : $num =601; break;
case "A.mantencion" : $num =598; break;
case "B.mantencion" : $num =599; break;
case "C.mantencion" : $num =601; break;
case "A.capacitacion" : $num =607; break;
case "B.capacitacion" : $num =608; break;
case "A.desarrollo" : $num =609; break;
case "B.desarrollo" : $num =610; break;
case "C.desarrollo" : $num =611; break;
case "B.videoconferencia" : $num =556; break;
case "D.videoconferencia" : $num =558; break;
case "E.videoconferencia" : $num =559; break;
case "F.videoconferencia" : $num =569; break;
case "G.videoconferencia" : $num =570; break;
case 'Femenino': $num = 450;break;
case 'Masculino': $num = 450;break;
case 'Joven': $num = 451;break;
case 'AdultoJ': $num = 452;break;
case 'Adulto': $num = 453;break;
case 'AdultoM': $num = 454;break;
case 'emom': $num = 455;break;
case 'tpcoi': $num = 456;break;
case 'ucoi': $num = 457;break;
case 'Postgrado': $num = 458;break;
case 'Basico': $num = 465;break;
case 'Básico': $num = 465;break;
case 'Intermedio': $num = 466;break;
case 'Avanzado': $num = 467;break;
case 'Experto': $num = 468;break;
case 'Producción azúcar': $num = 471;break;
case 'Supply chain': $num = 469;break;
case 'Comercial azúcar retail': $num = 470;break;
case 'Administración finanzas': $num = 268;break;
case 'Recursos humanos': $num = 473;break;
case 'UAC': $num = 472;break;
case "Canepa/Maycas" : $num = 259;break;
case "Auditoría general" : $num = 260;break;
case "Trivento" : $num = 261;break;
case "Ingeniería y proyectos" : $num = 262;break;
case "Enología" : $num = 263;break;
case "Operaciones" : $num = 264;break;
case "Área Comercial" : $num = 265;break;
case "Otros" : $num = 266;break;
case "Marketing Marcas Globales" : $num = 267;break;
case "Administración y Finanzas" : $num = 268;break;
case "Cono Sur" : $num = 269;break;
case "Agrícola" : $num = 270;break;
case "Exportaciones Zona Sur" : $num = 271;break;
case "Viña Maipo Palo Alto" : $num = 272;break;
case "videoconferencia" : $num = 632;break;
case "elipse" : $num = 633;break;
case "soporteterreno" : $num = 634;break;
case 'Zona Asia': $num = 638;break;
case 'Filiales Extranjeras': $num = 639;break;
case 'Auditoría General Corporativa Control Interno': $num = 640;break;
case 'Ingeniería y Proyectos': $num = 641;break;
case 'Ventas Diageo': $num = 642;break;
case 'Negociaciones y nuevos negocios internos': $num = 643;break;
case 'General y Presidencia': $num = 644;break;
case 'Exportaciones': $num = 645;break;
case 'Compra Uva y Vinos': $num = 646;break;
case 'Marketing Vinos de Origen': $num = 647;break;
case 'Logística' : $num= 475;break;
case 'Gerencia general' : $num= 628;break;
case 'Terrandes' : $num= 648;break;
case 'Comercial industrial' : $num= 649;break;
case 'Producción nutrición animal' : $num= 650;break;
case 'Producción mascotas' : $num= 651;break;
case 'Insumos agrícolas' : $num= 652;break;
case 'Comercial bovinos' : $num= 653;break;

default: $num="N/E"; $inexistentes.="<br>Area ".$servicio; break;
}
return $num;
}



function getOpcion($servicio){
global $inexistentes;
switch($servicio){
/*case "equipotelefonia.fija": $num =468; break;
case "serviciotelefonia.fija": $num =467; break; 
case "equipotelefonia.movil": $num =468; break; 
case "serviciotelefonia.movil": $num =467; break;*/
case "sap": $num =141; break;
case "office": $num =393; break;
case "siagri": $num =392; break;
case "elipse": $num =469; break;

default: $num="0"; 
//$inexistentes.="<br>Opcion ".$servicio;
break;
}
return $num;
}
?>
