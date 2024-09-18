<?php 
	session_start();
	include_once('funcoes.php');
	include_once('confere-login.php');
	include_once('../conexao.php');

	// Recebe a variável busca se existir
	$busca = isset($_GET['busca']) ? $_GET['busca'] : null;
	
	// Verifica se a variável está vazia, se estiver faz a consulta completa
	if(empty($busca)){
		$sql = 'SELECT * FROM tab_usuarios';
		try {
			$query=$bd->prepare($sql);
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}else{
		$sql2 = 'SELECT * FROM tab_usuarios WHERE nome LIKE :nome OR email LIKE :email';
		try {
			$query=$bd->prepare($sql2);
			$query->bindValue(':nome', '%'.$busca.'%');
			$query->bindValue(':email', '%'.$busca.'%');
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

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
		<a href="altera-senha.php" class="btn btn-success btn-sm">
			<i class="fa-solid fa-pen"></i> Alterar senha
		</a>
	</p>

	<h3 class="alert alert-info">
		Administração
	</h3>

	<a href="insere-usuario.php"
	   class="btn btn-success">
	   <i class="fa-solid fa-floppy-disk"></i> Insere usuário
	</a>

	<a href="logado.php" 
	   class="btn btn-secondary">
	   <i class="fa-solid fa-angles-left"></i> Voltar
	</a>

	<form name="form1" id="form1" method="get">
		<label for="busca" class="mt-3 mb-0">Pesquisar:</label>
		<input type="text" name="busca" id="busca"
		       class="form-control">
		<button type="submit" name="pesquisar"
		        class="btn btn-info mt-3 mb-3">
			<i class="fa-solid fa-magnifying-glass"></i> Pesquisar
		</button>
	</form>

	<?php

		if($query->rowCount() <= 0){
			echo'
				<h3 class="alert alert-danger text-center">
					Não foi encontrado nenhum registro!
				</h3>
			';
		}else{
			echo'
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<tr>
				<td class="text-center">ID</td>
				<td class="text-left">Nome</td>
				<td class="text-left">E-mail</td>
				<td class="text-center">Login</td>
				<td class="text-center">Nível</td>
				<td class="text-center">Alterar</td>
				<td class="text-center">Excluir</td>
				<td class="text-center">Situação</td>
			</tr>';

			foreach ($resultado as $r) {
				echo '
				<tr>
					<td class="text-center align-middle">'
						.$r['id_usuario'].
					'</td>
					<td class="text-left align-middle">'
						.$r['nome'].
					'</td>
					<td class="text-left align-middle"><a href="mailto:'
						.$r['email'].
					'">'.$r['email'].'</a></td>
					<td class="text-center align-middle">'
						.$r['login'].
					'</td>';

					if($r['nivel'] == 0){ 
						echo'<td class="text-center align-middle text-danger"><i class="fa-solid fa-lock-open" title="Administrador" data-toggle="tooltip" data-placement="top"></i></td>';
					}else{
						echo'<td class="text-center align-middle"><i class="fa-solid fa-lock" title="Comum" data-toggle="tooltip" data-placement="top"></i></td>';
					}


					echo'
					<td class="text-center align-middle"><a href="alterar-usuario.php?id_usuario='
						.$r['id_usuario'].
					'" title="Alterar" data-toggle="tooltip" data-placement="top"><i class="fa-solid fa-pen"></i></a></td>
					<td class="text-center align-middle"><a href="excluir-usuario.php?id_usuario='
						.$r['id_usuario'].
					'" onclick="javascript: return ExcluirUsu('.$r['id_usuario'].')" title="Excluir" data-toggle="tooltip" data-placement="top"><i class="fa-solid fa-trash"></i></a></td>';
					if($r['ativo'] == 1){
						echo '
						<td class="text-center align-middle"><a href="desativar-usuario.php?id_usuario='.$r['id_usuario'].'" onclick="javascript: return DesativarUsu('.$r['id_usuario'].')" class="text-success" title="Ativado" data-toggle="tooltip" data-placement="top"><i class="fa-solid fa-circle-check"></i></a></td>';
					}else{
						echo '
						<td class="text-center align-middle"><a href="ativar-usuario.php?id_usuario='.$r['id_usuario'].'" onclick="javascript: return AtivarUsu('.$r['id_usuario'].')" class="text-danger" title="Desativado" data-toggle="tooltip" data-placement="top"><i class="fa-solid fa-circle-xmark"></i></a></td></tr>';
					}

			}
		}

	?>

		</table>
	</div>



<?php
	include_once('rodape.php');
?>