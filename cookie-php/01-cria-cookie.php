<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cria o cookie</title>
</head>
<body>
	<h1>Cria o cookie</h1>
	<?php 
		// Criando o cookie
		//setcookie('egua', 'A egua comeu o biscoito', time()+(60*60*24*30));
		setcookie('egua', 'A egua comeu o biscoito', strtotime('+30 days'));
	?>

	<a href="02-le-cookie.php">Lê cookie</a>

</body>
</html>