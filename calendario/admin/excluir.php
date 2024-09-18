<?php 
	session_start();
	include_once('funcoes.php');
	include_once('confere-login.php');
	include_once('../conexao.php');

	$id = isset($_GET['id']) ? $_GET['id'] : null;

	$sql = 'DELETE FROM tab_eventos
	        WHERE id = ?';
	try {
		$query = $bd->prepare($sql);
		$query->bindParam(1, $id, PDO::PARAM_INT);
		$query->execute();
		header('Location: logado.php');
	} catch (Exception $e) {
		echo $e->getMessage();
	}
?>