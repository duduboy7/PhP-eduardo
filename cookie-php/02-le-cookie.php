<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Carrega o cookie</title>
</head>
<body>
	<h1>Carrega o cookie</h1>
	<?php 
		// Recupera o cookie
		$leCookie = isset($_COOKIE['egua']) ? $_COOKIE['egua'] : null;
		// Imprime o cookie
		echo $leCookie . '<br>';
	?>

	<a href="03-apaga-cookie.php">Apaga cookie</a>
</body>
</html>