<?php 
	$dados = isset($_GET['dados']) ? $_GET['dados'] : null;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recebe dados via GET</title>
</head>
<body>
	<h1>Recebe dados via GET</h1>
	<p>
		Seus dados: <?php echo $dados; ?>
	</p>

</body>
</html>