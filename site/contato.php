<?php 
	include_once('cabecalho.php');
	include_once('menu.php');
?>	
		<h2>Contato</h2>
		<form>
			<label for="nome" class="mb-0 mt-3">Nome:</label>
			<input type="text" name="nome" class="form-control">

			<label for="email" class="mb-0 mt-3">E-mail:</label>
			<input type="email" name="email" class="form-control">

			<label for="comentario" class="mb-0 mt-3">Comentário</label>
			<textarea name="comentario" 
			          class="form-control" rows="8"></textarea>

			<input type="submit" name="enviar" value="Enviar"
			       class="btn btn-info mt-3">
		</form>

		<p>&nbsp;</p>
		<p>&nbsp;</p>

<?php 
	include_once('rodape.php');
?>