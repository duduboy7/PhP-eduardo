<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Condicional switch</title>
</head>
<body>
	<script type="text/javascript">
		var num = parseInt(prompt('Digite um número de 0 a 5',''));
	</script>

	<?php 
		echo 'Transportando variável<br>';
		$num = '<script> num </script>';
		switch ($num) {
			case 0:
				echo 'Você digitou 0';
				break;
			case 1:
				echo 'Você digitou 1';
				break;
			case 2:
				echo 'Você digitou 2';
				break;
			case 3:
				echo 'Você digitou 3';
				break;
			case 4:
				echo 'Você digitou 4';
				break;
			case 5:
				echo 'Você digitou 5';
				break;
			
			default:
				echo 'Número inválido';
				break;
		}
	?>
</body>
</html>