<?php
include "../variables.inc";
$mysqli = new mysqli($host, $user, $pass, $base);
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
if ($obj->nombre != "")
{
	$obj->nombre=ucfirst($obj->nombre);
	$mysqli->query("insert into listas (nombre,usuario_id) values ('".$obj->nombre."','".$obj->uid."')");
echo  $mysqli->insert_id;

}

?>
