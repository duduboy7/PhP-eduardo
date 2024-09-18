	</main>
<footer class="footer mt-auto py-4 pt-4 bg-dark">
	<div class="container text-center text-light">
		<span>Sistema de cadastro de pessoas</span>
	</div>
</footer>

<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- Tooltip -->
<script type="text/javascript">
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
</script>

<!-- Script para a máscara do fone -->
<script type="text/javascript" src="js/jquery.mask.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	    $('#fone').mask('(00) 00000-0000');
	});
</script>

<!-- Scripts para o arquivo troca-senha-padrao.php -->
<script type="text/javascript">
	function Verifica(){
		atalho = document.form1;
		if(atalho.senha.value == ''){
			alert('Campo obrigatório');
			atalho.senha.focus();
			return false;
		}

		if(atalho.senha2.value == ''){
			alert('Campo obrigatório');
			atalho.senha2.focus();
			return false;
		}

		if(atalho.senha.value != atalho.senha2.value){
			alert('Senhas não conferem');
			atalho.senha.value = '';
			atalho.senha2.value = '';
			atalho.senha.focus();
			return false;
		}

		if(atalho.frase.value == ''){
			alert('Campo obrigatório');
			atalho.frase.focus();
			return false;
		}

		return true;
	}


	// Função para o arquivo troca-senha-adm
	function VerificaSenhaAdm(){
		atalho = document.form1;
		if (atalho.senha_atual.value == '') {
			alert('Campo obrigatório');
			atalho.senha_atual.focus();
			return false;
		}

		if (atalho.senha.value == '') {
			alert('Campo obrigatório');
			atalho.senha.focus();
			return false;
		}

		if (atalho.senha2.value == '') {
			alert('Campo obrigatório');
			atalho.senha2.focus();
			return false;
		}

		if (atalho.senha.value !=
			atalho.senha2.value) {
			alert('As senhas não conferem!');
			atalho.senha.value = '';
			atalho.senha2.value = '';
			atalho.senha.focus();
			return false;
		}

		if (atalho.frase.value == '') {
			alert('Campo obrigatório');
			atalho.frase.focus();
			return false;
		}
		return true;
	}


	//Função para excluir uma pessoa
	function Excluir(id_pessoa){
		resposta = confirm('Deseja excluir essa pessoa?');
		if (resposta == true) {
			return true;
		}
		return false;
	}

	//Função para excluir um usuário
	function ExcluirUsu(id_usuario){
		resposta = confirm('Deseja excluir esse usuário?');
		if (resposta == true) {
			return true;
		}
		return false;
	}

	//Função para ativar uma pessoa
	function Ativar(id_pessoa){
		resposta = confirm('Deseja ativar essa pessoa?');
		if (resposta == true) {
			return true;
		}
		return false;
	}

	//Função para desativar uma pessoa
	function Desativar(id_pessoa){
		resposta = confirm('Deseja desativar essa pessoa?');
		if (resposta == true) {
			return true;
		}
		return false;
	}

	//Função para ativar um usuário
	function AtivarUsu(id_usuario){
		resposta = confirm('Deseja ativar esse usuário?');
		if (resposta == true) {
			return true;
		}
		return false;
	}

	//Função para desativar um usuário
	function DesativarUsu(id_usuario){
		resposta = confirm('Deseja desativar esse usuário?');
		if (resposta == true) {
			return true;
		}
		return false;
	}

	// Função para inserir uma pessoa
	function Insere(frm){
		if (frm.nome.value == '') {
			alert('Campo obrigatório');
			frm.nome.focus();
			return false;
		}

		if (frm.email.value == '') {
			alert('Campo obrigatório');
			frm.email.focus();
			return false;
		}

		if (frm.fone.value == '') {
			alert('Campo obrigatório');
			frm.fone.focus();
			return false;
		}

		if (document.forms['form1']['imagem'].value == '') {
			alert('Selecione uma foto');
			return false;
		}
		return true;
	}

	// Função para inserir um usuário
	function InsereUsu(frm){
		if (frm.nome.value == '') {
			alert('Campo obrigatório');
			frm.nome.focus();
			return false;
		}

		if (frm.email.value == '') {
			alert('Campo obrigatório');
			frm.email.focus();
			return false;
		}

		if (frm.login.value == '') {
			alert('Campo obrigatório');
			frm.login.focus();
			return false;
		}

		return true;
	}

	// Função para a troca de imagem
	function TrocaImagem(frm){
		if (document.forms['form1']['imagem'].value == '') {
			alert('Selecione uma foto');
			return false;
		}
		return true;
	}

	// Para verificação do nível da senha
	var numeros="0123456789";
	var letras="abcdefghijklmnopqrstuvwxyz";
	var letras_maiusculas="ABCDEFGHIJKLMNOPQRSTUVWXYZ";

	function tem_numeros(texto){
		for(i=0; i<texto.length; i++){
			if (numeros.indexOf(texto.charAt(i),0)!=-1){
				return 1;
			}
		}
		return 0;
	} 

	function tem_letras(texto){
		texto = texto.toLowerCase();
		for(i=0; i<texto.length; i++){
			if (letras.indexOf(texto.charAt(i),0)!=-1){
				return 1;
			}
		}
		return 0;
	} 

	function tem_minusculas(texto){
		for(i=0; i<texto.length; i++){
			if (letras.indexOf(texto.charAt(i),0)!=-1){
				return 1;
			}
		}
		return 0;
	} 

	function tem_maiusculas(texto){
		for(i=0; i<texto.length; i++){
			if (letras_maiusculas.indexOf(texto.charAt(i),0)!=-1){
				return 1;
			}
		}
		return 0;
	} 

	function seguranca_senha(senha){
		var seguranca = 0;

		if (senha.length != 0){
			if (tem_numeros(senha) && tem_letras(senha)){
				seguranca += 30;
			}
			if (tem_minusculas(senha) && tem_maiusculas(senha)){
				seguranca += 30;
			}
			if (senha.length >= 4 && senha.length <= 5){
				seguranca += 10;
			}else{
				if (senha.length >= 6 && senha.length <= 8){
					seguranca += 30;
				}else{
					if (senha.length > 8){
						seguranca += 40;
					}
				}
			}
		}
		return seguranca;          
	}

	function mostra_seguranca_senha(senha, formulario){
		seguranca = seguranca_senha(senha);
		if(seguranca <= 40){
			document.getElementById('nivel').style.visibility = "visible";
			document.getElementById('nivel').src="imagens/fraco.jpg";
		}else if(seguranca <= 60){
			document.getElementById('nivel').style.visibility = "visible";
			document.getElementById('nivel').src="imagens/medio.jpg";
		}else{
			document.getElementById('nivel').style.visibility = "visible";
			document.getElementById('nivel').src="imagens/forte.jpg";
		}
		formulario.seguranca.value = seguranca + "%";
	}

</script>
</body>
</html>