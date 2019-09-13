
 
	<?php
	include "../variables.inc";
	$mysqli = new mysqli($host, $user, $pass, $base);
	header("Content-Type: application/json; charset=UTF-8");
	$obj = json_decode($_POST["x"], false);

		
		$reultado=$mysqli->query("SELECT * FROM elementos WHERE id = " . $obj);
		$outp= array();
		$outp[0] = $reultado->fetch_array(MYSQLI_ASSOC);
		
		echo json_encode($outp);
		
	?>

