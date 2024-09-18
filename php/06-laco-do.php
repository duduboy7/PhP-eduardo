<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laço de repetição DO</title>
</head>
<body>
	<h1>Laço de repetição DO</h1>
	<?php
		$i = 0;
		do {
			echo 'O valor de i é: ' . $i . '<br>';
			$i++;
		} 
		while ($i <= 10);
	?>

</body>
</html>