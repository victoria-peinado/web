<?php
include "../variables.inc";
$mysqli = new mysqli($host, $user, $pass, $base);

//$mysqli->query("drop table if exists elementos");
$usuario = $mysqli->query("create table if not exists usuarios
	(
		id INT AUTO_INCREMENT PRIMARY KEY,
		nombre VARCHAR(255) NOT NULL,
		mail VARCHAR(255) NOT NULL,
		password VARCHAR(255) NOT NULL,
		descripcion TEXT,
		key(nombre)
	)");
if ($usuario == 1) 
	echo 'La tabla de <font color="red" size="+2">usuarios</font> se cre&oacute; con &eacute;xito <br>';
else
	echo 'problemas con la tabla de usuarios'.'<br>';
/*



if ($mysqli->connect_error) {
    die('Connection error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}



if( !$mysqli->query("CREATE DATABASE IF NOT EXISTS " . $base . " CHARACTER SET " . $charsetName . " COLLATE " . $collationName )) {
    die($mysqli->error);

}
$mysqli->close();

$mysqli = new mysqli ($HOST,$USER,$PASS,$base);

if ($mysqli->connect_error) {
    die('Connection error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

if ( !$mysqli->query("CREATE TABLE IF NOT EXISTS
                usid (id INT AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(255) NOT NULL,
				mail VARCHAR(255) NOT NULL,
				password VARCHAR(255) NOT NULL,
				descripcion TEXT)") )
				{
                 die($mysqli->error);
				 echo 'problemas con la tabla de clientes'.'<br>';}

*/
?>