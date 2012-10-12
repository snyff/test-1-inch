<?php
	function setSondaj($sondajText) {
		$db = new Db();
		$q = "INSERT INTO sondaj(id, text, ip, browser, add_date) 
			  VALUES(NULL, '".escape($sondajText)."', '".escape($_SERVER['REMOTE_ADDR'])."', '".escape($_SERVER['HTTP_USER_AGENT'])."', '".date("Y-m-d G:i:s")."')";
		$db->query($q);
		return $db->lastId();
	}
?>