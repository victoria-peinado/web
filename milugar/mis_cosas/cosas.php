<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta charset="utf-8">

<link rel="stylesheet" href="../menu.css"> <!--eliminar el meno y usar el css global-->
  <link rel="stylesheet" href="cosas.css">
  <script type="text/javascript" src="ejemplos2.js"></script>

<title>Cosas</title>

<style>
table {
  border-collapse: collapse;
  width: 100%;
}

 td {
  text-align: left;
  padding: 8px;
}
th{
  text-align: left;
  padding: 8px;
     font-weight: bold;
}

tr:nth-child(even) {background-color: #f2f2f2;}

</style>
</head>
<body onload="leer();">
<ul class="flexlist">
	<li class="lbutton"><a href="../index.php">Mi Lugar</a></li>
	<li class="lbutton"><a href="../biblioteca/biblioteca.php">Biblioteca</a></li>
	<li class="active">Mis cosas</li>
	<?php
	session_start();
   if (isset($_SESSION['logged_nombre'])){
	?>
		<li class="lbutton"><a href="../perfil/perfil.php">Mi Perfil</a></li>
	<?php
	}
	?>
	
</ul>
<div>
	<agregar>
		<form name="aregara_lista">
			<P>
				<b>Agregar lista  -> </b>
				Nombre:
					<input type="text" id="nombre_elemento"> 
					
					<input type="button" value="Agregar" onclick="grabar();">
					</p>
		</form> 
	</agregar>
	<div>
		<h3>Mis listas</h3>
		
		<table id="mostrar_listas"> 
			<tr>
				<th>Nombre</th>
				
			</tr>
		</table> 
	</div>
	 
</div>

<agregar>
 <form name ="filtros">
	  
		
				<input id="search" type="text" onchange="leer();" size="40">
				<select id="sestado"  required>
					<option value="todo" selected>Todo</option>
					<option value="Finalizado">Finalizado</option>
					<option value="Publicandose">Publicandose</option>
					<option value="Abandonado" >Abandonado</option>
				</select>
				
				<select id="orden">
					<option value="a-z" selected>A-Z</option>
					<option value="z-a">Z-A</option>
				</select>
				
					<input type="button" value="Filtrar" onclick="leer();">
	  
</form> 
</agregar>
 
 <table id="mostrar"> 
	 <tr>
		<th>Nombre</th>
		<th>Estado</th>
		<th>Tipo</th>
	  </tr>
</table> 
</body>
</html>
