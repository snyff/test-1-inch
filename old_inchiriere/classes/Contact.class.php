<?php
class Contact {
	var $profileInfo;
	function __construct($contact){
		$db = new Db();
		$res = $db->query("SELECT * FROM users WHERE nick='".escape($contact)."'");
		$this->profileInfo = $db->getNextRow($res);
		return $this->profileInfo;
	}
	function getUserDetails() {
		return $this->profileInfo;
	}
}
?>