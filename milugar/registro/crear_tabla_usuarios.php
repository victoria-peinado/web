<?php

include "../variables.inc";
$mysqli = new mysqli($host, $user, $pass, $base);


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


?>