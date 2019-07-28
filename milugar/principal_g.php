 <html>
	 <head>
	  <title>Usuario OK</title>
	 </head>
<?php

include "variables.inc";
$mysqli = new mysqli($host, $user, $pass, $base);


/* Traes el Usuario y el Password del Usuario*/
$mail = $_POST["mail"];
$pass = $_POST["password"];

$sql = "SELECT id, nombre, descripcion FROM `usuarios` WHERE mail='$mail' AND password='$pass'  limit 1";

$resu = $mysqli->query( $sql);
if ( $resu  )
{
	/* Validas Si es Correcto Accesa Si no es correcto pues no Accesa */
	// if ( $resu->num_rows === 1 )
	// {
		//echo "usuario valido";
		session_start();
 
	 $usuario = $resu->fetch_assoc();
	 
		// initialize session variables
		$_SESSION['logged_id'] = $usuario['id'];
		$_SESSION['logged_nombre'] = $usuario['nombre'];
		$_SESSION['logged_descripcion'] = $usuario['descripcion'];
		$_SESSION['logged_mail'] = $mail;
	 
	 ?>
	
	 <body>
		<?php echo '<p>Hola: ' ;
		echo $_SESSION['logged_nombre'] ;
		echo '</p>'; 
		?>
	 </body>
	</html>

	<?php
} else {
	echo "Error Usuario No valido";
	echo $resu;
	echo $mail;
	echo $pass;
	echo $sql;	

}

?>