<?php 
	session_start();
	include_once('funcoes.php');
	include_once('confere-login.php');
	include_once('../conexao.php');

	if(isset($_POST['submit'])){
		$senha_atual = hash('sha256', $_POST['senha_atual']);
		$senha = $_POST['senha'];
		$senhaCripto = hash('sha256', $senha);
		$frase = $_POST['frase'];
		$id_usuario = $_POST['id_usuario'];

		$sql = 'SELECT * FROM tab_usuarios WHERE id_usuario = :id_usuario';
		try {
			$query = $bd->prepare($sql);
			$query->execute(array(':id_usuario' => $id_usuario));
			$resultado = $query->fetch(PDO::FETCH_LAZY);
			if($senha_atual === $resultado->senha){
				$sql = 'UPDATE tab_usuarios 
				        SET senha = ?, frase = ? 
				        WHERE id_usuario = ?';
				try{
					$query = $bd->prepare($sql);
					$query->execute(array($senhaCripto, $frase, $id_usuario));
					echo'<script>alert("Senha alterada!");</script>';
					echo'<meta http-equiv="refresh" content="0;URL=logado.php">';
				} catch(Exception $e){
					echo $e->getMessage();
				}
			}else{
				echo'<script>alert("A senha atual não confere!");</script>';
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	include_once('cabecalho.php');
?>
	<h1 class="alert alert-success text-center mt-3">
		Ambiente seguro
	</h1>

	<h3 class="alert alert-info">Alterar senha</h3>

	<form name="form1" id="form1" method="post" 
	      onsubmit="return VerificaSenhaAdm();">
	      
		<input type="hidden" 
		       name="id_usuario" 
		       id="id_usuario" 
		       value="<?php echo $_SESSION['id_usuario'] ?>">

		<label for="senha_atual">Senha atual:</label>
		<input type="password" name="senha_atual"
		       id="senha_atual"
		       class="form-control">

		<label for="senha">Digite a nova senha:</label>
		<input type="password" name="senha"
		       id="senha"
		       class="form-control">

		<label for="senha2">Repita a nova senha:</label>
		<input type="password" name="senha2"
		       id="senha2"
		       class="form-control">

		<label for="frase">Frase de segurança:</label>
		<input type="text" name="frase"
		       id="frase"
		       class="form-control">

		<button type="submit" name="submit"
		        id="submit" class="btn btn-info mt-3">
		        <i class="fa-solid fa-pen"></i> Alterar
		</button>

		<a href="adm-usuarios.php" 
		   class="btn btn-secondary mt-3">
		   <i class="fa-solid fa-angles-left"></i> Voltar
		</a>
	</form>
<?php 
	include_once('rodape.php');
?>
