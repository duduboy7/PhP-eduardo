<?php
	if(isset($_POST['enviar'])){
		$nome = $_POST['nome'];
		$idade = $_POST['idade'];
		$fone = $_POST['fone'];
		$end = $_POST['end'];
		$num = $_POST['num'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$cep = $_POST['cep'];
	}
	else{
		$nome = null;
		$idade = null;
		$fone = null;
		$end = null;
		$num = null;
		$bairro = null;
		$cidade = null;
		$estado = null;
		$cep = null;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Confora seu cadastro</title>
</head>
<body>
	<h1>Confira seu cadastro</h1>
	<p>
		Nome: <?php echo $nome; ?><br>
		Idade: <?php echo $idade; ?> anos<br>
		Fone: <?php echo $fone; ?><br>
		Endereço: <?php echo $end; ?>, <?php echo $num; ?><br>
		Bairro: <?php echo $bairro; ?><br>
		Cidade: <?php echo $cidade; ?><br>
		Estado: <?php echo $estado; ?><br>
		CEP: <?php echo $cep; ?><br>
	</p>

</body>
</html>