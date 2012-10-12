<?php
function addBug($content) {
	$db = new Db();
	$q = "INSERT INTO user_bugs(id, userid, content, browser, add_date, ip) 
		  VALUES(NULL, '".getSessionVar('userid')."', '".escape($content)."', '".$_SERVER['HTTP_USER_AGENT']."', NOW(), '".$_SERVER['REMOTE_ADDR']."')";
	$db->query($q);
	return $db->lastId();
}
function addFalseNumber($name, $number) {
	$db = new Db();
	$q = "INSERT INTO false_number(id, userid, number, name, add_date, ip) 
		  VALUES(NULL, '".getSessionVar('userid')."', '".escape($number)."', '".escape($name)."', NOW(), '".$_SERVER['REMOTE_ADDR']."')";
	$db->query($q);
	return $db->lastId();
}
function addImprovement($content) {
	$db = new Db();
	$q = "INSERT INTO improvement(id, userid, content, add_date, ip) 
		  VALUES(NULL, '".getSessionVar('userid')."', '".escape($content)."', NOW(), '".$_SERVER['REMOTE_ADDR']."')";
	$db->query($q);
	return $db->lastId();
}
?>