<?php 
	date_default_timezone_set('America/Sao_Paulo');
	$hora = date('H:i:s');
	$data = date('d/m/Y');
	$arquivo = 'arquivo.txt';
	$texto = 'O Macaco fez login em ' . $data . ' às ' . $hora . PHP_EOL;
	$file = fopen($arquivo, 'a');
	fwrite($file, $texto);
	fclose($file);
	echo '<h1>Texto inserido</h1>';
?>