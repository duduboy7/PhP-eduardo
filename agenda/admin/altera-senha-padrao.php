<?php 
	session_start();
	include_once('funcoes.php');
	include_once('confere-login.php');
	include_once('../conexao.php');

	if(isset($_POST['submit'])){
		$senha = hash('sha256', $_POST['senha']);
		$frase = $_POST['frase'];
		$id_usuario = $_POST['id_usuario'];

		$sql = 'UPDATE tab_usuarios SET senha = ?, frase = ? WHERE id_usuario = ?';
		try {
			$query=$bd->prepare($sql);
			$query->execute(array($senha, $frase, $id_usuario));
			echo '<script>alert("Senha alterada\nFaça o login novamente")</script>';
			echo '<meta http-equiv="refresh" content="0;URL=./">';
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
?>