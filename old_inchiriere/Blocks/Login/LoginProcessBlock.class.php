<?php
require_once 'include/data/registration/registration.lib.php';
class LoginProcessBlock extends Block{
	function buildContent() {
		$email 		= getStringFromRequest('email');
		$pass 		= getStringFromRequest('pass');
		
		$success = checkUser($email, $pass);
		if($success) {
			session_register('user_loggedin');
			session_register('userid');
			$_SESSION['user_loggedin'] = true;
			$_SESSION['userid'] = $success;
			session_write_close();
			httpRedirect(getUrl(array('pagePath' => 'Account', 'lang' => LANG)));
		} else {
			logAttempt($email, $pass);
			httpRedirect(getUrl(array('pagePath' => 'HomePage', 'lang' => LANG, 'queryString' => array('error' => 'wrong_data'))));
		}
	}
}
?>