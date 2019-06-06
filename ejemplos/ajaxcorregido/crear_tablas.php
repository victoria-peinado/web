<?php
include "variables.inc";
$mysqli = new mysqli($host, $user, $pass, $base);

//$mysqli->query("drop table if exists clientes");
$cliente = $mysqli->query("create table if not exists clientes (
	apellido	varchar(60),	
	nombre		varchar(60),
	orden		int not null primary key auto_increment,
	key(apellido)
)");
if ($cliente == 1) 
	echo 'La tabla de <font color="red" size="+2">clientes</font> se cre&oacute; con &eacute;xito <br>';
else
	echo 'problemas con la tabla de clientes'.'<br>';

?>

