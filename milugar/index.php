
<html>
<head>

<title>Mi Lugar</title>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="menu.css">
	<link rel="stylesheet" href="principal-estilo.css">
</head>
<body> 

<ul class="flexlist">
	<li class="Logo"> <img src="librerialogo.png" height="35" style="margin: -10px"></li>
	<li class="active">Mi Lugar</li>
	<li class="lbutton"><a href="biblioteca/biblioteca.php">Biblioteca</a></li>
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
			<li class="userbutton"><a href="perfil/perfil.php"><img src="https://img.icons8.com/ios-glyphs/50/000000/user.png"></a>
			<?php
				echo $_SESSION['logged_nombre'];
			?>
				</li>
		<?php
		}
	?>

</ul>
</div>
 <?php
   if (!isset($_SESSION['logged_nombre'])){
?>
<section>
  
  <article>
    <h1>Sobre nosotros</h1>

    <p>Somos un grupo pequeño que cre&oacute esta p&aacutegina para personas como nosotros: gente que sigue varias series, mangas, u otras cosas que se actualizan en per&iacuteodos regulares.</p>
	<p>Es dif&iacutecil recordar las fechas en las que cada historia que est&aacutes leyendo se actualizan. Con nuestro servicio, no es necesario. Rel&aacutejate sabiendo que no te perder&aacutes un solo episodio de esa serie con la que te obsesionaste tanto las &uacuteltimas semanas.  Con nosotros, siempre vas a estar al d&iacutea. </p>

  </article>

   <inicioc>
	  <form action="principal_g.php" method="post">
		  <div>
			  <h4>Iniciar seci&oacuten</h4>
			  <p>E-mail:</p>
			  <input type="email" name="mail" required>
			  <br><br>
			  <p>Contrseña:</p>
			  <input type="password" name="password" required>
			  <br>
			  <input type="submit" value="Ingresar" >
			  <a href="registro/formulario.html">¿No tienes cuenta?</a>
			  
		  </div>
		</form> 
	</inicioc>
</section>
	 <?php
	}
	?>
	 <?php
   if (isset($_SESSION['logged_nombre'])){
?>

<section>
  <article>
    <h1>En emisi&oacuten</h1>
    <p>Pendiente.</p>

  </article>
</section>
	 <?php
	}
	?>
</body>
</html>


