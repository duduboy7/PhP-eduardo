<?php 
	include_once('../conexao.php');
	$login = isset($_POST['login']) ? $_POST['login'] : null;
	$senha = isset($_POST['senha']) ? $_POST['senha'] : null;
	$senhaCripto = hash('sha256', $senha);
	if(empty($login) || empty($senha)){
		include_once('cabecalho.php');
		echo '
			<div class="col-md-5 mx-auto border border-secondary shadow-lg text-center">
				<h1 class="alert alert-warning text-center mt-3">
				 	<i class="fa-solid fa-key"></i> Acesso restrito
				</h1>
				<h4>Preencha todos os campos!</h4>
				<a href="./" class="btn btn-secondary mt-3 mb-3">
					<i class="fa-solid fa-angles-left"></i> Voltar
				</a>
			</div>
		';
		include_once('rodape.php');
		exit;
	}








	$sql = 'SELECT * FROM tab_usuarios 
	        WHERE login = :login 
	        AND senha = :senha';
	$query = $bd->prepare($sql);
	$query->bindParam(':login', $login);
	$query->bindParam(':senha', $senhaCripto);
	$query->execute();
	$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
	if(count($usuarios) <= 0){
		include_once('cabecalho.php');
		echo '
			<div class="col-md-5 mx-auto border border-secondary shadow-lg text-center">
				<h1 class="alert alert-danger text-center mt-3">
				 	Ooops!!!!
				</h1>
				<h4>Login ou senha inválido, tente novamente!</h4>
				<a href="./" class="btn btn-secondary mt-3 mb-3">
					<i class="fa-solid fa-angles-left"></i> Voltar
				</a>
			</div>
		';
		include_once('rodape.php');
		exit;
	}






	$usuario = $usuarios[0];
	session_start();
	$_SESSION['login'] = $login;
	$_SESSION['id_usuario'] = $usuario['id_usuario'];
	$_SESSION['nome'] = $usuario['nome'];
	$_SESSION['logado'] = true;

	header('Location: logado.php');
?>
