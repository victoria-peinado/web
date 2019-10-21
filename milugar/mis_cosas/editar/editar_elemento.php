<?php
    include "../../variables.inc";
    $mysqli = new mysqli($host, $user, $pass, $base);

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
	$estado = $_POST["estado"];
	$tipo = $_POST["tipo"];

    $sql = "UPDATE elementos SET  nombre='$nombre', estado='$estado', tipo='$tipo' WHERE id='$id'  ";

    $query_run = $mysqli->query($sql);

    if($query_run)
    {
        $mysqli -> close ();
        header("Location: ../biblioteca.php");
    }
    else
    {
        echo '<script> alert("Data Not Updated"); </script>';
    }
?>