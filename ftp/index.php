<?php 
	if(isset($_FILES['arquivo'])){
		// Diretório para o upload
		$dir = 'arquivos/';
		// Faz o upload do arquivo
		move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$_FILES['arquivo']['name']);
		// Recarrega a página
		echo '<script>alert("Arquivo enviado");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=./">';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de FTP</title>
	<!-- Fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<main class="container">
		<h1 class="alert alert-info text-center">Sistema de FTP</h1>
		<form name="form1" id="form1" method="post"
		      enctype="multipart/form-data">
			<label>Selecione seu arquivo</label>
			<input type="file" name="arquivo" 
			       id="arquivo" class="form-control" 
			       required>
			<button type="submit" name="submit" 
			        id="submit" class="btn btn-info mt-3">
			    <i class="fa-solid fa-share"></i> Enviar
			</button>
		</form>

		<h2 class="alert alert-warning">Arquivos no servidor</h2>

		<?php 
			$diretorio = opendir('arquivos/');
			$excluir = array('.', '..');
			while ($lista = readdir($diretorio)) {
				if ($lista == $excluir[0] || $lista == $excluir[1]) 
					continue;
				$arquivos[] = $lista;
			}

			if(isset($arquivos)){
				sort($arquivos);
				echo '<ul>';
				$total = 0;
				foreach ($arquivos as $arquivo) {
					echo '<li>';
					echo '<a href="arquivos/'.$arquivo.'">'.$arquivo.'</a>';
					echo '</li>';
					$total++;
				}
				echo '</ul>';
				echo '<button type="button" class="btn btn-info contador">Total de arquivos <span class="badge badge-light">'.$total.'</span></button>';
				closedir($diretorio);
			}else{
				echo '<div class="alert alert-danger">Não há arquivos neste diretório</div>';
			}
		?>

	</main>

</body>
</html>