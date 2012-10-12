<?php
	function setAppStats($flatId) {
		$db = new Db();
		$q = "INSERT INTO flat_stats(id, ip, time, browser, id_flat)
				VALUES(
					NULL,
					'{$_SERVER['REMOTE_ADDR']}',
					'".date("Y-m-d G:i:s")."',
					'".escape($_SERVER['HTTP_USER_AGENT'])."',
					'".escape($flatId)."'
				)";
		$db->query($q);
	}
?>