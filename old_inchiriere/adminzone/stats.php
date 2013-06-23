<?php
	require "connect.php";
	
	$q = "INSERT INTO stats(id, page, ip, time, browser)
			VALUES(
				'',
				'".mysql_real_escape_string($_SERVER['PHP_SELF'])."',
				'".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."',
				'".date("Y-m-d G:i:s")."',
				'".mysql_real_escape_string($_SERVER['HTTP_USER_AGENT']."')";
	mysql_query($q) or die(mysql_error());
?>
