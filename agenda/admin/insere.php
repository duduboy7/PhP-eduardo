<?php
	session_start();
	include_once('funcoes.php');
	include_once('confere-login.php');
	include_once('../conexao.php');
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
			header('Location: adm-pessoas.php');
		}

	}
	include_once('cabecalho.php');
?>
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