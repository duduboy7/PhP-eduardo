<?php 
	session_start();
	include_once('funcoes.php');
	include_once('confere-login.php');
	include_once('../conexao.php');

	$id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : null;
	$sql = 'DELETE FROM tab_usuarios WHERE id_usuario = ?';
	try {
		$query = $bd->prepare($sql);
		$query->bindParam(1, $id_usuario, PDO::PARAM_INT);
		$query->execute();
		header('Location: adm-usuarios.php');
	} catch (Exception $e) {
		echo $e->getMessage();
	}
?>