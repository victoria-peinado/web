<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta charset="utf-8">

	<link rel="stylesheet" href="../menu.css"> <!--eliminar el meno y usar el css global-->

	<link rel="stylesheet" href="perfil.css">
	  
	  <script type="text/javascript" src="ejemplos.js"></script>
	  
	  <style>
		table {
			  border-collapse: collapse;
			  width: 100%;
		}

		th, td {
			  text-align: left;
			  padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
	</style>
</head>

<body style=" background-color: #f1f1f1;">
	<!-- Page content -->
	<div class="top">
		<ul class="flexlist">
			<li class="lbutton"><a href="../principal.php">Mi Lugar</a></li>
			<li class="lbutton"><a href="../biblioteca/biblioteca.html">Biblioteca</a></li>
			<li class="lbutton"><a href="#">Mis cosas</a></li>
			<li class="active">Mi Perfil</li>
		</ul>
	</div>
	<!-- Side navigation -->
	<div class="sidenav">
		<img src="http://plantsrescue.com/wp-content/uploads/2013/11/Rosa-Mister-Lincoln-2.jpg" alt="Avatar"> </img>
		<p><h4> <?php
			session_start();
				if (isset($_SESSION['logged_nombre'])){
					echo $_SESSION['logged_nombre'];}
		?></h4></p>
		<a style="position:absolute;  bottom: 100;  left: 0; font-size:18px" href="#">Logout</a> <!--tuve que poner el style acá adentro porque si no no me dejaba cambiar el tamaño del link y no c por qué-->
		
	</div>
	<div class="main">
	    <h2 style="background-color:#626893; color:#efefef;text-align:center;">
		 ABOUT
	    </h2>
		 <p><?php
				if (isset($_SESSION['logged_descripcion'])){
					echo $_SESSION['logged_descripcion'];}
		?></p>
	</div>

</body>
