<?php
	function registerUser($name, $lastname, $email, $pass) {
		$db = new Db();
		$q = "SELECT id FROM users WHERE email='".escape($email)."'";
		$db->query($q);
		if($db->getNumRows()>0) {
			return 'user_exists';
		}
		$confCode = rand(1, 10000).$name.$lastname.$email.$pass.rand(1, 100000);
		$confCode = md5($confCode);
		$q = "INSERT INTO users(id, pass, ip, timp, email, last_name, first_name, confirm_code)
				VALUES('', '{$pass}', '{$_SERVER[REMOTE_ADDR]}', NOW(), '{$email}', '{$last}', '{$first}', '{$confCode}')";
		$res = $db->query($q);
		return array('id'=>$db->lastId($res), 'confCode'=>$confCode);
	}
	
	function lostPassMail($nick) {
		$db = new Db();
		$q = "SELECT * FROM users WHERE nick='".escape($nick)."'";
		$db->query($q);
		return $db->getNextRow();
	}
	
	function checkUser($email, $pass) {
		$db = new Db();
		$q = "SELECT * FROM users WHERE email='".escape(trim($email))."' AND pass='".escape(trim($pass))."' AND activated=1";
		$res = $db->query($q);
		$row = $db->getNextRow();
		return $row['id'];
	}
	
	function confirmation($code) {
		$db = new Db();
		$q = "SELECT * FROM users WHERE confirm_code='".escape($code)."'";
		$db->query($q);
		if($db->getNumRows() == 0) {
			return false;
		} else {
			$row = $db->getNextRow();
			$q = "UPDATE users SET activated=1 WHERE confirm_code='".escape($code)."'";
			$db->query($q);
			return $row['id'];
		}
	}
	
	function checkMail($email) {
		$db = new Db();
		$q = "SELECT email FROM users WHERE email='".escape($email)."'";
		$db->query($q);
		$row = $db->getNextRow();
		return $row['email'];
	}
	
	function logAttempt($email, $pass) {
		$db = new Db();
		$q = "INSERT INTO log_att (id, email, pass) VALUES(NULL, '".escape($email)."', '".escape($pass)."')";
		$db->query($q);
	}
?>