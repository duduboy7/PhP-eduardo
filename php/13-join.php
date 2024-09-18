<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Unindo conteúdos</title>
</head>
<body>
	<h1>Unindo conteúdos</h1>
	<?php 
		$vetor[0] = 'Maria';
		$vetor[1] = 'da';
		$vetor[2] = 'Silva';

		$nome = join(' ', $vetor);
		echo $nome;
	?>

</body>
</html>