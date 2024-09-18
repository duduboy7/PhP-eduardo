<?php 
	include_once('cabecalho.php');
?>	
	<div class="col-md-5 mx-auto border border-secondary shadow-lg">
		<h1 class="alert alert-warning text-center mt-3">
		 	<i class="fa-solid fa-key"></i> Acesso restrito
		</h1>

		<form name="form1" id="form1" 
              method="post" action="admin.php">
			<label for="login">Login</label>
			<input type="text" name="login"
			       id="login" class="form-control"
			       autofocus>

			<label for="senha">Senha</label>
			<input type="password" name="senha"
			       id="senha" class="form-control">

			<button type="submit" name="submit"
			        class="btn btn-info mt-3 mb-3">
				<i class="fa-solid fa-right-to-bracket"></i> Entrar        
			</button> 
			<a href="../" 
			   class="btn btn-secondary"> 
			   <i class="fa-solid fa-angles-left"></i> Voltar
			</a>     
		</form>
	</div>


<?php 
	include_once('rodape.php');
?>