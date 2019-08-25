<?php

$HOST = "localhost";
$USER = "root";
$PASS = "";

$mysqli = new mysqli($HOST,$USER,$PASS);

if ($mysqli->connect_error) {
    die('Connection error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$dbName = "milugar";
$charsetName = "UTF8";
$collationName = "utf8_bin";

if( !$mysqli->query("CREATE DATABASE IF NOT EXISTS " . $dbName . " CHARACTER SET " . $charsetName . " COLLATE " . $collationName )) {
    die($mysqli->error);

}
$mysqli->close();

$mysqli = new mysqli ($HOST,$USER,$PASS,$dbName);

if ($mysqli->connect_error) {
    die('Connection error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

if ( !$mysqli->query("CREATE TABLE IF NOT EXISTS
                elementos (id INT AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(255) NOT NULL,
				estado VARCHAR(20) NOT NULL,
				tipo VARCHAR(20) NOT NULL)") )  {
                 die($mysqli->error); }

$nombre = $_POST["nombre"];
$estado = $_POST["estado"];
$tipo = $_POST["tipo"];

$consulta = " INSERT INTO elementos (nombre,estado,tipo) VALUES  ( '" . $nombre . "' , '" . $estado . "' , '" . $tipo. "' ) "  ;


 
if ( !$mysqli->query( $consulta ) ) {
	die ( $mysqli -> error );
	//  echo $consulta;
	}

$mysqli -> close ();

?>