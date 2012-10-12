<?php
	require "connect.php";
	
	$q = "INSERT INTO stats(id, page, ip, time, browser)
			VALUES(
				'',
				'{$_SERVER['PHP_SELF']}',
				'{$_SERVER['REMOTE_ADDR']}',
				'".date("Y-m-d G:i:s")."',
				'{$_SERVER['HTTP_USER_AGENT']}'
			)";
	mysql_query($q) or die(mysql_error());
?>