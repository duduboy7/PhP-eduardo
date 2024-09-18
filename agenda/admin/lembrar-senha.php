<?php 
	include_once('../conexao.php');
	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$sql = 'SELECT * FROM tab_usuarios WHERE email = :email';
		try {
			$query = $bd->prepare($sql);
			$query->bindValue(':email', $email, PDO::PARAM_STR);
			$query->execute();
			$resultado = $query->fetch(PDO::FETCH_LAZY);
			if($query->rowCount() > 0){

				//Criando a sessão
				session_start();
				$_SESSION['nome'] = $resultado->nome;
				$_SESSION['email'] = $resultado->email;
				$_SESSION['frase'] = $resultado->frase;
				
				header('Location: envia-email.php');
			}else{
				header('Location: erro.php');
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
?>
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
				<i class="fa-solid fa-key"></i> Lembrar senha
			</h1>
			<p class="text-center">
				<h4 class="text-center">
					Preencha o campo abaixo e verifique seu e-mail!
				</h4>
				<form name="form1" id="form1"
				      method="post" action="">
					<label for="email">E-mail</label>
					<input type="email" name="email"
					       id="email" class="form-control"
					       autofocus>
					<button type="submit" name="submit" 
				        class="btn btn-info mt-3">
				    	<i class="fa-solid fa-right-to-bracket"></i> Enviar
					</button>

					<a href="./" 
					   class="btn btn-secondary mt-3">
					   <i class="fa-solid fa-angles-left"></i> Voltar
					</a>
				</form>
			</p>
		</div>
		
	</main>

</body>
</html>