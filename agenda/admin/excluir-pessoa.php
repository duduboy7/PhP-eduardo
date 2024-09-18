<?php 
	session_start();
	include_once('funcoes.php');
	include_once('confere-login.php');
	include_once('../conexao.php');

	$id_pessoa = isset($_GET['id_pessoa']) ? $_GET['id_pessoa'] : null;
	$sql = 'DELETE FROM tab_pessoas WHERE id_pessoa = ?';
	try {
		$query = $bd->prepare($sql);
		$query->bindParam(1, $id_pessoa, PDO::PARAM_INT);
		$query->execute();
		header('Location: adm-pessoas.php');
	} catch (Exception $e) {
		echo $e->getMessage();
	}
?>