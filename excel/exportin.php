<?php
header("Content-type: application/vnd.ms-excel;");
header("Content-Disposition: filename=Tabla");
header("Pragma: no-cache");
header("Expires: 0");
echo utf8_decode($_POST['datos_a_enviar']);
?>