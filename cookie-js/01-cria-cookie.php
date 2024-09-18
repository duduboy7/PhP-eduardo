<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Criando um cookie com javascript</title>
</head>
<body>
	<h1>Criando um cookie com javascript</h1>
	<script type="text/javascript">
		var nome = prompt('Digite seu nome', '');
		document.cookie = 'biscoito='+nome+'; expires=Fri, 29 Apr 2022 17:00:00 UTC';
	</script>

	<a href="02-le-cookie.php">Lê cookie</a>
</body>
</html>