<?php 
	function VerificaLogin(){
		if(!isset($_SESSION['logado']) || 
	              $_SESSION['logado'] != true){
			return false;
		}
		return true;
	}
?>