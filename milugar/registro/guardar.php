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
                usid (id INT AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(255) NOT NULL,
				mail VARCHAR(255) NOT NULL,
				password VARCHAR(255) NOT NULL,
				descripcion TEXT)") )  {
                 die($mysqli->error); }

$nombre = $_POST["nombre"];
$mail = $_POST["mail"];
$password = $_POST["password"];
$text = $_POST["text"];

$consulta = " INSERT INTO usid (nombre,mail,password,descripcion) VALUES  ( '" . $nombre . "' , '" . $mail . "' , '" . $password . "' , '" . $text . "' ) "  ;


 
if ( !$mysqli->query( $consulta ) ) {
	die ( $mysqli -> error );
	//  echo $consulta;
	}

$mysqli -> close ();

?>