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
		$fone = $_POST['fone'];
		$foto = $_FILES['imagem']['name'];

		// Criando os caminhos para cada imagem
		$img_grd = '../img_grd/' . $foto;
		$img_peq = '../img_peq/' . $foto;

		// Copia a imagem original para a pasta img_grd
		move_uploaded_file($_FILES['imagem']['tmp_name'], $img_grd);

		// Importa a classe e instancia o objeto
		include_once('../classes/Image.class.php');
		$img = new Image();

		// Redimensiona a imagem mantendo a original
		$imgPointer = $img->prepareImage($img_grd);
		$img->prepareResize($imgPointer, 50, 50);
		$resizeResult = $img->createThumbnail($imgPointer, $img_peq);

		// Se a conversão for bem sucedida, grava os dados
		if($resizeResult){
			$sql = 'INSERT INTO tab_pessoas (nome, email, fone, criado_em, foto, ativo) 
			 VALUES (:nome, :email, :fone, NOW(), :foto, 1)';
			try {
				$query = $bd->prepare($sql);
				$query->bindValue(':nome', $nome, PDO::PARAM_STR);
				$query->bindValue(':email', $email, PDO::PARAM_STR);
				$query->bindValue(':fone', $fone, PDO::PARAM_STR);
				$query->bindValue(':foto', $foto, PDO::PARAM_STR);
				$query->execute();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
			//header('Location: adm-pessoas.php');
			echo '
				<script language="javascript">
					$(document).ready(function(){
						$("#insere").modal();
					});
				</script>
			';
		}

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
	        <p>Pessoa inserida com sucesso.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" 
	                data-dismiss="modal">Ok</button>
	      </div>
	    </div>
	  </div>
	</div>



	<h1 class="alert alert-success">
		Ambiente seguro
	</h1>

	<h3 class="alert alert-info">
		<i class="fa-solid fa-floppy-disk"></i> Insere pessoa
	</h3>

	<form name="form1" id="form1" method="post" 
	      enctype="multipart/form-data">
	    <label for="nome">Nome:</label>
	    <input type="text" name="nome" id="nome"
	           class="form-control" required autofocus>

	    <label for="email">E-mail:</label>
	    <input type="email" name="email" id="email"
	           class="form-control" required maxlength="50">

	    <label for="fone">Fone:</label>
	    <input type="text" name="fone" id="fone"
	           class="form-control" required>

	    <label for="imagem">Foto:</label>
	    <input type="file" name="imagem" id="imagem"
	           class="form-control">

	    <button type="submit" name="submit" 
	            class="btn btn-info mt-3"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>

	    <a href="adm-pessoas.php" 
	       class="btn btn-secondary mt-3"><i class="fa-solid fa-angles-left"></i> Voltar
	    </a>	
	</form>
<?php 
	include_once('rodape.php');
?>