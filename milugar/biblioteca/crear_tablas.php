<?php
include "../variables.inc";
$mysqli = new mysqli($host, $user, $pass, $base);

//$mysqli->query("drop table if exists clientes");
$cliente = $mysqli->query("create table if not exists clientes 
	(
		id INT AUTO_INCREMENT PRIMARY KEY,
		nombre VARCHAR(255) NOT NULL,
		estado VARCHAR(20) NOT NULL,
		tipo VARCHAR(20) NOT NULL,
		key(nombre)
	)");
if ($cliente == 1) 
	echo 'La tabla de <font color="red" size="+2">clientes</font> se cre&oacute; con &eacute;xito <br>';
else
	echo 'problemas con la tabla de clientes'.'<br>';

?>

