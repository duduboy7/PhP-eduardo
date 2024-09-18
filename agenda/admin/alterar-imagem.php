<?php
	session_start();
	include_once('funcoes.php');
	include_once('confere-login.php');
	include_once('../conexao.php');

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
			$sql = 'UPDATE tab_pessoas SET foto = ?
			        WHERE id_pessoa = ?';
			try {
				$query = $bd->prepare($sql);
				$query->execute(array($foto, $id_pessoa));

				// Criando o arquivo de log
				date_default_timezone_set('America/Sao_Paulo');
				$data_hora = date('d/m/Y - H:i:s');
				$arquivo = 'log/troca-foto.txt';
				$texto = 'Usuário: '.$_SESSION['nome'].' - '.$data_hora.PHP_EOL;
				$file = fopen($arquivo, 'a');
				fwrite($file, $texto);
				fclose($file);
				header('Location: adm-pessoas.php');
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
	}

	include_once('cabecalho.php');
?>
	<h2 class="alert alert-success">
		Alterar iamgem
	</h2>

	<div class="row">
		<div class="col-md-3">
			<?php 
				echo '
				<p class="text-center"><img src="../img_grd/'.$resultado->foto.'" alt="'.$resultado->foto.'" title="'.$resultado->foto.'" data-toggle="tooltip" data-placement="right" style="border-radius: 50%; border: 1px solid #BBB" class="shadow" height="200"></p>
				';
				echo '
				<p class="text-center">Imagem atual: <b>'.$resultado->foto.'</b></p>
				';
			?>
		</div>

		<div class="col-md-9">
			<form name="form1" id="form1" 
			      method="post" enctype="multipart/form-data" onsubmit="return TrocaImagem(this)">
				<div class="custom-file">
					<input type="file" name="imagem"
					       id="imagem" class="custom-file-input">
					<label class="custom-file-label">Selecione sua foto</label>
				</div>
				<button type="submit" name="submit"
				        id="submit" class="btn btn-info mt-3">
					<i class="fa-solid fa-pen"></i> Alterar        	
				</button>
				<a href="javascript: history.go(-1);"
				   class="btn btn-secondary mt-3"><i class="fa-solid fa-angles-left"></i> Voltar</a>
			</form>
		</div>
	</div>
<?php 
	include_once('rodape.php');
?>