<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Par ou ímpar</title>
</head>
<body>
	<script type="text/javascript">
		var num = parseInt(prompt('Digite um número',''));
		if(num % 2 == 0){
			document.write('<?php echo "O número é par" ?>');
		}
		else{
			document.write('<?php echo "O número é ímpar" ?>');
		}
	</script>

</body>
</html>