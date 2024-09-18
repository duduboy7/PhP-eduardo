<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Remove o cookie</title>
</head>
<body>
	<?php 
		// Apaga o cookie
		setcookie('biscoito');
		header('Location: 02-le-cookie.php');
	?>

</body>
</html>