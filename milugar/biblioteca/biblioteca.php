<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta charset="utf-8">

<link rel="stylesheet" href="../menu.css"> <!--eliminar el meno y usar el css global-->
  <link rel="stylesheet" href="biblioteca.css">
  <script type="text/javascript" src="ejemplos2.js"></script>

<title>Biblioteca</title>

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
	<li class="Logo"> <img src="../librerialogo.png" height="35" style="margin: -10px"></li>
	<li class="lbutton"><a href="../index.php">Mi Lugar</a></li>
	<li class="active">Biblioteca</li>
	<?php
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
			if (isset($_SESSION['logged_nombre'])){
				?>
						<li class="lbutton"><a href="mis_cosas/cosas.php">Mis cosas</a></li>
				<?php
			}
		} 
	?>
	<?php
		if (isset($_SESSION['logged_nombre'])){
			?>
			<li class="userbutton"><a href="../perfil/perfil.php"><img src="https://img.icons8.com/ios-glyphs/50/000000/user.png"> <br></a></li>
			<?php
		}
	?>
	
</ul>
 

 <barrab>
 <form name ="filtros">
	  
		
				<input id="search" type="text" onchange="leer();" size="40">
				<select id="sestado"  required>
					<option value="todo" selected>Todo</option>
					<option value="Finalizado">Finalizado</option>
					<option value="Publicandose">Publicandose</option>
					<option value="Abandonado" >Abandonado</option>
				</select>
				<select id="stipo">
					<option value="todo" selected>Todo</option>
					<option value="anime">Animes</option>
					<option value="manga">Mangas</option>
					<option value="libro">Libros</option>
					<option value="serie">Series</option>
					<option value="pelicula">Peliculas</option>
					<option value="otro">Otros</option>
				</select>
				<select id="orden">
					<option value="a-z" selected>A-Z</option>
					<option value="z-a">Z-A</option>
				</select>
				
					<input type="button" value="Filtrar" onclick="leer();">
	  
</form> 
 </barrab>
  <agregar>
 <form name="aregarabiblioteca">
	    <h4>Agregar elemento</h4>
	   <p>Nombre:
		<input type="text" id="nombre_elemento"> 
		Estado:
		<select id="estado">
					<option value="Finalizado" selected>Finalizado</option>
					<option value="Publicandose">Publicandose</option>
					<option value="Abandonado" >Abandonado</option>
				</select>
		Tipo:
		<select id="tipo">
					<option value="Anime">Anime</option>
					<option value="Manga">Manga</option>
					<option value="Libro">Libro</option>
					<option value="Serie">Serie</option>
					<option value="Pelicula">Pelicula</option>
					<option value="Otro">Otro</option>
		</select>
		<input type="button" value="Agregar" onclick="grabar();">
		</p>
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
