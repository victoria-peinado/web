<?php
include "../variables.inc";
$mysqli = new mysqli($host, $user, $pass, $base);

//$mysqli->query("drop table if exists listas");
$cliente = $mysqli->query("create table if not exists listas 
	(
		lista_id INT AUTO_INCREMENT PRIMARY KEY,
		nombre VARCHAR(255) NOT NULL,
		usuario_id INT NOT NULL,
		key(usuario_id)
	)");
if ($cliente == 1) 
	echo 'La tabla de <font color="red" size="+2">listas</font> se cre&oacute; con &eacute;xito <br>';
else
	echo 'problemas con la tabla de listas'.'<br>';

?>

