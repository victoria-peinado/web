
<html>
<head>

<title>Registro</title>

<link rel="stylesheet" href="../menu.css">
  <link rel="stylesheet" href="estilo.css">
  <meta charset="utf-8">

</head>

<body>

<ul class="flexlist">
	<li class="Logo"> <img src="../librerialogo.png" height="35" style="margin: -10px"></li>
	<li class="lbutton"><a href="../index.php">Mi Lugar</a></li>
	<li class="lbutton"><a href="../biblioteca/biblioteca.php">Biblioteca</a></li>
	<?php
		session_start(); 
		if (isset($_SESSION['logged_nombre'])){
		?>
				<li class="lbutton"><a href="../mis_cosas/cosas.php">Mis cosas</a></li>
		<?php
		}
	?>
	<?php
		if (isset($_SESSION['logged_nombre'])){
			?>
				<li class="userbutton"><a href="../perfil/perfil.php"><img src="https://img.icons8.com/ios-glyphs/50/000000/user.png"> <br></a></li>	<?php
			}
	?>
</ul>

<h3>Se ha registrado con exito.<h3>
<a href="../index.php">Volver</a>

</body>
</html>
