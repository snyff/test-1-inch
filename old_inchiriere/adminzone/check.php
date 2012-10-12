<?php
	@session_start();
//	require_once '../defines/globals.php';
	
	function __autoload($class_name) {
    	require_once '../classes/'. $class_name . '.class.php';
	}
	$data = $_POST;
	foreach($data as $field => $value)
		if($value == ""){
			$error_mes = 1;
			include "index.php";
			exit;
		}
	
	$db = new Db();
	$q = "SELECT * FROM adm WHERE nick='".addslashes($data['nick'])."' AND pass='".addslashes($data['pass'])."'";
	$db->query($q);
	$n = $db->getNumRows();
	if($n==0){							//incorrect name or password
		$error_mes = 2;
		include "index.php";
		exit;
	}
	else{
		$row = $db->getNextRow();
		$_SESSION['adm_auth'] = "true";
		$_SESSION['master'] = $row['master'];
		$_SESSION['nick'] = $row['nick'];
		$_SESSION['adminid'] = $row['id'];
		header("Location: admin.php");
	}
?>