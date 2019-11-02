<?php
include "../variables.inc";
$mysqli = new mysqli($host, $user, $pass, $base);
header("Content-Type: application/json; charset=UTF-8");

$consulta =  "select * from listas";




$resu = $mysqli->query($consulta);

$outp= array();


for ($i=0; $i<$resu->num_rows; $i++) 
	$outp[$i] = $resu->fetch_array(MYSQLI_ASSOC);




echo json_encode($outp);


?>
