<?php 
	session_start();
	include_once('funcoes.php');
	include_once('confere-login.php');
	include_once('../conexao.php');
	$id_usuario = $_SESSION['id_usuario'];
	$nome = $_SESSION['nome'];
	include_once('cabecalho.php');
?>
		<h1 class="alert alert-success text-center">
			Cadastro de pessoas - Ambiente seguro
		</h1>
		<h3 class="alert alert-info">
			Olá <?php echo $nome; ?>
		</h3>
		<h5>
			Este é seu primeiro login, por favor, troque sua senha
		</h5>
		<form name="form1" id="form1" method="post"
		      action="altera-senha-padrao.php" 
		      onsubmit="javascript: return Verifica();">
			<input type="hidden" name="id_usuario" 
			       id="id_usuario"
			       value="<?php echo $id_usuario; ?>">

			<label for="senha" 
			       class="mb-0">Digite sua nova senha</label>
			<input type="password" name="senha" 
			       id="senha" class="form-control"
			       required autofocus 
			       onkeyup="mostra_seguranca_senha(this.value, this.form)"><br>
			<i>segurança: </i>
			<input type="text" name="seguranca" 
			       id="seguranca" onfocus="blur()" 
			       style="border: 0px;"><br>
			<img src="" id="nivel" 
			     width="200" height="13" 
			     style="visibility: hidden;"><br>

			<label for="senha2">Repita sua nova senha:</label>
			<input type="password" name="senha2" id="senha2" 
			       class="form-control" required>

			<label for="frase">Digite sua frase de segurança:</label>
			<input type="text" name="frase" id="frase"
			       class="form-control" required>

			<button type="submit" name="submit" id="submit"
			        class="btn btn-info mt-3"><i class="fa-solid fa-pen"></i> Alterar
			</button>
			<a href="./" class="btn btn-secondary mt-3">
				<i class="fa-solid fa-angles-left"></i> Voltar
			</a>
		</form>
<?php 
	include_once('rodape.php');
?>