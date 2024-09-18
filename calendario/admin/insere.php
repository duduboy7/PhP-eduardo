<?php 
	session_start();
	include_once('funcoes.php');
	include_once('confere-login.php');
	include_once('../conexao.php');

	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$color = $_POST['color'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$description = $_POST['description'];
		$url = '#';
		// Aumentar um dia para o calendário mostrar corretamente
		$fim = date('Y-m-d', strtotime('+1 days', strtotime($end)));
		$sql = 'INSERT INTO tab_eventos(title, start, end, description, url, color) VALUES(:title, :start, :end, :description, :url, :color)';
		try {
			$query = $bd->prepare($sql);
			$query->bindValue(':title', $title, PDO::PARAM_STR);
			$query->bindValue(':start', $start, PDO::PARAM_STR);
			$query->bindValue(':end', $fim, PDO::PARAM_STR);
			$query->bindValue(':url', $url, PDO::PARAM_STR);
			$query->bindValue(':color', $color, PDO::PARAM_STR);
			$query->bindValue(':description', $description, PDO::PARAM_STR);
			$query->execute();
			echo '
				<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
				<script>
					$(document).ready(function(){
							$("#insere").modal();
						});
				</script>
			';
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	include_once('cabecalho.php');
?>

<!-- Modal -->
<div class="modal fade" id="insere" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center">
        	Compromisso inserido!
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>


<h3 class="alert alert-info">
	<i class="fa-solid fa-floppy-disk"></i> Insere compromisso
</h3>

<form name="form1" id="form1" method="post">
	<div class="row">
		<div class="col">
			<label for="title">Título do compromisso</label>
			<input type="text" name="title" id="title"
			       class="form-control" autofocus required>
		</div>

		<div class="col">
			<label>Cor do compromisso</label><br>
			<label for="color1" class="mt-2 mr-3">
				<input type="radio" 
				       name="color" 
				       id="color1"
				       value="#F00">
				<span class="text-danger font-weight-bold">
					Vermelho
				</span>
			</label>

			<label for="color2" class="mr-3">
				<input type="radio" 
				       name="color" 
				       id="color2"
				       value="#00F">
				<span class="text-primary font-weight-bold">
					Azul
				</span>
			</label>

			<label for="color3">
				<input type="radio" 
				       name="color" 
				       id="color3"
				       value="#0F0">
				<span class="text-success font-weight-bold">
					Verde
				</span>
			</label>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<label for="start">Data de início</label>
			<input type="date" name="start" id="start"
			       class="form-control">
		</div>
		<div class="col">
			<label for="end">Data de término</label>
			<input type="date" name="end" id="end"
			       class="form-control">
		</div>
	</div>


	<label for="description">Descrição</label>
	<textarea name="description" id="description"
	          rows="8" class="form-control ckeditor"></textarea>

	<button type="submit" name="submit" id="submit"
	        class="btn btn-info mt-3"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
	<a href="logado.php" class="btn btn-secondary mt-3">
		<i class="fa-solid fa-angles-left"></i> Voltar
	</a>
</form>



<?php 
	include_once('rodape.php');
?>