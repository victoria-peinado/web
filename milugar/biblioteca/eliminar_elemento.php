<?php
include "../variables.inc";
$mysqli = new mysqli($host, $user, $pass, $base);
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

    $result = mysql_query($query);
	$obj->nombre=ucfirst($obj->nombre);
	$mysqli->query("delete from elementos where id = '$obj'");
	




?>
