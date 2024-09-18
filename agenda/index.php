<?php 
	include_once('conexao.php');
	// Recebe a variável busca se existir
	$busca = isset($_GET['busca']) ? $_GET['busca'] : null;
	// Verifica se a variável busca está vazia, se estiver faz a consulta completa
	if (empty($busca)) {
		$sql = 'SELECT * FROM tab_pessoas WHERE ativo = 1';
		try {
			$query = $bd->prepare($sql);
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}else{
		$sql2 = 'SELECT * FROM tab_pessoas WHERE nome LIKE :nome OR email LIKE :email AND ativo = 1';
		try {
			$query = $bd->prepare($sql2);
			$query->bindValue(':nome', '%' . $busca . '%');
			$query->bindValue(':email', '%' . $busca . '%');
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de pessoas</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- CSS para o Lightbox -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<main class="container mt-3">
		<h1 class="alert alert-info text-center">Cadastro de pessoas</h1>
		<p>&nbsp;</p>
		<form name="form1" id="form1" method="get">
			<label for="busca" class="mb-0">Pesquisar:</label>
			<input type="text" name="busca" id="busca"
			       class="form-control">
			<button type="submit" name="pesquisar" 
			        id="pesquisar" class="btn btn-info mt-3">
			        <i class="fa-solid fa-magnifying-glass"></i> Pesquisar</button>
		</form>


		<p>&nbsp;</p>

		<?php 
			if ($query->rowCount() <= 0) {
				echo '<h3 class="alert alert-danger text-center">Não foi encontrado nenhum registro!</h3>';
			}else{
				echo '
					<div class="table-responsive">
						<table class="table table-striped table-hover table-bordered">
							<tr>
								<td class="text-center"><b>ID</b></td>
								<td class="text-left"><b>Nome</b></td>
								<td class="text-left"><b>E-mail</b></td>
								<td class="text-center"><b>Fone</b></td>
								<td class="text-center"><b>Criado em</b></td>
								<td class="text-center"><b>Foto</b></td>
							</tr>';
					foreach ($resultado as $r) {
						echo '
							<tr>
								<td class="text-center align-middle">'.$r['id_pessoa'].'</td>
								<td class="text-left align-middle">'.$r['nome'].'</td>
								<td class="text-left align-middle"><a href="mailto:'.$r['email'].'">'.$r['email'].'</a></td>
								<td class="text-center align-middle">'.$r['fone'].'</td>
								<td class="text-center align-middle">'.date('d/m/Y', strtotime($r['criado_em'])).'</td>
								<td class="text-center align-middle">
								<a href="img_grd/'.$r['foto'].'" 
								     data-toggle="lightbox" 
								     data-gallery="exemplo">
								     <img src="img_peq/'.$r['foto'].'" 
								          height="50">
								</a></td>
							</tr>
						';
					}
					echo '
						</table>
					</div>

				';
			}
		?>



	</main>









	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!-- Javascript para o lightbox -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

	<script language="javascript">
		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
		        event.preventDefault();
		        $(this).ekkoLightbox();
		});
	</script>
	<!-- Fim do lightbox -->

</body>
</html>