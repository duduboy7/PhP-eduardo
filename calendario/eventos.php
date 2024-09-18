<?php 
	include_once('conexao.php');
	$sql = $bd->query('SELECT * FROM tab_eventos');
	while($query = $sql->fetch(PDO::FETCH_ASSOC)){
		$resultado[] = $query;
	}
	// Passando o vetor em forma de json
	echo json_encode($resultado);
?>