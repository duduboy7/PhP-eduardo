<?php 
	session_start();
	include_once('funcoes.php');
	include_once('confere-login.php');
	include_once('../conexao.php');

	$sql = 'SELECT * FROM tab_eventos';
	try {
		$query = $bd->prepare($sql);
		$query->execute();
		$resultado = $query->fetchAll(PDO::FETCH_ASSOC);

	} catch (Exception $e) {
		echo $e->getMessage();
	}
	include_once('cabecalho.php');
?>

<style type="text/css">
	.sobe{
		position: relative;
		top: -5px;
	}
	.sobebt{
		position: relative;
		top: -2px;
	}
</style>


<!-- Modal -->
<div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light" id="exampleModalLabel">Excluir</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center">
        	Deseja excluir este compromisso?
        </p>
      </div>
      <div class="modal-footer">
      	<a href="" class="btn btn-danger" id="link">Sim</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
      </div>
    </div>
  </div>
</div>



<h1 class="alert alert-success">Calendário de compromissos</h1>

<h5 class="alert alert-info">Administração
	<span class="badge float-right sobe">
		Olá <b><?php echo $_SESSION['nome']; ?></b> 
		seu ID é <b><?php echo $_SESSION['id_usuario']; ?></b>

		<a href="logoff.php" class="btn btn-danger btn-sm sobebt">
			<i class="fa-solid fa-right-from-bracket"></i> Logoff
		</a>
	</span> 
</h5>

<a href="insere.php" class="btn btn-success mb-3">
	<i class="fa-solid fa-floppy-disk"></i> Insere compromisso
</a>

<?php
	if($query->rowCount() <= 0){
		echo '
		<h3 class="alert alert-danger">Não há compromisso cadastrado!</h3>
		';
	}else{
		echo '
		<div class="table-responsive">
		   <table class="table table-bordered table-striped table-hover">
		      <tr>
		         <th class="text-left">ID</th>
		         <th class="text-left">Título</th>
		         <th class="text-center">Dt Início</th>
		         <th class="text-center">Dt Fim</th>
		         <th class="text-center">Alterar</th>
		         <th class="text-center">Excluir</th>
		      </tr>
		';
		foreach ($resultado as $r) {
			echo '
			  <tr>
			  	<td class="text-left">'.$r['id'].'</td>
			  	<td class="text-left">'.$r['title'].'</td>
			  	<td class="text-center">'.date('d/m/Y', strtotime($r['start'])).'</td>
			  	<td class="text-center">'.date('d/m/Y', strtotime('-1 days',strtotime($r['end']))).'</td>
			  	<td class="text-center">
			  		<a href="alterar.php?id='.$r['id'].'" data-toggle="tooltip" data-placement="top" title="Alterar">
			  		<i class="fa-solid fa-pen"></i></a>
			  	</td>
			  	<td class="text-center">
			  		<a href="javascript:void();" data-toggle="modal" data-target="#excluir" title="Alterar" 
			  		    onclick="pegaID('.$r['id'].');">
			  		<i class="fa-solid fa-trash"></i></a>
			  	</td>
			  </tr>
			';
		}
	}
?>

</table>
</div>






<?php 
	include_once('rodape.php');
?>