<?php 
	if(isset($_POST['numero'])){
		$num = $_POST['numero'];
		switch ($num) {
			case 1:
				echo 'Você digitou 1';
				break;
			case 2:
				echo 'Você digitou 2';
				break;
			
			default:
				echo 'Número inválido';
				break;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form name="form1" id="form1"
	      method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
	    <label for="numero">Digite um número de 1 a 2</label><br>
	    <input type="number" name="numero" min="1" max="2"><br>
	    <input type="submit" name="enviar" value="Enviar">

	</form>

</body>
</html>