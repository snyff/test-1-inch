<?php
	$db = new Db();
	$q = "INSERT INTO stats(id, page, ip, time, browser, url, referer)
			VALUES(
				'',
				'{$_SERVER['PHP_SELF']}',
				'{$_SERVER['REMOTE_ADDR']}',
				'".date("Y-m-d G:i:s")."',
				'".escape($_SERVER['HTTP_USER_AGENT'])."',
				'".escape($_SERVER[REQUEST_URI])."',
				'".escape($_SERVER[HTTP_REFERER])."'
			)";
	$db->query($q);
?>