<?php
	@session_start();
	if(!isset($_SESSION['adm_auth'])||$_SESSION['adm_auth']!="true"){
		$error_mes = 2;
		header("Location: index.php");
		exit;
	}
?>