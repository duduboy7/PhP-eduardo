<?php
	$nome = isset($_POST['enviar']) ? $_POST['nome'] : null;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recebe dados via POST</title>
</head>
<body>
	<h1>Recebe dados via POST</h1>
	<p>
		Seus dados: <?php echo $nome; ?>
	</p>

</body>
</html>