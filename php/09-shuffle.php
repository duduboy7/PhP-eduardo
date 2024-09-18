<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Função Shuffle</title>
</head>
<body>
	<h1>Função Shuffle</h1>
	<?php 
		$numeros = array(1,2,3,4,5,6,7,8,9,10);
		shuffle($numeros);
		echo '<h2>Número sorteado</h2>';
		echo $numeros[1];
	?>

</body>
</html>