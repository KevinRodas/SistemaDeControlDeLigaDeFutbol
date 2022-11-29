<?php
$fecha=date("d").'-'. date("m") .'-'.date("Y");
$fecha_actual = date("Y-m-d");
$fecha_final= date("Y-m-d",strtotime($fecha_actual."+ 5 days")); 
echo "la fecha actual es " . $fecha_actual;
echo "la fecha final es " . $fecha_final;
?>