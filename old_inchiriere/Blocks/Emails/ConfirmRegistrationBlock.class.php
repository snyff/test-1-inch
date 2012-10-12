<?php
require_once 'include/data/registration/registration.lib.php';
class ConfirmRegistrationBlock extends Block{
	function buildContent() {
		$code 		= getStringFromRequest('code');
		$success 	= confirmation($code);
		if($success) {
			setSessionVar('user_loggedin', true);
			setSessionVar('userid', $success);
			httpRedirect(getUrl(array('pagePath' => 'Account', 'lang' => LANG)));
		} else {
			echo translate(141, LANG, 'Cod de confirmare incorect').'.';
		}
	}
}
?>