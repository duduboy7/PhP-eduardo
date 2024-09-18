<?php
	session_start();
	include_once('funcoes.php');
	include_once('confere-login.php');
	include_once('../conexao.php');

	echo'
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	';

	if(isset($_POST['submit'])){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$login = $_POST['login'];
		$senha = hash('sha256', '123');
		$frase = 'padrão';
		$nivel = $_POST['nivel'];


		$sql = 'INSERT INTO tab_usuarios (nome, email, login, senha, frase, nivel, ativo) 
			    VALUES (:nome, :email, :login, :senha, :frase, :nivel, 1)';
		try {
			$query = $bd->prepare($sql);
			$query->bindValue(':nome', $nome, PDO::PARAM_STR);
			$query->bindValue(':email', $email, PDO::PARAM_STR);
			$query->bindValue(':login', $login, PDO::PARAM_STR);
			$query->bindValue(':senha', $senha, PDO::PARAM_STR);
			$query->bindValue(':frase', $frase, PDO::PARAM_STR);
			$query->bindValue(':nivel', $nivel, PDO::PARAM_INT);
			$query->execute();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		//header('Location: adm-usuarios.php');
		echo '
			<script language="javascript">
				$(document).ready(function(){
					$("#insere").modal();
				});
			</script>
		';
	}


	include_once('cabecalho.php');
?>

	<!-- Janela modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="insere">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header bg-success">
	        <h5 class="modal-title text-white">Aviso</h5>
	        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fechar">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Usuário inserido com sucesso.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" 
	                onclick="window.location.href='adm-usuarios.php'">Ok</button>
	      </div>
	    </div>
	  </div>
	</div>



	<h1 class="alert alert-success">
		Ambiente seguro
	</h1>

	<h3 class="alert alert-info">
		<i class="fa-solid fa-floppy-disk"></i> Insere usuário
	</h3>

	<form name="form1" id="form1" method="post">
	    <label for="nome">Nome:</label>
	    <input type="text" name="nome" id="nome"
	           class="form-control" required autofocus>

	    <label for="email">E-mail:</label>
	    <input type="email" name="email" id="email"
	           class="form-control" required maxlength="50">

	    <label for="login">Login:</label>
	    <input type="text" name="login" id="login"
	           class="form-control" required>

	    <label for="nivel">Nível de usuário:</label>
	    <select name="nivel" id="nivel" class="form-control">
	    	<option value="Selecione">Selecione</option>
	    	<option value="0">Administrador</option>
	    	<option value="1">Comum</option>
	    </select>

	    <button type="submit" name="submit" 
	            class="btn btn-info mt-3"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>

	    <a href="adm-usuarios.php" 
	       class="btn btn-secondary mt-3"><i class="fa-solid fa-angles-left"></i> Voltar
	    </a>	
	</form>
<?php 
	include_once('rodape.php');
?>