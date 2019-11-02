
<html>
<head>

<title>Registro</title>

<link rel="stylesheet" href="../menu.css">
  <link rel="stylesheet" href="estilo.css">
  <meta charset="utf-8">

</head>

<body>

<ul class="flexlist">
	<li class="logo">[Logo]</li>
	<li class="lbutton"><a href="../index.php">Mi Lugar</a></li>
	<li class="lbutton"><a href="../biblioteca/biblioteca.php">Biblioteca</a></li>
	<li class="lbutton"><a href="../mis_cosas/cosas.php">Mis cosas</a></li>
	<li class="lbutton"><a href="../perfil/perfil.php">Mi Perfil</a></li>
	
	<?php
	session_start();
   if (isset($_SESSION['logged_nombre'])){
	?>
	<li class="lbutton"><a href="../perfil/perfil.php">>Mi Perfil</a></li>
	<?php
	}
	?>
</ul>
<h3>Se ha registrado con exito.<h3>
<a href="../index.php">Volver</a>

</body>
</html>
