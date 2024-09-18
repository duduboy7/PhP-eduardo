<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Acesso restrito</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<main class="container mt-3">
		<div class="col-md-5 mx-auto border border-secondary shadow mt-5 pt-3">
			<h1 class="alert alert-warning text-center">
				Acesso restrito
			</h1>
			<form name="form1" id="form1"
			      method="post" 
			      action="admin.php">
				<label for="login" class="mb-0 mt-3">Login</label>
				<input type="text" name="login" class="form-control"
				       autofocus>

				<label for="senha" class="mb-0 mt-3">Senha</label>
				<input type="password" name="senha" class="form-control">

				<button type="submit" name="entrar" 
				        class="btn btn-info mt-3 mb-3">
				    <i class="fa-solid fa-right-to-bracket"></i> Entrar
				</button>

				<a href="../" 
				   class="btn btn-secondary">
				   <i class="fa-solid fa-angles-left"></i> Voltar
				</a>

				<p class="float-right mt-4">
					<a href="lembrar-senha.php">
						Esqueceu a senha?
					</a>
				</p>
			</form>
		</div>
		
	</main>

</body>
</html>