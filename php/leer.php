<?php
//Código PHP que fija la estructura JSON

$ruta ="../data-1.json";
$file = fopen($ruta,"r");
$leer=fread($file, filesize("../data-1.json"));
$data=json_decode($leer,true);
?>