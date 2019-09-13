<?php
include "../variables.inc";
$mysqli = new mysqli($host, $user, $pass, $base);
header("Content-Type: application/json; charset=UTF-8");

$consulta =  "select * from elementos";

if (array_key_exists("nombre", $_POST)&& array_key_exists("tipo", $_POST) ) 
{
	$consulta =  $consulta ." where nombre like '%" . $_POST["nombre"] . "%' ";

	if ($_POST["tipo"] != 'todo' ) 
	{
		$consulta =  $consulta ." and tipo = '" . $_POST["tipo"] . "' ";		
	}
		
}
if ( array_key_exists("estado", $_POST) ) 
{
	//$consulta =  $consulta . 	" order by  nombre, tipo " ;

	if ($_POST["estado"] != 'todo' ) 
	{
		$consulta =  $consulta ." and estado = '" . $_POST["estado"] . "' ";		
	}	
	
}

if ( array_key_exists("orden", $_POST) ) 
{
	//$consulta =  $consulta . 	" order by  nombre, tipo " ;

	if ($_POST["orden"] == 'a-z' ) 
	{
		$consulta =  $consulta ." order by nombre, tipo  ";		
	}	
	else 
	{
		$consulta =  $consulta ." order by nombre DESC, tipo  ";
	}
}


else
{ 	
	$consulta = " select * from elementos order by nombre, tipo " ; 	
}



$resu = $mysqli->query($consulta);

$outp= array();


for ($i=0; $i<$resu->num_rows; $i++) 
	$outp[$i] = $resu->fetch_array(MYSQLI_ASSOC);




echo json_encode($outp);


?>
