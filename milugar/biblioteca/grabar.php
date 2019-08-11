<?php
include "../variables.inc";
$mysqli = new mysqli($host, $user, $pass, $base);
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

$mysqli->query("insert into clientes (nombre,estado,tipo) values ('".$obj->nombre."','".$obj->estado."','".$obj->tipo."')");
echo  $mysqli->insert_id;

?>
