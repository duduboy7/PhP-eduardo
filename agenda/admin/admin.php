<?php 
	include_once('../conexao.php');
	$login = isset($_POST['login']) ? $_POST['login'] : null;
	$senha = isset($_POST['senha']) ? $_POST['senha'] : null;
	$senhaCrypto = hash('sha256', $senha);
	if(empty($login) || empty($senha)){
		echo '
			<!DOCTYPE html>
			<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Cadastro de pessoas</title>
				<!-- Bootstrap -->
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
				<!-- Font Awesome -->
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
			</head>
			<body>
				<main class="container mt-3">
					<div class="col-md-5 mx-auto border border-secondary shadow mt-5">
						<h1 class="alert alert-warning text-center mt-3">
							ATENÇÃO!!!
						</h1>
						<p class="text-center">
							Preencha todos os campos.
						</p>
						<p class="text-center">
							<a href="./"
							   class="btn btn-secondary">
							   <i class="fa-solid fa-angles-left"></i> Voltar
							</a>
						</p>
					</div>
					
				</main>
			</body>
			</html>
		';
		exit;
	}










	$sql='SELECT * FROM tab_usuarios WHERE login = :login AND senha = :senha';
	$query = $bd->prepare($sql);
	$query->bindParam(':login', $login);
	$query->bindParam(':senha', $senhaCrypto);
	$query->execute();
	$usuario = $query->fetchAll(PDO::FETCH_ASSOC);
	if(count($usuario) <= 0){
		echo '
			<!DOCTYPE html>
			<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Cadastro de pessoas</title>
				<!-- Bootstrap -->
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
				<!-- Font Awesome -->
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
			</head>
			<body>
				<main class="container mt-3">
					<div class="col-md-5 mx-auto border border-secondary shadow mt-5">
						<h1 class="alert alert-danger text-center mt-3">
							Ooops...
						</h1>
						<p class="text-center">
							Atenção - Login ou senha inválido, tente novamente!.
						</p>
						<p class="text-center">
							<a href="./"
							   class="btn btn-secondary">
							   <i class="fa-solid fa-angles-left"></i> Voltar
							</a>
						</p>
					</div>
					
				</main>
			</body>
			</html>
		';
		exit;
	}







	$sql='SELECT * FROM tab_usuarios WHERE login = :login AND senha = :senha';
	$query = $bd->prepare($sql);
	$query->bindParam(':login', $login);
	$query->bindParam(':senha', $senhaCrypto);
	$query->execute();
	$usuario = $query->fetchAll(PDO::FETCH_ASSOC);
	if(count($usuario)){
		$usu = $usuario[0];
		if($usu['ativo'] == 0){
			echo '
				<!DOCTYPE html>
			<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Cadastro de pessoas</title>
				<!-- Bootstrap -->
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
				<!-- Font Awesome -->
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
			</head>
			<body>
				<main class="container mt-3">
					<div class="col-md-5 mx-auto border border-secondary shadow mt-5">
						<h1 class="alert alert-danger text-center mt-3">
							Ooops...
						</h1>
						<p class="text-center">
							Atenção - usuário desativado.
						</p>
						<p class="text-center">
							<a href="./"
							   class="btn btn-secondary">
							   <i class="fa-solid fa-angles-left"></i> Voltar
							</a>
						</p>
					</div>
					
				</main>
			</body>
			</html>

			';
			exit;
		}
	}







	$usu = $usuario[0];
	session_start();
	$_SESSION['login'] = $login;
	$_SESSION['logado'] = true;
	$_SESSION['id_usuario'] = $usu['id_usuario'];
	$_SESSION['nome'] = $usu['nome'];

	// Criando o arquivo de log
	date_default_timezone_set('America/Sao_Paulo');
	$data_hora = date('d/m/Y - H:i:s');
	$arquivo = 'log/login.txt';
	$texto = 'Usuário: ' . $_SESSION['nome'] . ' - ' . $data_hora . PHP_EOL;
	$file = fopen($arquivo, 'a');
	fwrite($file, $texto);
	fclose($file);

	// Verificando se a senha é a padrão
	if($usu['senha'] == hash('sha256', '123')){
		header('Location: troca-senha-padrao.php');
	}

	// Verificando o nível de usuário
	else if($usu['nivel'] == 0){
		header('Location: logado.php');
	}else{
		header('Location: comum.php');
	}

?>