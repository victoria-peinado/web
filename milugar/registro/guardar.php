<?php

include "../variables.inc";

$mysqli = new mysqli($host,$user,$pass);

if ($mysqli->connect_error) {
    die('Connection error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}


$charsetName = "UTF8";
$collationName = "utf8_bin";

if( !$mysqli->query("CREATE DATABASE IF NOT EXISTS " . $base . " CHARACTER SET " . $charsetName . " COLLATE " . $collationName )) {
    die($mysqli->error);

}
$mysqli->close();

$mysqli = new mysqli ($host,$user,$pass,$base);

if ($mysqli->connect_error) {
    die('Connection error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

if ( !$mysqli->query("CREATE TABLE IF NOT EXISTS
                usuarios (id INT AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(255) NOT NULL,
				mail VARCHAR(255) NOT NULL,
				password VARCHAR(255) NOT NULL,
				descripcion TEXT)") )  {
                 die($mysqli->error); }
				 
				 
				 
/*
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);


$consulta = " INSERT INTO usuarios (nombre,mail,password,descripcion) VALUES  ('".$obj->nombre."','".$obj->email."','".$obj->clave."' ,'".$obj->descripcion."' ) "  ;
*/
$nombre = $_POST["nombre"];
$mail = $_POST["mail"];
$password = $_POST["clave1"];
$text = $_POST["text"];
$consulta = " INSERT INTO usuarios (nombre,mail,password,descripcion) VALUES  ( '" . $nombre . "' , '" . $mail . "' , '" . $password . "' , '" . $text . "' ) "  ;
 
 echo $consulta;

 
if ( !$mysqli->query( $consulta ) ) {
	die ( $mysqli -> error );
	//  echo $consulta;
	}

$mysqli -> close ();
header('Location: formulario_correcto.php');
?>