<?php 
	session_start();
	include_once('funcoes.php');
	include_once('confere-login.php');
	include_once('../conexao.php');
	include_once('cabecalho.php');
?>
	<h1 class="alert alert-success text-center">
		Cadastro de pessoas - ambiente seguro
	</h1>
	<p>
		Olá <b><?php echo $_SESSION['nome']; ?></b> 
		Seu ID é: <b><?php echo $_SESSION['id_usuario']; ?></b>
	
		<a href="logoff.php" class="btn btn-danger btn-sm">
			<i class="fa-solid fa-right-from-bracket"></i> Logoff
		</a>
		<a href="altera-senha-adm.php" class="btn btn-success btn-sm">
			<i class="fa-solid fa-pen"></i> Alterar senha
		</a>
	</p>

	<h3 class="alert alert-info">
		Administração
	</h3>

	<div class="card-deck mb-3 text-center">
		<div class="card mb-4 shadow-sm">
			<div class="card-header">
				<h4 class="my-0">
					Administrar pessoas
				</h4>
			</div>
			<div class="car-body">
				<h1><i class="fa-solid fa-users"></i></h1>
				<a href="adm-pessoas.php" 
				   class="btn btn-lg btn-block btn-outline-primary">
				   Administrar
				</a>
			</div>
		</div>
	</div>		


<?php 
	include_once('rodape.php');
?>