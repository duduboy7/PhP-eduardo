<?php
	session_start();
	include_once('funcoes.php');
	include_once('confere-login.php');
	include_once('../conexao.php');

	echo'
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	';

	$id_pessoa = isset($_GET['id_pessoa']) ? $_GET['id_pessoa'] : null;
	$sql = 'SELECT * FROM tab_pessoas WHERE id_pessoa = :id_pessoa';
	try {
		$query = $bd->prepare($sql);
		$query->execute(array(':id_pessoa' => $id_pessoa));
		$resultado = $query->fetch(PDO::FETCH_LAZY);
	} catch (Exception $e) {
		echo $e->getMessage();
	}



	if(isset($_POST['submit'])){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$fone = $_POST['fone'];
		$sql = 'UPDATE tab_pessoas 
		        SET nome = ?, email = ?, fone = ? 
		        WHERE id_pessoa = ?';
		try {
			$query = $bd->prepare($sql);
			$query->execute(array($nome,$email,$fone,$id_pessoa));
			//header('Location: adm-pessoas.php');
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
	        <p>Pessoa alterada com sucesso.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" 
	                onclick="window.location.href='adm-pessoas.php'">Ok</button>
	      </div>
	    </div>
	  </div>
	</div>




	<h1 class="alert alert-success">
		Ambiente seguro
	</h1>

	<h3 class="alert alert-info">
		<i class="fa-solid fa-pen"></i> Altera pessoa
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

	    <div class="row">
	    	<div class="col">
			    <label for="fone">Fone:</label>
			    <input type="text" name="fone" id="fone"
			           class="form-control" required
			           value="<?php echo $resultado->fone; ?>">
			</div>
			<div class="col">
				<a href="alterar-imagem.php?id_pessoa=<?php echo $resultado->id_pessoa; ?>" title="Alterar foto" data-toggle="tooltip" data-placement="top">
					<img src="../img_peq/<?php echo $resultado->foto; ?>" 
					     class="mt-4"><i class="fa-solid fa-pen"></i></a>
			</div>
		</div>

	    <button type="submit" name="submit" 
	            class="btn btn-info mt-3"><i class="fa-solid fa-pen"></i> Alterar</button>

	    <a href="adm-pessoas.php" 
	       class="btn btn-secondary mt-3"><i class="fa-solid fa-angles-left"></i> Voltar
	    </a>	
	</form>
<?php 
	include_once('rodape.php');
?>