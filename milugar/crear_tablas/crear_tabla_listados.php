<?php
include "../variables.inc";
$mysqli = new mysqli($host, $user, $pass, $base);

//$mysqli->query("drop table if exists listados");
$cliente = $mysqli->query("create table if not exists listados 
	(
		listado_id INT AUTO_INCREMENT PRIMARY KEY,
		elemento_id INT NOT NULL,
		lista_id INT NOT NULL,
		key(lista_id)
	)");
if ($cliente == 1) 
	echo 'La tabla de <font color="red" size="+2">listados</font> se cre&oacute; con &eacute;xito <br>';
else
	echo 'problemas con la tabla de listados'.'<br>';

?>

