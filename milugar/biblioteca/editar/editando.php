<?php
$id = $_REQUEST['id'];
?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta charset="utf-8">

<link rel="stylesheet" href="../../menu.css"> <!--eliminar el meno y usar el css global-->

<script>
  



</script>
<title>Editando</title>

<script>
 /*
var queryString = decodeURIComponent(window.location.search);
queryString = queryString.substring(1);
var queries = queryString.split("&");
for (var i = 0; i < queries.length; i++)
{
  document.write(queries[i] + "<br>");
 
}*/
</script> 
</head>

<body>


	<?php
	include "../../variables.inc";
	
	$db = new mysqli($host, $user, $pass, $base);
	
		$reultado=$db->query("SELECT * FROM elementos  WHERE id ='$id' ");
		if ($reultado){
		$row = $reultado->fetch_assoc();
		$nombre =$row["nombre"];
		$estado =$row["estado"];
		$tipo =$row["tipo"];
		
		}
		else
		{
			echo "Error en la consulta";
		}
		/*
		foreach ( $db->query("SELECT * FROM elementos  WHERE id ='$id' ") as $row ) {
			print_r($row);//echo "{$row['field']}";
		}
		$db->close();
		*/
		
	?>

	<ul class="flexlist">
			<li class="lbutton"><a href="/web/milugar/index.php">Mi Lugar</a></li>
			<li class="lbutton"><a href="/web/milugar/biblioteca/biblioteca.php">Biblioteca</a></li>
			<li class="lbutton"><a href="#">Mis cosas</a></li>
			<?php
			session_start();
		   if (isset($_SESSION['logged_nombre'])){
			?>
				<li class="lbutton"><a href="../perfil/perfil.php">Mi Perfil</a></li>
			<?php
			}

			?>
		
	</ul>
	
		<agregar>
			<form  action="editar_elemento.php" method="post">
					<h4>Editar elemento</h4>
				   <p>Nombre:
					<input type="text" id="nombre_elemento" value="<?php echo $nombre ?>"> 
					Estado:
					<select id="estado">
								<option value="Finalizado">Finalizado</option>
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
					<input type="submit" value="Editar">
					</p>
			</form> 

		</agregar>

</body>
</html>