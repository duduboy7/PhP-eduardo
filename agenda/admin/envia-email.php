<?php
	session_start(); 
	/* Verifica o S.O. do servidor para gerar
	   o código de retorno correto
	*/
	if(PHP_OS == "Linux") $quebra_linha = "\n";
	elseif(PHP_OS == "WINNT") $quebra_linha = "\r";
	else die("Este script não roda no seu servidor");

	// Criando as variáveis e resgatando os GETs 
	// Este email DEVE existir no servidor
	$origem = "contato@shefarol.com.br";
	$nome = $_SESSION['nome'];
	$email = $_SESSION['email'];
	$frase = $_SESSION['frase'];
	$assunto = "Lembrar senha";
	$destinatario = $email;

	// Formatando a mensagem
	$msg = "<p>Olá <b>" . $nome . "</b> parece que você esqueceu sua senha.<br>";
	$msg .= "Sua frase de segurança é <b>" . $frase . "</b>, esperamos ter ajudado!<br>";
	$msg .= "Se mesmo assim você não conseguiu recuperar sua senha, entre em contato com o Administrador.</p>";
	
	// Criando o cabeçalho do e-mail
	$header = "MIME-Version: 1.1" . $quebra_linha;
	$header .= "Content-type: text/html; charset=utf-8" . $quebra_linha;
	$header .= "From: " . $origem . $quebra_linha;
	$header .= "Return-Path: " . $origem . $quebra_linha;
	$header .= "Reply-to: " . $origem . $quebra_linha;

	//Enviando o email
	//Se for Postfix
	if(!mail($destinatario, $assunto, $msg, $header, "-r".$origem)){
		//Se não for Postfix
		$header .= "Return-Path: " . $email . $quebra_linha;
		mail($destinatario, $assunto, $msg, $header);
	}

	//Redirecionando para a página de confirmação
	header('Location: confirma-email.php');
?>