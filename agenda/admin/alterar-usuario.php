<?php
	session_start();
	include_once('funcoes.php');
	include_once('confere-login.php');
	include_once('../conexao.php');

	echo'
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	';

	$id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : null;
	$sql = 'SELECT * FROM tab_usuarios WHERE id_usuario = :id_usuario';
	try {
		$query = $bd->prepare($sql);
		$query->execute(array(':id_usuario' => $id_usuario));
		$resultado = $query->fetch(PDO::FETCH_LAZY);
	} catch (Exception $e) {
		echo $e->getMessage();
	}



	if(isset($_POST['submit'])){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$login = $_POST['login'];
		$nivel = $_POST['nivel'];
		$sql = 'UPDATE tab_usuarios 
		        SET nome = ?, email = ?, login = ?, nivel = ? 
		        WHERE id_usuario = ?';
		try {
			$query = $bd->prepare($sql);
			$query->execute(array($nome, $email, $login, $nivel, $id_usuario));
			//header('Location: adm-usuarios.php');
			echo '
				<script language="javascript">
					$(document).ready(function(){
						$("#altera").modal();
					});
				</script>
			';
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	include_once('cabecalho.php');
?>


	<!-- Janela modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="altera">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header bg-success">
	        <h5 class="modal-title text-white">Aviso</h5>
	        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fechar">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Usuário alterado com sucesso.</p>
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
		<i class="fa-solid fa-pen"></i> Altera usuário
	</h3>

	<form name="form1" id="form1" method="post">
	    <label for="nome">Nome:</label>
	    <input type="text" name="nome" id="nome"
	           class="form-control" required autofocus
	           value="<?php echo $resultado->nome; ?>">

	    <label for="email">E-mail:</label>
	    <input type="email" name="email" id="email"
	           class="form-control" required
	           value="<?php echo $resultado->email; ?>">


		<label for="login">Login:</label>
		<input type="text" name="login" id="login"
			   class="form-control" required
			   value="<?php echo $resultado->login; ?>">

		<label for="nivel">Nível de usuário:</label>
		<select name="nivel" id="nivel" class="form-control">
			<?php if($resultado->nivel == 0){ ?>
				<option value="0" selected>Administrador</option>
				<option value="1">Comum</option>
			<?php }else{ ?>
				<option value="0">Administrador</option>
				<option value="1" selected>Comum</option>
			<?php } ?>
		</select>


	    <button type="submit" name="submit" 
	            class="btn btn-info mt-3"><i class="fa-solid fa-pen"></i> Alterar</button>

	    <a href="adm-usuarios.php" 
	       class="btn btn-secondary mt-3"><i class="fa-solid fa-angles-left"></i> Voltar
	    </a>	
	</form>
<?php 
	include_once('rodape.php');
?>