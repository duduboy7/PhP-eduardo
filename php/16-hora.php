<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mostrando a hora</title>
</head>
<body>
	<h1>Mostrando a hora</h1>
	<?php 
		date_default_timezone_set('America/Sao_Paulo');
		$hora = date('H:i:s');
		echo $hora;
	?>

</body>
</html>