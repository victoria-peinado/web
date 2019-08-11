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


 //$consulta = "select * from elementos order by nombre, tipo " ;
$resu = $mysqli->query($consulta);

$outp= array();
//<<<<<<< HEAD
//$valor= array();
//=======
//$resu = $mysqli->query("select * from clientes order by nombre, tipo ");
//>>>>>>> df7b89d57107a73cce79af2d43e75e8a70ac6389

for ($i=0; $i<$resu->num_rows; $i++) 
	$outp[$i] = $resu->fetch_array(MYSQLI_ASSOC);

// echo '---------------';
// echo $outp[1]['id'];
// echo '---------------';


/*
if (array_key_exists("nombre", $_POST) ) {

    $nombre = $_POST["nombre"];
    // do stuff with params

    // echo 'Yes, it works!' ;
	$valor ['id'] = '0';	
	$valor ['nombre'] = 'ok';
	$valor ['estado'] = 'ok';
	$valor ['tipo'] = 'ok';

	
	$outp[$resu->num_rows] = $valor;

} else {
	
    // echo 'Invalid parameters!';
	$valor ['id'] = '0';	
	$valor ['nombre'] = 'vacio';
	$valor ['estado'] = 'vacio';
	$valor ['tipo'] = $_POST;
	
	$outp[$resu->num_rows] = $valor;
}
*/


echo json_encode($outp);


?>
