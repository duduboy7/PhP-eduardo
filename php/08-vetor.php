<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Exemplo de vetor</title>
</head>
<body>
	<h1>Exemplo de vetor</h1>
	<?php 
		$cores = array('Amarelo', 'azul', 'branco');
		echo $cores[1] . '<br>';
		for ($i=0; $i < count($cores); $i++) { 
			echo $cores[$i] . '<br>';
		}
	?>

</body>
</html>