<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta charset="utf-8">

<link rel="stylesheet" href="../menu.css"> <!--eliminar el meno y usar el css global-->
  <link rel="stylesheet" href="cosas.css">
  <script type="text/javascript" src="cosas.js"></script>

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
<body onload="leerlistas();">
<ul class="flexlist">
	<li class="Logo"> <img src="../librerialogo.png" height="35" style="margin: -10px"></li>
	<li class="lbutton"><a href="../index.php">Mi Lugar</a></li>
	<li class="lbutton"><a href="../biblioteca/biblioteca.php">Biblioteca</a></li>
	<li class="active">Mis cosas</li>
	<?php
		if(!isset($_SESSION)) 
		{ 
			session_start();
			if (isset($_SESSION['logged_nombre'])){
				?>
					<li class="userbutton"><a href="../perfil/perfil.php"><img src="https://img.icons8.com/ios-glyphs/50/000000/user.png"></a>
				<?php
					echo $_SESSION['logged_nombre'];
				?>
					</li>
			<?php
			}
		}
	?>
</ul>
<div>
	<agregar>
	<?php
		if (isset($_SESSION['logged_id'])){		 
	?>
		<form name="aregara_lista" class="linea">
			<div id="left">
				<b>Agregar lista</b>
			</div>
			<div id="right">
				Nombre:
					<input type="text" id="nombre_lista">
					<input type="hidden" id="uid" name="custId" value="<?php echo intval($_SESSION['logged_id'])?>">		
					<input type="button" value="Agregar" onclick="grabar();">
			</div>
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
<?php
include "../variables.inc";
$mysqli = new mysqli($host, $user, $pass, $base);
$consulta =  "select nombre from listas";




$resu = $mysqli->query($consulta);



?>
<agregar>
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
				<select> 
					<option value="0">Todas</option>
						<?php
							while($row =($resu->fetch_assoc()))
							{
							?>
							<option value = "<?php echo($row['nombre'])?>" >
								<?php echo($row['nombre']) ?>
							</option>
							<?php
							}               
						?>
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
<?php

}
?>
</body>
</html>